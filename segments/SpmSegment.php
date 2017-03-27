<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 8/02/17
 * Time: 13:29
 */
namespace carlosllorca\hl7messages\Segments;

use app\models\Order;
use app\models\Specimen;
use yii\base\Exception;

class SpmSegment extends BaseSegment
{
        protected $segmentLength=24;
        public $specimen_id;
        public $provider_name;
        public $provider_OID;

        public $orderControl='RE';
        public $placerOrderNumber;
        public $fillerOrderNumber;//codigo de la vacuna
        public $enteredBy;//Quien  puso la vacuna
        public $orderingProvider;
        public $specimenType;
        public $specimenSourceSite;
        public $specimenTypeCode;
        public $specimenSourceSiteCode;
        public $specimenQuantity;
        public $specimenQuantityUM;
        public $specimenDescription;
        public $specimenCollectionDateTime;
        public $specimenRecivedDateTime;


    public static $specimen_type_desc=
        [
            'Microbial isolate specimen (specimen)'=>'119303007',
            'Stool specimen'=>'119339001',
            'Cerebrospinal fluid sample (specimen)'=>'258450006',
            'Cervical swab (specimen)'=>'258524009',
            'Oral mucosal transudate sample (specimen)'=>'409876003',
            'Throat swab (specimen)'=>'258529004',
            'Plasma specimen (specimen)'=>'119361006',
            'Rectal swab (specimen)'=>'258528007',
            'Serum specimen from patient (specimen)'=>'122590004',
            'Urethral swab (specimen)'=>'258530009',
            'Urine specimen (specimen)'=>'122575003',
            'Vaginal swab (specimen)'=>'258520000',

        ];
    public static $specimen_sourcesite_desc=
        [
            'Abdomen and/or pelvis structure (body structure)'=>'416949008',
            'Abdominal air sac (body structure)'=>'43701009',
            'Back region (body structure)'=>'123961009',
            'Breast structure (body structure)'=>'76752008',
            'Cervix uteri structure (body structure)'=>'71252005',
            'Spinal cerebrospinal fluid pathway (body structure)'=>'280401006',
            'Ear structure (body structure)'=>'117590005',
            'Eye region structure (body structure)'=>'371398005',
            'Hand structure (body structure)'=>'85562004',
            'Joint structure (body structure)'=>'39352004',
            'Nail structure (body structure)'=>'72651009',
            'Naris, entire, anterior or posterior (body structure)'=>'272650008',
            'Nasal cavity structure (body structure)'=>'279549004',
            'Nasopharyngeal structure (body structure)'=>'71836000',
            'Nose and nasopharynx structure (body structure)'=>'400112001',
            'Penis part (body structure)'=>'119230000',
            'Placental structure (body structure)'=>'78067005',
            'Rectum structure (body structure)'=>'34402009',
            'Sinus septum (body structure)'=>'277695006',
            'Skin structure (body structure)'=>'39937001',
            'Skin tissue (body structure)'=>'314818000',
            'Tracheal structure (body structure)'=>'44567001',
            'Urethral structure (body structure)'=>'13648007 ',
            'Vaginal structure (body structure)'=>'76784001'
        ];
    public function rules()
    {
        return [
            [['specimen_id'], 'required'],
            [['specimenType'], 'validateSpecimenType'],
            ['specimenQuantity','integer'],
            [['specimenSourceSite'], 'validateSpecimenSourceSite'],
            [['provider_name','specimenCollectionDateTime','specimenRecivedDateTime','specimenQuantityUM','specimenQuantity','specimenDescription','provider_OID', 'fillerOrderNumber','enteredBy','orderingProvider','specimenType','specimenTypeCode','specimenSourceSite','specimenSourceSiteCode'],'safe']

        ];
    }
    public function validateSpecimenType($attribute){
        $found=false;
        foreach (self::$specimen_type_desc as $clave=>$valor){
            if(strtoupper($clave)==strtoupper($this->specimenType)){
                $this->specimenTypeCode=$valor;
                $found=true;
                break;
            }
        }
        if(!$found)
            $this->addError($attribute, 'Invalid Specimen Type.');
    }
    public function validateSpecimenSourceSite($attribute){
        $found=false;
        foreach (self::$specimen_sourcesite_desc as $clave=>$valor){
            if(strtoupper($clave)==strtoupper($this->specimenSourceSite)){
                $this->specimenSourceSiteCode=$valor;
                $found=true;
                break;
            }
        }
        if(!$found)
            $this->addError($attribute, 'Invalid Specimen Source Site.');
    }
    //SPM|1|^12345678&PERFORMING ORGANIZATION NAME&1. 111.122311.222.44.2.3.3&ISO ||119339001^STOOL^2.16.840.1.113883.6.96||||372237002^RECTUM^2.16.840.1.113883.12.163||||||STOOL CULTURE |||201107061215|201107061220<cr>
    public function generateString()
    {
        $arr=$this->initArray();
        if(!$this->validate())
            throw new Exception(json_encode($this->getErrors()));
        $arr[0]='SPM';
        $arr[1]=$this->placerOrderNumber;
        $arr[4]=$this->specimenTypeCode.'^'.$this->specimenType.'^2.16.840.1.113883.6.96';
        $arr[8]=$this->specimenSourceSiteCode.'^'.$this->specimenSourceSite.'^2.16.840.1.113883.12.163';
        //$arr[12]=$this->specimenQuantity.'^'.$this->specimenQuantityUM;
        $arr[14]=$this->specimenDescription;
        $arr[17]=Date('YmdGis',strtotime($this->specimenCollectionDateTime));
        $arr[18]=Date('YmdGis',strtotime($this->specimenRecivedDateTime));
        return implode($this->_hl7Globals['FIELD_SEPARATOR'], $arr)."\n";
    }
    public function loadFormField($arr)
    {

        $this->placerOrderNumber=$arr[1];
        $field=$this->stringSplit($arr[4],"^");
        $this->specimenTypeCode=$field[0];
        $this->specimenType=$field[1];

        $field=$this->stringSplit($arr[8],"^");
        $this->specimenSourceSiteCode=$field[0];
        $this->specimenSourceSite=$field[1];

        $this->specimenDescription=$arr[14];
        $this->specimenCollectionDateTime=$arr[17];
        $this->specimenRecivedDateTime=$arr[18];


    }
    public function generateFormSpecimenSecureOrder($specimen,$number){
        $this->specimen_id=$number;
        $this->specimenType=$specimen->specimenType->description;
        $this->specimenSourceSite=$specimen->specimenSourceSite->description;
        $this->specimenDescription=$specimen->description;
        $this->specimenCollectionDateTime=$specimen->collection_date;
        $this->specimenRecivedDateTime=$specimen->received_date;

    }
}
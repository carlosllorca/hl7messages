<?php

namespace carlosllorca\hl7messages\Segments;
use app\models\PreviousVaccines;
use app\models\VaccineStationPatient;
use carlosllorca\hl7messages\Scenarios\Vaccines;
use yii\base\Exception;

/**
 * Class RxrSegment
 * @package carlosllorca\hl7messages\Segments
 * @property string $injection_type
 * @property string $injection_type_code
 * @property string $injection_site
 * @property string $injection_site_code
 */

class RxrSegment extends BaseSegment
{
        protected $segmentLength=2;
        public $injection_type;
        public $injection_type_code;
        public $injection_site;
        public $injection_site_code;
        public $empty=true;
       
    public function rules()
    {
        return [
            //[['injection_type','injection_site'], 'required'],
            [['injection_type'], 'validateInjectionType'],
            [['injection_site'], 'validateInjectionSite'],

            [['injection_type_code','injection_type_code'],'safe']
        ];

    }
    public static $injection_type_desc=
        [
            'Intradermal'=>'ID',
            'Intramuscular'=>'IM',
            'Nasal'=>'NS',
            'Intravenous'=>'IV',
            'Oral'=>'PO',
            'Other/Miscellaneous'=>'OTH',
            'Subcutaneous'=>'SC',
            'Transdermal'=>'TD',

        ];
    public static $injection_place_desc=
        [
            'Left Thigh'=>'LT',
            'Left Arm'=>'LA',
            'Left Deltoid'=>'LD',
            'Left Gluteus Medius'=>'LG',
            'Left Vastus Lateralis'=>'LVL',
            'Left Lower Forearm'=>'LLFA',
            'Right Arm'=>'RA',
            'Right Thigh'=>'RT',
            'Right Vastus Lateralis'=>'RVL',
            'Right Gluteus Medius'=>'RG',
            'Right Deltoid'=>'RD',
            'Right Lower Forearm'=>'RLFA',

        ];
    public function validateInjectionType($attribute){
        $found=false;
        foreach (self::$injection_type_desc as $clave=>$valor){
            if(strtoupper($clave)==strtoupper($this->injection_type)){
                $this->injection_type_code=$valor;
                $found=true;
                break;
            }

        }
        if(!$found)
            $this->addError($attribute, 'Invalid Injection Place.');

    }
    public function validateInjectionSite($attribute){
        $found=false;
        foreach (self::$injection_place_desc as $clave=>$valor){
            if(strtoupper($clave)==strtoupper($this->injection_site)){
                $this->injection_site_code=$valor;
                $found=true;
                break;
            }

        }
        if(!$found)
            $this->addError($attribute, 'Invalid Injection Place.');

    }
    public function generateString(){
        if (!$this->validate())
            throw new Exception(json_encode($this->getErrors()));
        $arr=$this->initArray();
        $arr[0]='RXR';
        $arr[1]=$this->injection_type_code."^".$this->injection_type."^HL70162";
        $arr[2]=$this->injection_site_code."^".$this->injection_site."^HL70163";
        return implode($this->_hl7Globals['FIELD_SEPARATOR'], $arr)."\n";


    }
    public function loadFormField($arr){
        $result=$this->stringSplit($arr[1],"^");
        $this->injection_type_code=$result[0];
        $this->injection_type=$result[1];
        $result=$this->stringSplit($arr[2],"^");
        $this->injection_site_code=$result[0];
        $this->injection_site=$result[1];
    }
    public function loadFromAegishell($vaccine){
        if($vaccine instanceof VaccineStationPatient){

            $this->empty=false;
            $this->injection_type=$vaccine->injectionType->description;
            $this->injection_site=$vaccine->target->description;

        }elseif($vaccine instanceof PreviousVaccines){
            $this->empty=false;
            $this->injection_site=$vaccine->target->description;
        }
        else{
            throw new ErrorException('Object not allowed');
        }
    }

}
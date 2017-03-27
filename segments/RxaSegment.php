<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 8/02/17
 * Time: 13:29
 */
namespace carlosllorca\hl7messages\Segments;

use app\models\PreviousVaccines;
use app\models\VaccineStationPatient;
use yii\base\ErrorException;

class RxaSegment extends BaseSegment
{
        protected $segmentLength=21;
        public $subId=0;
        public $subCounter=1;
        public $immunizationDate;
        public $immunizationExpire;
        public $cvxVaccineCode;
        public $cvxVaccineName;
        public $vaccineAmmount=999;//Cantidad;
        public $vaccineUnit;//UM;
        public $vaccineAdministrationNotes='Historical information source unspecified';
        public $vaccineAdministrationCode;
        public $nurseName;
        public $nurseLastName;
        public $facility;
        public $facility_npi;
        public $vaccine_lote;
        public $vaccine_exp_date;
        public $vaccine_provider;


    public static $administrationNotes_types=
        [
            'New immunization record'=>'00',
            'Historical information source unspecified'=>'01',
            'Historical information from school record'=>'07',

        ];
    public function rules()
    {
        return [
            [['subId','subCounter','cvxVaccineCode','vaccineAmmount','vaccineAdministrationNotes'], 'required'],
            [['cvxVaccineCode','vaccineAmmount'], 'integer'],
            ['vaccineAdministrationNotes', 'validateVaccineAdministrationNotes'],

            [['vaccineAmmount','vaccineUnit','cvxVaccineName','nurseName','nurseLastName','facility','facility_npi'],'safe'],
            [['vaccineAdministrationNotes','vaccineAdministrationCode','vaccine_provider','vaccine_lote' ,'immunizationDate','immunizationExpire','vaccine_exp_date'],'safe'],


        ];
    }
    public function validateVaccineAdministrationNotes($attribute){
        $found=false;
        foreach (self::$administrationNotes_types as $clave=>$valor){
            if(strtoupper($clave)==strtoupper($this->vaccineAdministrationNotes)){
                $this->vaccineAdministrationCode=$valor;
                $found=true;
                break;
            }

        }
        if(!$found)
            $this->addError($attribute, 'Invalid Administration Note.');

    }
    public function generateString(){
        if(!$this->validate())
            throw new ErrorException(json_encode($this->getErrors()));

        $arr=$this->initArray();

        $arr[0]='RXA';
        $arr[1]=$this->subId;
        $arr[2]=$this->subCounter;
        $arr[3]=$this->immunizationDate;
        $arr[4]=$this->immunizationExpire;
        $arr[5]=$this->cvxVaccineCode."^".$this->cvxVaccineName;
        $arr[6]=$this->vaccineAmmount;
        $arr[7]=$this->vaccineUnit;
        $arr[9]=$this->vaccineAdministrationCode."^".$this->vaccineAdministrationNotes;
        $arr[10]=$this->nurseLastName."^".$this->nurseLastName;
        $arr[11]=$this->facility.'^^^'.$this->facility_npi;//verlo bien en iguana

        $arr[16]=$this->vaccine_exp_date;
        $arr[14]=$this->vaccine_provider;
        $arr[15]=$this->vaccine_lote;
        $arr[21]='RE';
       return implode($this->_hl7Globals['FIELD_SEPARATOR'], $arr)."\n";


    }
    public function loadFormField($arr){

        $this->subId=$arr[1];
        $this->subCounter=$arr[2];
        $this->immunizationDate=date('Y-m-d',strtotime($arr[3]));
        $this->immunizationExpire=date('Y-m-d',strtotime($arr[4]));
        $result=$this->stringSplit($arr[5],"^");
        $this->cvxVaccineCode=$arr[5]=$result[0];
        $this->cvxVaccineName=$result[1];
        $this->vaccineAmmount=$arr[6];
        $this->vaccineUnit=$arr[7];
        $result=$this->stringSplit($arr[9],"^");
        $this->vaccineAdministrationCode=$result[0];
        $this->vaccineAdministrationNotes=$result[1];
        $result=$this->stringSplit($arr[10],"^");
        $this->nurseLastName=$result[0];
        $this->nurseLastName==$result[1];
        $result=$this->stringSplit($arr[11],"^");
        $this->facility=$result[0];
        $this->facility_npi=$result[3];
        $this->vaccine_exp_date=date('Y-m-d',strtotime($arr[16]));
        $this->vaccine_provider=$arr[14];
        $this->vaccine_lote=$arr[15];
       

    }
    public function loadFromAegishell($vaccine){
        if($vaccine instanceof PreviousVaccines)
        {
            $this->immunizationDate=$vaccine->date;
            $this->immunizationExpire=$vaccine->refresh_date;
            $this->cvxVaccineCode=$vaccine->vaccine->code;
            $this->cvxVaccineName=$vaccine->vaccine->description;
            $this->vaccine_provider=$vaccine->vaccine->company;

        }elseif($vaccine instanceof VaccineStationPatient){
            $this->immunizationDate=$vaccine->date_time_injection;
            $this->immunizationExpire=$vaccine->refresh_date;
            $this->cvxVaccineCode=$vaccine->vaccine->vaccineRepository->code;
            $this->cvxVaccineName=$vaccine->vaccine->vaccineRepository->description;
            $this->vaccine_provider=$vaccine->vaccine->vaccineRepository->company;
            $this->nurseName=$vaccine->nurses->names;
            $this->nurseLastName=$vaccine->nurses->surnames;
            $this->vaccine_exp_date=$this->vaccine_exp_date;
            $this->vaccine_lote=$this->vaccine_lote;
        }else{
            throw new ErrorException('Object not allowed');
        }
    }
}
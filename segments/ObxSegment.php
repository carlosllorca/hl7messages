<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 8/02/17
 * Time: 13:29
 */
namespace carlosllorca\hl7messages\Segments;

use yii\base\Exception;

class ObxSegment extends BaseSegment
{
        private $segmentLength=25;
        public $loinc_code;
        public $loinc_desc;
        public $observation_result;
        public $observation_result_id;
        public $observation_date;
        public $method_id;
        public $method_desc;
        public $laboratory_name;
        public $laboratory_address;
        public $laboratory_city;
        public $laboratory_state;
        public $laboratory_country;
        public $laboratory_zipCode;
    public function rules()
    {
        return [


            [['loinc_code','loinc_desc','observation_result','observation_result_id','observation_date','method_id','method_desc','laboratory_name','laboratory_address','laboratory_city','laboratory_state','laboratory_country','zipCode'],'safe']

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
    public function stringSegment()
    {
        $arr=$this->initArray();
        if(!$this->validate())
            throw new Exception(json_encode($this->getErrors()));
        $arr[0]='OBX';
        $arr[1]='1';
        $arr[2]='CWE';
        $arr[3]=$this->loinc_code.'^'.$this->loinc_desc.'^2.16.840.1.113883.6.1^^^L';
        $arr[5]=$this->observation_result_id.'^'.$this->observation_result.'^2.16.840.1.113883.6.96^^^L';
        $arr[11]='F';//Ok;
        $arr[14]=Date('Ymd');
        $arr[17]=$this->method_id.'^'.$this->method_desc.'^2.16.840.1.113883.5.84';
        $arr[23]=$this->laboratory_name;
        $arr[24]=$this->laboratory_address.'^^'.$this->laboratory_city.'^'.$this->laboratory_state.'^'.$this->laboratory_zipCode.'^'.$this->laboratory_country;
        return implode($this->_hl7Globals['FIELD_SEPARATOR'], $arr)."\n";
    }
}
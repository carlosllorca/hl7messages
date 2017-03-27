<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 8/02/17
 * Time: 13:29
 */
namespace carlosllorca\hl7messages\Segments;

class BaseSegment extends \yii\base\Model
{
    protected $segmentLength;
    protected $_hl7Globals = [];

    public function rules()
    {
        return [
            [['release','softwareName','binary_id','install_date'], 'required'],
            ['email','email'],
            ['relationship','validateRelationship'],
            [['address1','address2','city','state','country','postal_code', 'phone','email','publicityCode','relationship_code'],'safe']
        ];

    }
    public function init()
    {
        $this->_hl7Globals['SEGMENT_SEPARATOR'] = "\n";
        $this->_hl7Globals['SEGMENT_DEFINITION'] = '^~\&';
        $this->_hl7Globals['FIELD_SEPARATOR'] = '|';
        $this->_hl7Globals['NULL'] = '""';
        $this->_hl7Globals['COMPONENT_SEPARATOR'] = '^';
        $this->_hl7Globals['REPETITION_SEPARATOR'] = '~';
        $this->_hl7Globals['ESCAPE_CHARACTER'] = '\\';
        $this->_hl7Globals['SUBCOMPONENT_SEPARATOR'] = '&';
        $this->_hl7Globals['HL7_VERSION'] = '2.6';
    }

    protected function initArray(){
        $result=[];
        for ($i=0;$i<$this->segmentLength;$i++){
            array_push($result,'');
        }
       
        return $result;
    }
    protected function stringSplit($segment,$fieldSeparator){
        $arr=[];
        $noEnd=true;
        while (strlen($segment)>1&&$noEnd){
            $pos=strpos($segment,$fieldSeparator);
            if(is_int($pos)){
                $field=substr($segment,0,$pos);
                array_push($arr,$field);
                $segment=substr($segment,$pos+1);
            }  else{
                array_push($arr,$segment);
                $segment=null;
                $noEnd=false;
            }
        }

        return $arr;



    }


}
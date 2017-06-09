<?php

namespace Hl7v2\DataType;

use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\Validation\StringLengthTrait;

abstract class ComponentDataType implements DataTypeInterface, ComponentInterface
{
    use StringLengthTrait;

    protected $dataTypeFactory;
    private $separators = ["|", "^", "&"];
    public function setDataTypeFactory(DataTypeFactory $dataTypeFactory)
    {
        $this->dataTypeFactory = $dataTypeFactory;
    }

    public function getDataTypeFactory()
    {
        return $this->dataTypeFactory;
    }

    public function getvalue($separator)
    {
        $array = [];
        $sepPos= array_search($separator,$this->separators);
        $sepPos<count($this->separators)-1 ? $sepChildren = $this->separators[$sepPos+1] : $sepChildren = $separator ;
        foreach ($this as $key => $value) {
            $this->$key;
            if($key!='separators'&&$key!='characterEncoding'&&$key!='fields')
                if (is_array($this->$key) && count($this->$key) > 0) {
                    $secundary = [];
                    foreach ($this->$key as $comp){
                        array_push($secundary, !($this->is_array_empty(get_object_vars($comp))) ? $comp->getValue($sepChildren) : "");
                    }
                    array_push($array, implode('~', $secundary));
                } else {
                    array_push($array,  (is_object($this->$key) && (count(get_object_vars($this->$key)) > 0) && !($this->is_array_empty(get_object_vars($this->$key)))) ? $this->$key->getValue($sepChildren) : "");
                }
        }

        return $this->cleanMessage(implode($separator,$array));
    }

    function is_array_empty($arr){
        if(is_array($arr)){
            foreach($arr as $key => $value){
                if (is_object($value)){
                    if(!empty($value->getvalue(null)) && !is_null($value->getvalue(null))){
                        return false;
                        break;
                    }
                }
                else{
                    if(!empty($value) && !is_null($value)){
                        return false;
                        break;
                    }
                }

            }
            return true;
        }
    }

    function cleanMessage($message){
        $array=['|','&','^','~'];
        $charaster=substr($message,-1,1);
        if($message!='^~\&'&& in_array($charaster,$array)){
            $message=$this->cleanMessage(substr($message,0,-1));
        }
        return $message;
    }
}

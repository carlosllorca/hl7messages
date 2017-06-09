<?php

namespace Hl7v2\Factory;

use Hl7v2\DataType\ComponentInterface;
use Hl7v2\Exception\DataTypeError;

class DataTypeFactory
{
    private $separators = ["|", "^", "&"];
    /**
     * Create a Data Type.
     *
     * @param string $typeName
     * @param string $characterEncoding
     * @return \Hl7v2\DataType\DataTypeInterface
     * @throws \Hl7v2\Exception\DataTypeError
     */
    public function create($typeName, $characterEncoding)
    {
        $class = $this->determineClassname($typeName);
        $type = new $class;

        if ($type instanceof ComponentInterface) {
            $type->setDataTypeFactory($this);
        }

        $type->setCharacterEncoding($characterEncoding);

        return $type;
    }

    private function determineClassname($typeName)
    {
        $name = ucfirst(strtolower($typeName));
        $class = "\\Hl7v2\\DataType\\{$name}DataType";
        if (!class_exists($class)) {
            throw new DataTypeError("Unknown DataType \"{$typeName}\".");
        }
        return $class;
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

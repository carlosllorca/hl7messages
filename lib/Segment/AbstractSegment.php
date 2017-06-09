<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Factory\DataTypeFactory;
use Hl7v2\Validation\StringLengthTrait;

/**
 * Base class of all Segments.
 */
abstract class AbstractSegment implements SegmentInterface
{
    use StringLengthTrait;

    private $separators = ["|", "^", "&"];

    /**
     * @var \Hl7v2\Factory\DataTypeFactory
     */
    protected $dataTypeFactory;
    /**
     * @deprecated
     */
    protected $fields = array();

    /**
     * @param \Hl7v2\Factory\DataTypeFactory $dataTypeFactory
     */
    public function __construct(
        DataTypeFactory $dataTypeFactory
    ) {
        $this->dataTypeFactory = $dataTypeFactory;
    }

    /*** Crea la class dado el mensaje creado en el Datagram y return datagram***/
    abstract public function fromDatagram(Datagram $datagram, Codec $codec);


    /**
     * Having advanced in to a Field, this helper extracts the content of
     * Components (each may have sub-components).
     *
     * The $sequence argument is a set of nested arrays which direct the
     * extractionn of components and subcomponents. Each element in the
     * outermost list represents a component: An integer represents a whole
     * component to be extracted; and an array represents a component made-up of
     * subcomponents. Each of element of a subcomponent array represents a
     * subcomponent: an integer represents a whole subcomponent to be extracted
     * and an array is a subcomponent made-up of further subcomponents. e.g.
     *
     *      [1, 1, [1, [1, 1], 1], 1]
     *
     *  is a field of four components, the third being made-up of three
     *  subcomponents, the second of which is made-up of two subcomponents.
     *  Klar?
     *
     * @param Datagram $data
     * @param Codec $codec
     * @param array $sequence
     * @return array
     */
    protected function extractComponents(
        Datagram $data,
        Codec $codec,
        $sequence
    ) {
        $first = true;
        $extracted = [];
        foreach ($sequence as $instruction) {
            if (!$first && false === $codec->advanceToComponent($data)) {
                break;
            }
            if (is_array($instruction)) {
                $extracted[] = $this->extractSubcomponents($data, $codec, $instruction);
            } else {
                $extracted[] = $codec->extractComponent($data);
            }
            $first = false;
        }
        while (sizeof($extracted) < sizeof($sequence)) {
            array_push($extracted, null);
        }
        return $extracted;
    }

    /**
     * Having advanced in to a Field, this helper extracts the content of
     * Subcomponents (each may have sub-components).
     *
     * @param Datagram $data
     * @param Codec $codec
     * @param array $sequence
     * @return array
     */
    protected function extractSubcomponents(
        Datagram $data,
        Codec $codec,
        $sequence
    ) {
        $first = true;
        $extracted = [];
        foreach ($sequence as $instruction) {
            if (!$first && false === $codec->advanceToSubcomponent($data)) {
                break;
            }
            if (is_array($instruction)) {
                $extracted[] = $this->extractSubcomponents($data, $codec, $instruction);
            } else {
                $extracted[] = $codec->extractSubcomponent($data);
            }
            $first = false;
        }
        while (sizeof($extracted) < sizeof($sequence)) {
            array_push($extracted, null);
        }
        return $extracted;
    }

    public function SerializeComponent($component){
        $extracted = [];
        if($component){
            foreach($component as $comp) {
                if(method_exists($comp,'getValue')) {
                    $extracted[] = $comp->getValue();
                }
                else
                {
                    $this->SerializeComponent($comp);
                }
            }
        }
        return $extracted;
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
                    array_push($array,  (is_object($this->$key) && (count(get_object_vars($this->$key)) > 0) && !($this->is_array_empty(get_object_vars($this->$key)))) ? $this->cleanMessage($this->$key->getValue($sepChildren)) : "");
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

<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 8/02/17
 * Time: 13:29
 */
namespace carlosllorca\hl7messages\Segments;

class SftSegment extends BaseSegment
{
        public $release;
        public $softwareName;
        public $binary_id;
        public $install_date;
        private $segmentLength=6;




    public function rules()
    {
        return [
            [['release','softwareName'], 'required'],
            [['binary_id','install_date'],'safe']
        ];

    }
    public function stringSegment()
    {
        $arr=$this->initArray();
        $arr[0]='SFT';
        $arr[1]='SiVaH';
        $arr[2]=$this->release;
        $arr[3]=$this->softwareName;
        $arr[4]=$this->binary_id;
        $arr[6]=$this->install_date;
        return implode($this->_hl7Globals['FIELD_SEPARATOR'], $arr)."\n";
    }
    //todo: Implementar metodo para cargar de un string

}
<?php
namespace carlosllorca\hl7messages\Scenarios;

use carlosllorca\hl7messages\Segments\ObrSegment;
use carlosllorca\hl7messages\Segments\ObxSegment;
use carlosllorca\hl7messages\Segments\SpmSegment;
use cllorca\hl7messages\Segments\OrcSegment;
use yii\base\Exception;
use yii\base\Model;
use cllorca\hl7messages\Segments;
/**
 * This is the model class for HL7 v2 Immunization Scenario.
 *
 * @property OrcSegment $orc
 * @property ObxSegment $obx
 * @property ObrSegment $obr
 * @property SpmSegment $spm
 *
 */
class Result extends Model{
    public $orc;
    public $obr;
    public $obx;
    public $spm;

    public function saveSegment($segment){
        if ($segment instanceof OrcSegment){
            $this->orc=$segment;
        }else if($segment instanceof ObrSegment){
            $this->obr=$segment;
        }else if($segment instanceof ObxSegment){
            $this->obx=$segment;
        }else if($segment instanceof SpmSegment){
            $this->spm=$segment;
        }else{
            throw new Exception ('Sorry Object can not match with any attribute of this class');
        }
    }
};
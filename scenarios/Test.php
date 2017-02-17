<?php
namespace carlosllorca\hl7messages\Scenarios;


use app\models\Order;
use carlosllorca\hl7messages\Segments\ObrSegment;
use carlosllorca\hl7messages\Segments\OrcSegment;
use carlosllorca\hl7messages\Segments\SpmSegment;
use yii\base\Exception;
use yii\base\Model;

/**
 * This is the model class for HL7 v2 Immunization Scenario.
 *
 * @property OrcSegment $orc
 * @property ObrSegment $obr
 * @property SpmSegment $spm
 *
 */
class Test extends Model{
    public $orc;
    public $obr;
    public $spm;
    public function init()
    {
        $this->orc=new OrcSegment();
        $this->obr=new ObrSegment();
        $this->spm=new SpmSegment();
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function saveSegment($segment){
        if ($segment instanceof OrcSegment){
            $this->orc=$segment;
        }else if($segment instanceof ObrSegment){
            $this->obr=$segment;
        }else if($segment instanceof SpmSegment){
            $this->spm=$segment;
        }else{
            throw new Exception ('Sorry Object can not match with any attribute of this class');
        }
    }
};
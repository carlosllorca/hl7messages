<?php
namespace carlosllorca\hl7messages\Scenarios;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\db\ActiveRecord;
use cllorca\hl7messages\Segments;
use cllorca\hl7messages\Scenarios;
use cllorca\hl7messages\Segments\PidSegment;
use cllorca\hl7messages\Segments\Nk1Segment;
use cllorca\hl7messages\Scenarios\Vaccines;
/**
 * @property PidSegment $pid
 * @property Result $results
 * @property Result $temp_result
 */
class ResultScenary extends Model
{
    public $pid;

    public $results=[];
    public $temp_result;
    public function save(){
        array_push($this->results,$this->temp_result);
    }
    public function createResult(){
        $this->temp_result=new Result();
    }


};
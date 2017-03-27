<?php
namespace carlosllorca\hl7messages\Scenarios;
use carlosllorca\hl7messages\Segments\OrcSegment;
use carlosllorca\hl7messages\Segments\PidSegment;
use carlosllorca\hl7messages\Segments\SftSegment;
use yii\base\Exception;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\db\ActiveRecord;

/**

 * @property PidSegment $pid;
 * @property  Test $tests;
 * @property  Test $temp_test;
 *
 *
 */
class OrderScenary extends Model
{



    public $pid;
    public $tests=[];
    public $temp_test;
    public function init(){
        $this->pid=new PidSegment();
        $this->temp_test=new Test();
    }

    public function saveTest(){
        array_push($this->tests,$this->temp_test);
        $this->temp_test=new Test();
    }
    public function generateMsg(){
        if(!$this->pid->validate()){
            throw new Exception(json_encode($this->pid->getErrors()));

        }
        $msg=$this->pid->generateString();
        if(count($this->tests)>0){
            for($i=0;$i<count($this->tests);$i++){
                $msg.=$this->tests[$i]->orc->generateString();
                $msg.=$this->tests[$i]->obr->generateString();
                $msg.=$this->tests[$i]->spm->generateString();
            }
        }
        return $msg;
    }





};
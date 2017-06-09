<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/17/2017
 * Time: 9:00 AM
 */
namespace carlosllorca\hl7messages\MessagesStructure;
use carlosllorca\hl7messages\Interfaces\MshInterface;
use carlosllorca\hl7messages\Interfaces\PidInterface;
use yii\base\Object;


class Oml_21 extends Object
{
    /**
     * @var MshInterface
     */
    private $msh;
    /**
     * @var PidInterface
     */
    private $pid;


    /**
     * Oml_21 constructor.
     * @param MshInterface $msh
     * @param PidInterface $pid
     * @param array $config
     */
    public function __construct(MshInterface $msh, PidInterface $pid,$config = [])
    {
        $this->msh = $msh;
        $this->pid = $pid;
        parent::__construct($config);
    }

    /**
     * @return array
     */
    public function GetArraySegments(){
        $AcknowledgmentType = [/** @lang Get Message header segment - MSH */
            'msh'=> $this->msh->GetMshSegment(),
            'pid'=> $this->pid->GetPidSegment(),
            ];

        return $AcknowledgmentType;
    }
}

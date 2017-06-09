<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/17/2017
 * Time: 4:17 PM
 */

namespace carlosllorca\hl7messages\Encoders;

use carlosllorca\hl7messages\Interfaces\MsgInterface;
use yii\base\Object;

/**
 * Class Msg
 * @package carlosllorca\hl7messages\Encoders
 * Description: MSG: Message Type This field contains the message type, trigger event, and the message structure ID for the message.
 */
class Msg extends Object implements MsgInterface {

    /**
     * @var Msg1|string
     * Message Code Ej: 'OML'
     */
    private $msg1;
    /**
     * @var Msg2|string
     * Trigger Event Ej: 'O21'
     */
    private $msg2;
    /**
     * @var Msg3|string
     * Message Structure Ej: 'OML^O21'
     */
    private $msg3;
    /**
     * @var array
     */
    private $componentSeparator;

    /**
     * Msg constructor.
     * @param $componentSeparator
     * @param $msg1
     * @param $msg2
     * @param $msg3
     * @param array $config
     */
    public function __construct($componentSeparator, $msg1, $msg2, $msg3, $config = [])
    {
        $this->msg1 = $msg1;
        $this->msg2 = $msg2;
        $this->msg3 = $msg3;
        $this->componentSeparator = $componentSeparator;
        parent::__construct($config);
    }

    /**
     * @return string
     */
    function GetMessageType()
    {
        return (is_null($this->msg1) ? "" : $this->msg1) . $this->componentSeparator . (is_null($this->msg2) ? "" : $this->msg2) . $this->componentSeparator . (is_null($this->msg3) ? "" : $this->msg3);
    }


    /**
     * @param $msg
     * @return array
     */
    function Deserialize($msg)
    {
        $deserialize = explode($this->componentSeparator, $msg);
        $this->msg1 = new Msg1($deserialize[0]);
        $this->msg2 = new Msg2($deserialize[1]);
        $this->msg3 = new Msg3($deserialize[2]);
        return $deserialize;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/17/2017
 * Time: 4:22 PM
 */

namespace carlosllorca\hl7messages\Interfaces;


interface MsgInterface
{
    /**Get MSG: Message Type */
    function GetMessageType();

    /**
     * @param $msg
     * @return array
     */
    function Deserialize($msg);
}
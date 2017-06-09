<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/18/2017
 * Time: 9:25 AM
 */

namespace carlosllorca\hl7messages\Interfaces;


interface PidInterface
{
    /**
     * @return 'Get Patient Identification Segment (PID)'
     */
    public function GetPidSegment();

    /**
     * @param $pid
     * @return array
     */
    public function Deserialize($pid);
}
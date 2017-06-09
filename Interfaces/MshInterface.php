<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/17/2017
 * Time: 4:21 PM
 */

namespace carlosllorca\hl7messages\Interfaces;


interface MshInterface
{
    /** Get Message header segment - MSH **/
    function GetMshSegment();

    /**
     * @param $msh
     * @return array
     */
    function Deserialize($msh);
}
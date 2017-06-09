<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/18/2017
 * Time: 3:54 PM
 */

namespace carlosllorca\hl7messages\Interfaces;

/**
 * Interface CxInterface
 * @package carlosllorca\hl7messages\Interfaces
 */
interface CxInterface
{
    /**
     * @return 'Get Patient Identifier'
     */
    public function GetPatientIdentifier();

    /**
     * @param $cx3
     * @return mixed
     */
    public function Deserialize($cx3);
}
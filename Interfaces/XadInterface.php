<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/19/2017
 * Time: 9:09 AM
 */

namespace carlosllorca\hl7messages\Interfaces;

/**
 * Interface XadInterface
 * @package carlosllorca\hl7messages\Interfaces
 */
interface XadInterface
{
    /**
     * @return mixed
     */
    public function GetExtendedAddress();

    /**
     * @param $xad
     * @return mixed
     */
    public function Deserialize($xad);
}
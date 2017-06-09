<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/18/2017
 * Time: 5:17 PM
 */

namespace carlosllorca\hl7messages\Interfaces;


interface XpnInterface
{
    /**
     * @return 'Get Extended Person Name'
     */
    public function GetExtendedPersonName();

    /**
     * @param $xpn
     * @return mixed
     */
    public function Deserialize($xpn);
}
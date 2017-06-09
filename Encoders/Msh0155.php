<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/17/2017
 * Time: 3:31 PM
 */

namespace carlosllorca\hl7messages\Encoders;


use dosamigos\qrcode\lib\Enum;

/**
 * Class Msh0155
 * @package carlosllorca\hl7messages\Encoders
 * Description 0155 Acknowledgment Type
 * Using: MSH.15
 */
class Msh0155 extends Enum
{
    const __default = self::AL;
    /**Always*/
    const AL = 'AL';
    /**Never*/
    const NE = 'NE';
    /**Error/reject conditions only*/
    const ER = 'ER';
    /**Successful completion only*/
    const SU = 'SU';
}
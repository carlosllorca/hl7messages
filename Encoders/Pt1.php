<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/16/2017
 * Time: 2:47 PM *
 */

namespace carlosllorca\hl7messages\Encoders;

use dosamigos\qrcode\lib\Enum;

/**
 * Class Pt1
 * @package carlosllorca\hl7messages\Encoders
 * Description: 0103: Processing ID
 * Using: MSH.11
 */
class Pt1 extends Enum
{
    const __default = self::T;

    /** Debugging*/
    const D = 'D';
    /** Production*/
    const P = 'P';
    /** Training*/
    const T = 'T';
}
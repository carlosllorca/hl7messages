<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/16/2017
 * Time: 2:53 PM
 */

namespace carlosllorca\hl7messages\Encoders;

use dosamigos\qrcode\lib\Enum;

/**
 * Class Pt2
 * @package carlosllorca\hl7messages\Encoders
 * Description: 0103: Processing ID
 * Using: MSH.11
 */
class Pt2 extends Enum
{
    const __default = self::T;

    /**Archive*/
    const A = 'A';
    /**Restore from archive*/
    const R = 'R';
    /**Initial load*/
    const I = 'I';
    /**Current processing, transmitted at intervals (scheduled or on demand)*/
    const T = 'T';
    /**CNot present (the default, meaning current  processing)*/
    const Not_present = 'Not present';

}
<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/18/2017
 * Time: 6:03 PM
 * Description: 0001: Administrative Sex
 */

namespace carlosllorca\hl7messages\Encoders;


use dosamigos\qrcode\lib\Enum;

/**
 * Class AdmSex
 * @package carlosllorca\hl7messages\Encoders
 * Description: 0001: Administrative Sex
 */
class AdmSex extends Enum
{
    /**Female*/
    const F = 'F';

    /**Male*/
    const M = 'M';

    /**Other*/
    const O = 'O';

    /**Unknown*/
    const U = 'U';

    /**Ambiguous*/
    const A = 'A';

    /**Not applicable*/
    const N = 'N';
}
<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/17/2017
 * Time: 10:31 AM
 */

namespace carlosllorca\hl7messages\Encoders;

use dosamigos\qrcode\lib\Enum;

/**
 * Class Vid1
 * @package carlosllorca\hl7messages\Encoders
 * Description: VID: Version Identifier
 * Using MSH.12
 */
class Vid1 extends Enum
{
    const __default = self::Release_2_5_1;

    const Release_2_0  = '2.0';
    const Demo_2__0D = '2.0D';
    const Release_2_1 = '2.1';
    const Release_2_2 ='2.2';
    const Release_2_3 ='2.3';
    const Release_2_3_1 ='2.3.1';
    const Release_2_4 ='2.4';
    const Release_2_5 ='2.5';
    const Release_2_5_1 ='2.5.1';

}
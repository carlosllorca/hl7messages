<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/17/2017
 * Time: 4:22 PM
 */

namespace carlosllorca\hl7messages\Interfaces;


interface PTInterface
{
    /**Get PT: Processing Type
     * This data type indicates whether to process a message as defined in HL7 Application (level 7) Processing rules.*/
    function GetProcessingType();
}
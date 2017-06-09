<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/17/2017
 * Time: 11:09 AM
 */

namespace carlosllorca\hl7messages\Encoders;

/**
 * Class Guid
 * @package carlosllorca\hl7messages\Encoders
 */
class Guid
{
    /**
     * @return string Guid
     */
    public function NewGuid()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
}
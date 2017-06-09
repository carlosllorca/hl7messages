<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/17/2017
 * Time: 4:19 PM
 */

namespace carlosllorca\hl7messages\Segments;


use carlosllorca\hl7messages\Encoders\Pt1;
use carlosllorca\hl7messages\Interfaces\PTInterface;
use yii\base\Object;

class Pt extends Object implements PTInterface {

    public $pt1;

    /**
     * Pt constructor.
     * @param Pt1 $pt1
     * @param array $config
     */
    public function __construct(Pt1 $pt1, $config = [])
    {
        $this->pt1 = $pt1;
        parent::__construct($config);
    }

    /**Get PT: Processing Type
     * This data type indicates whether to process a message as defined in HL7 Application (level 7) Processing rules.*/
    function GetProcessingType()
    {
        return $this->pt1;
    }

}
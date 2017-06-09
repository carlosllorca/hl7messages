<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/26/2017
 * Time: 10:26 AM
 */

namespace Hl7v2\DataType;


class AuiDataType extends ComponentDataType
{
    const MAX_LEN = 239;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $authorizationNumber;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $date;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $source;

    /**
     * @param string $authorizationNumber
     */
    public function setAuthorizationNumber($authorizationNumber = null)
    {
        $this->authorizationNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->authorizationNumber->setValue($authorizationNumber);
    }

    /**
     * @param string $date
     */
    public function setDate($date = null)
    {
        $this->date = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
        ;
        $this->date->setValue($date);
    }

    /**
     * @param string $source
     */
    public function setSource ($source = null)
    {
        $this->source = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->source->setValue($source);
    }


    /**
     * @return StDataType
     */
    public function getAuthorizationNumber()
    {
        return $this->authorizationNumber;
    }

    /**
     * @return DtDataType
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return StDataType
     */
    public function getSource()
    {
        return $this->source;
    }


}
<?php

namespace Hl7v2\DataType;

/**
 * Street Address (SAD).
 */
class SadDataType extends ComponentDataType
{
    const MAX_LEN = 184;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $streetOrMailingAddress;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $streetName;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $dwellingNumber;

    /**
     * @param string $streetOrMailingAddress
     */
    public function setStreetOrMailingAddress($streetOrMailingAddress = null)
    {
        $this->streetOrMailingAddress = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->streetOrMailingAddress->setValue($streetOrMailingAddress);
    }

    /**
     * @param string $streetName
     */
    public function setStreetName($streetName = null)
    {
        $this->streetName = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->streetName->setValue($streetName);
    }

    /**
     * @param string $dwellingNumber
     */
    public function setDwellingNumber($dwellingNumber = null)
    {
        $this->dwellingNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->dwellingNumber->setValue($dwellingNumber);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getStreetOrMailingAddress()
    {
        return $this->streetOrMailingAddress;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getDwellingNumber()
    {
        return $this->dwellingNumber;
    }
}

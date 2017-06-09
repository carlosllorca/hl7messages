<?php

namespace Hl7v2\DataType;

/**
 * Parent Result Link (PRL).
 */
class PrlDataType extends ComponentDataType
{
    const MAX_LEN = 755;

    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $parentObservationIdentifier;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $parentObservationSubIdentifier;
    /**
     * @var \Hl7v2\DataType\TxDataType
     */
    public $parentObservationValueDescriptor;

    /**
     * @param string $parentObservationIdentifierIdentifier
     * @param string $parentObservationIdentifierText
     * @param string $parentObservationIdentifierNameOfCodingSystem
     * @param string $parentObservationIdentifierAltIdentifier
     * @param string $parentObservationIdentifierAltText
     * @param string $parentObservationIdentifierNameOfAltCodingSystem
     */
    public function setParentObservationIdentifier(
        $parentObservationIdentifierIdentifier = null,
        $parentObservationIdentifierText = null,
        $parentObservationIdentifierNameOfCodingSystem = null,
        $parentObservationIdentifierAltIdentifier = null,
        $parentObservationIdentifierAltText = null,
        $parentObservationIdentifierNameOfAltCodingSystem = null
    ) {
        $this->parentObservationIdentifier = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->parentObservationIdentifier->setIdentifier($parentObservationIdentifierIdentifier);
        $this->parentObservationIdentifier->setText($parentObservationIdentifierText);
        $this->parentObservationIdentifier->setNameOfCodingSystem(
            $parentObservationIdentifierNameOfCodingSystem
        );
        $this->parentObservationIdentifier->setAltIdentifier(
            $parentObservationIdentifierAltIdentifier
        );
        $this->parentObservationIdentifier->setAltText($parentObservationIdentifierAltText);
        $this->parentObservationIdentifier->setNameOfAltCodingSystem(
            $parentObservationIdentifierNameOfAltCodingSystem
        );
    }

    /**
     * @param string $parentObservationSubIdentifier
     */
    public function setParentObservationSubIdentifier($parentObservationSubIdentifier = null)
    {
        $this->parentObservationSubIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->parentObservationSubIdentifier->setValue($parentObservationSubIdentifier);
    }

    /**
     * @param string $parentObservationValueDescriptor
     */
    public function setParentObservationValueDescriptor($parentObservationValueDescriptor = null)
    {
        $this->parentObservationValueDescriptor = $this
            ->dataTypeFactory
            ->create('TX', $this->characterEncoding)
        ;
        $this->parentObservationValueDescriptor->setValue($parentObservationValueDescriptor);
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getParentObservationIdentifier()
    {
        return $this->parentObservationIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getParentObservationSubIdentifier()
    {
        return $this->parentObservationSubIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\TxDataType
     */
    public function getParentObservationValueDescriptor()
    {
        return $this->parentObservationValueDescriptor;
    }
}

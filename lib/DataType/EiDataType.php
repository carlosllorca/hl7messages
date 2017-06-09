<?php

namespace Hl7v2\DataType;

/**
 * Entity Identifier (EI).
 */
class EiDataType extends ComponentDataType
{
    const MAX_LEN = 427;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $entityIdentifier;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $namespaceId;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $universalId;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $universalIdType;

    /**
     * @param string $entityIdentifier
     */
    public function setEntityIdentifier($entityIdentifier = null)
    {
        $this->entityIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->entityIdentifier->setValue($entityIdentifier);
    }

    /**
     * @param string $namespaceId
     */
    public function setNamespaceId($namespaceId = null)
    {
        $this->namespaceId = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->namespaceId->setValue($namespaceId);
    }

    /**
     * @param string $universalId
     */
    public function setUniversalId($universalId = null)
    {
        $this->universalId = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->universalId->setValue($universalId);
    }

    /**
     * @param string $universalIdType
     */
    public function setUniversalIdType($universalIdType = null)
    {
        $this->universalIdType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->universalIdType->setValue($universalIdType);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getEntityIdentifier()
    {
        return $this->entityIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getNamespaceId()
    {
        return $this->namespaceId;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getUniversalId()
    {
        return $this->universalId;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getUniversalIdType()
    {
        return $this->universalIdType;
    }
}

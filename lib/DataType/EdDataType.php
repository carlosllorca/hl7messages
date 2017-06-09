<?php

namespace Hl7v2\DataType;

/**
 * Encapsulated Data (ED).
 */
class EdDataType extends ComponentDataType
{
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    public $sourceApplication;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $typeOfData;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $dataSubtype;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $encoding;
    /**
     * @var \Hl7v2\DataType\TxDataType
     */
    public $data;

    /**
     * @param string $sourceApplicationNamespaceId
     * @param string $sourceApplicationUniversalId
     * @param string $sourceApplicationUniversalIdType
     */
    public function setSourceApplication(
        $sourceApplicationNamespaceId,
        $sourceApplicationUniversalId,
        $sourceApplicationUniversalIdType
    ) {
        $this->sourceApplication = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->sourceApplication->setNamespaceId($sourceApplicationNamespaceId);
        $this->sourceApplication->setUniversalId(
            $sourceApplicationUniversalId,
            $sourceApplicationUniversalIdType
        );
    }

    /**
     * @param string $typeOfData
     */
    public function setTypeOfData($typeOfData)
    {
        $this->typeOfData = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->typeOfData->setValue($typeOfData);
    }

    /**
     * @param string $dataSubtype
     */
    public function setDataSubtype($dataSubtype = null)
    {
        $this->dataSubtype = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->dataSubtype->setValue($dataSubtype);
    }

    /**
     * @param string $encoding
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->encoding->setValue($encoding);
    }

    /**
     * @param string $data
     */
    public function setData($data)
    {
        $this->data = $this
            ->dataTypeFactory
            ->create('TX', $this->characterEncoding)
        ;
        $this->data->setValue($data);
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getSourceApplication()
    {
        return $this->sourceApplication;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getTypeOfData()
    {
        return $this->typeOfData;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getDataSubtype()
    {
        return $this->dataSubtype;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * @return \Hl7v2\DataType\TxDataType
     */
    public function getData()
    {
        return $this->data;
    }
}

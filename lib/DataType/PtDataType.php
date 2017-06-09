<?php

namespace Hl7v2\DataType;

/**
 * Processing Type (PT).
 */
class PtDataType extends ComponentDataType
{
    const MAX_LEN = 3;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $processingId;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $processingMode;

    /**
     * @param string $processingId
     */
    public function setProcessingId($processingId = null)
    {
        $this->processingId = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->processingId->setValue($processingId);
    }

    /**
     * @param string $processingMode
     */
    public function setProcessingMode($processingMode = null)
    {
        $this->processingMode = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->processingMode->setValue($processingMode);
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getProcessingId()
    {
        return $this->processingId;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getProcessingMode()
    {
        return $this->processingMode;
    }
}

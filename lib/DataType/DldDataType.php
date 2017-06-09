<?php

namespace Hl7v2\DataType;

/**
 * Discharge to Location and Date (DLD).
 */
class DldDataType extends ComponentDataType
{
    const MAX_LEN = 47;

    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $dischargeLocation;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $effectiveDate;

    /**
     * @param string $dischargeLocation
     */
    public function setDischargeLocation($dischargeLocation)
    {
        $this->dischargeLocation = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->dischargeLocation->setValue($dischargeLocation);
    }

    /**
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     */
    public function setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision = null)
    {
        $this->effectiveDate = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->effectiveDate->setTime($effectiveDateTime);
        $this->effectiveDate->setDegreeOfPrecision($effectiveDateDegreeOfPrecision);
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getDischargeLocation()
    {
        return $this->dischargeLocation;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }
}

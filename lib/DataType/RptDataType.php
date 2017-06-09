<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/25/2017
 * Time: 2:06 PM
 */

namespace Hl7v2\DataType;

/**
 * Class RptDataType
 * @package Hl7v2\DataType
 * RPT: Repeat Pattern
 */
class RptDataType extends ComponentDataType
{
    const MAX_LEN = 984;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $repeatPatternCode;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $calendarAlignment = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $phaseRangeBeginValue = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $phaseRangeEndValue = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $periodQuantity = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $periodUnits = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $institutionSpecifiedTime = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $event = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $eventOffsetQuantity = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $eventOffsetUnits = null;
    /**
     * @var \Hl7v2\DataType\GtsDataType
     */
    public $generalTimingSpecification = null;

    public function setRepeatPatternCode($additivesIdentifier = null,
                                         $additivesText = null,
                                         $additivesNameOfCodingSystem = null,
                                         $additivesAltIdentifier = null,
                                         $additivesAltText = null,
                                         $additivesNameOfAltCodingSystem = null,
                                         $additivesCodingSystemVersionId = null,
                                         $additivesAltCodingSystemVersionId = null,
                                         $additivesOriginalText = null
    ) {
        $this->additives = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->repeatPatternCode->setIdentifier($additivesIdentifier);
        $this->repeatPatternCode->setText($additivesText);
        $this->repeatPatternCode->setNameOfCodingSystem($additivesNameOfCodingSystem);
        $this->repeatPatternCode->setAltIdentifier($additivesAltIdentifier);
        $this->repeatPatternCode->setAltText($additivesAltText);
        $this->repeatPatternCode->setNameOfAltCodingSystem($additivesNameOfAltCodingSystem);
        $this->repeatPatternCode->setCodingSystemVersionId($additivesCodingSystemVersionId);
        $this->repeatPatternCode->setAltCodingSystemVersionId($additivesAltCodingSystemVersionId);
        $this->repeatPatternCode->setOriginalText($additivesOriginalText);
    }

    /**
     * @param string $calendarAlignment
     */
    public function setCalendarAlignment($calendarAlignment = null)
    {
        $this->calendarAlignment = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->calendarAlignment->setValue($calendarAlignment);
    }

    /**
     * @param string $phaseRangeBeginValue
     */
    public function setPhaseRangeBeginValue($phaseRangeBeginValue = null)
    {
        $this->phaseRangeBeginValue = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->phaseRangeBeginValue->setValue($phaseRangeBeginValue);
    }

    /**
     * @param string $phaseRangeEndValue
     */
    public function setPhaseRangeEndValue($phaseRangeEndValue = null)
    {
        $this->phaseRangeEndValue = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->phaseRangeEndValue->setValue($phaseRangeEndValue);
    }

    /**
     * @param string $periodQuantity
     */
    public function setPeriodQuantity($periodQuantity = null)
    {
        $this->periodQuantity = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->periodQuantity->setValue($periodQuantity);
    }

    /**
     * @param string $periodUnits
     */
    public function setPeriodUnits($periodUnits = null)
    {
        $this->periodUnits = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->periodUnits->setValue($periodUnits);
    }

    /**
     * @param string $institutionSpecifiedTime
     */
    public function setInstitutionSpecifiedTime($institutionSpecifiedTime = null)
    {
        $this->institutionSpecifiedTime = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->institutionSpecifiedTime->setValue($institutionSpecifiedTime);
    }

    /**
     * @param string $event
     */
    public function setEvent($event = null)
    {
        $this->event = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->event->setValue($event);
    }

    /**
     * @param string $eventOffsetQuantity
     */
    public function setEventOffsetQuantity($eventOffsetQuantity = null)
    {
        $this->eventOffsetQuantity = $this
            ->dataTypeFactory
            ->create('MN', $this->characterEncoding)
        ;
        $this->eventOffsetQuantity->setValue($eventOffsetQuantity);
    }

    /**
     * @param string $eventOffsetUnits
     */
    public function setEventOffsetUnits($eventOffsetUnits = null)
    {
        $this->eventOffsetUnits = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->eventOffsetUnits->setValue($eventOffsetUnits);
    }

    /**
     * @param string $generalTimingSpecification
     */
    public function setGeneralTimingSpecification($generalTimingSpecification = null)
    {
        $this->generalTimingSpecification = $this
            ->dataTypeFactory
            ->create('GTS', $this->characterEncoding)
        ;
        $this->generalTimingSpecification->setValue($generalTimingSpecification);
    }

    /**
     * @return CweDataType
     */
    public function getRepeatPatternCode()
    {
        return $this->RepeatPatternCode;
    }

    /**
     * @return IdDataType
     */
    public function getCalendarAlignment()
    {
        return $this->CalendarAlignment;
    }

    /**
     * @return NmDataType
     */
    public function getPhaseRangeBeginValue()
    {
        return $this->PhaseRangeBeginValue;
    }

    /**
     * @return NmDataType
     */
    public function getPhaseRangeEndValue()
    {
        return $this->PhaseRangeEndValue;
    }

    /**
     * @return NmDataType
     */
    public function getPeriodQuantity()
    {
        return $this->PeriodQuantity;
    }

    /**
     * @return IsDataType
     */
    public function getPeriodUnits()
    {
        return $this->PeriodUnits;
    }

    /**
     * @return IdDataType
     */
    public function getInstitutionSpecifiedTime()
    {
        return $this->InstitutionSpecifiedTime;
    }

    /**
     * @return IdDataType
     */
    public function getEvent()
    {
        return $this->Event;
    }

    /**
     * @return NmDataType
     */
    public function getEventOffsetQuantity()
    {
        return $this->EventOffsetQuantity;
    }

    /**
     * @return IsDataType
     */
    public function getEventOffsetUnits()
    {
        return $this->EventOffsetUnits;
    }

    /**
     * @return GtsDataType
     */
    public function getGeneralTimingSpecification()
    {
        return $this->GeneralTimingSpecification;
    }




}
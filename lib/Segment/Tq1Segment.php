<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/25/2017
 * Time: 2:00 PM
 */

namespace Hl7v2\Segment;


use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\SegmentError;

/**
 * TQ1: Timing/Quantity
 * The TQ1 segment is used to specify the complex timing of events and actions such as those that occur in order management
 * and scheduling systems.
 * This segment determines the quantity, frequency, priority, and timing of a service.
 * By allowing the segment to repeat, it is possible to have service requests that vary the quantity,
 * frequency and priority of a service request over time.
 */
class Tq1Segment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\SiDataType
     */
    public $setID_TQ1 = null;

    /**
     * @var \Hl7v2\DataType\CqDataType
     */
    public $quantity = null;

    /**
     * @var \Hl7v2\DataType\RptDataType[]
     */
    public $repeatPattern = [];
    /**
     * @var \Hl7v2\DataType\TmDataType[]
     */
    public $explicitTime = [];
    /**
     * @var \Hl7v2\DataType\CqDataType[]
     */
    public $relativeTimeandUnits = [];
    /**
     * @var \Hl7v2\DataType\CqDataType
     */
    public $serviceDuration = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $startdate_time = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $enddate_time = null;
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $priority = [];
    /**
     * @var \Hl7v2\DataType\TxDataType
     */
    public $conditiontext = null;
    /**
     * @var \Hl7v2\DataType\TxDataType
     */
    public $textinstruction = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $conjunction = null;
    /**
     * @var \Hl7v2\DataType\CqDataType
     */
    public $occurrenceduration = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $totaloccurrences = null;

    /*** Crea la class dado el mensaje creado en el Datagram y return datagram***/
    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // TQ1.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetId', 4, $datagram->getPositionalState());
        $this->setFieldSetID_TQ1($codec->extractComponent($datagram));

        //TQ1.2
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Quantity', 20, $datagram->getPositionalState());
        $sequence = [1,[1,1,1,1,1,1]];
        list(
            $quantity,
            list(
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem,
            ),
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldQuantity(
            $quantity,
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );

        //TQ1.3
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Quantity', 540, $datagram->getPositionalState());
        $sequence = [[1,1,1,1,1,1,1,1,1],1,1,1,1,1,1,1,1,1,1];
        list(
            list($additivesIdentifier,
            $additivesText,
            $additivesNameOfCodingSystem,
            $additivesAltIdentifier,
            $additivesAltText,
            $additivesNameOfAltCodingSystem,
            $additivesCodingSystemVersionId,
            $additivesAltCodingSystemVersionId,
            $additivesOriginalText),
            $calendarAlignment,
            $phaseRangeBeginValue,
            $phaseRangeEndValue,
            $periodQuantity,
            $periodUnits,
            $institutionSpecifiedTime,
            $event,
            $eventOffsetQuantity,
            $eventOffsetUnits,
            $generalTimingSpecification
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->addFieldRepeatPattern(
            $additivesIdentifier,
            $additivesText,
            $additivesNameOfCodingSystem,
            $additivesAltIdentifier,
            $additivesAltText,
            $additivesNameOfAltCodingSystem,
            $additivesCodingSystemVersionId,
            $additivesAltCodingSystemVersionId,
            $additivesOriginalText,
            $calendarAlignment,
            $phaseRangeBeginValue,
            $phaseRangeEndValue,
            $periodQuantity,
            $periodUnits,
            $institutionSpecifiedTime,
            $event,
            $eventOffsetQuantity,
            $eventOffsetUnits,
            $generalTimingSpecification

        );

        //TQ1.4
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ExplicitTime', 20, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldExplicitTime($value);
        }

        //TQ1.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('RelativeTimeandUnits', 20, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $quantity,
                list(
                $unitsIdentifier,
                $unitsText,
                $unitsNameOfCodingSystem,
                $unitsAltIdentifier,
                $unitsAltText,
                $unitsNameOfAltCodingSystem,
                )) = $components;
            $this->addFieldRelativeTimeandUnits(
                $quantity,
                $unitsIdentifier,
                $unitsText,
                $unitsNameOfCodingSystem,
                $unitsAltIdentifier,
                $unitsAltText,
                $unitsNameOfAltCodingSystem
            );
        }

        //TQ1.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ServiceDuration', 20, $datagram->getPositionalState());
        $sequence = [1,[1,1,1,1,1,1]];
        list(
            $quantity,
            list(
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem,
            ),
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldServiceDuration(
            $quantity,
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );

        //TQ1.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Startdate_time', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldStartdate_time(
            $time,
            $degreeOfPrecision
        );

        //TQ1.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Enddate_time', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEnddate_time(
            $time,
            $degreeOfPrecision
        );

        //TQ1.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Priority', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
                $codingSystemVersionId,
                $altCodingSystemVersionId,
                $originalText,
                ) = $components;
            $this->addFieldPriority(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem,
                $codingSystemVersionId,
                $altCodingSystemVersionId,
                $originalText
            );
        }


        //TQ1.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Conditiontext', 250, $datagram->getPositionalState());
        $this->setFieldConditiontext($codec->extractComponent($datagram));


        //TQ1.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Textinstruction', 250, $datagram->getPositionalState());
        $this->setFieldTextinstruction($codec->extractComponent($datagram));

        //TQ1.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Conjunction', 10, $datagram->getPositionalState());
        $this->setFieldConjunction($codec->extractComponent($datagram));

        //TQ1.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Occurrenceduration', 20, $datagram->getPositionalState());
        $sequence = [1,[1,1,1,1,1,1]];
        list(
            $quantity,
            list(
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem,
            ),
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldOccurrenceduration(
            $quantity,
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );

        //TQ1.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Totaloccurrences', 10, $datagram->getPositionalState());
        $this->setFieldTotaloccurrences($codec->extractComponent($datagram));



    }

    /**
     * @param string $value
     */
    public function setFieldSetID_TQ1($value)
    {
        $this->setId = $this
            ->dataTypeFactory
            ->create('SI', $this->characterEncoding)
        ;
        $this->setID_TQ1->setValue($value);
    }

    /**
     * @param string $quantity
     * @param string $unitsIdentifier
     * @param string $unitsText
     * @param string $unitsNameOfCodingSystem
     * @param string $unitsAltIdentifier
     * @param string $unitsAltText
     * @param string $unitsNameOfAltCodingSystem
     */
    public function setFieldQuantity(
        $quantity = null,
        $unitsIdentifier = null,
        $unitsText = null,
        $unitsNameOfCodingSystem = null,
        $unitsAltIdentifier = null,
        $unitsAltText = null,
        $unitsNameOfAltCodingSystem = null
    ) {
        $this->quantity = $this
            ->dataTypeFactory
            ->create('CQ', $this->characterEncoding)
        ;
        $this->quantity->setQuantity($quantity);
        $this->quantity->setUnits(
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );
    }

    /**
     * @param string $additivesIdentifier
     * @param string $additivesText
     * @param string $additivesNameOfCodingSystem
     * @param string $additivesAltIdentifier
     * @param string $additivesAltText
     * @param string $additivesNameOfAltCodingSystem
     * @param string $additivesCodingSystemVersionId
     * @param string $additivesAltCodingSystemVersionId
     * @param string $additivesOriginalText
     * @param string $calendarAlignment
     * @param string $phaseRangeBeginValue
     * @param string $phaseRangeEndValue
     * @param string $periodQuantity
     * @param string $periodUnits
     * @param string $institutionSpecifiedTime
     * @param string $event
     * @param string $eventOffsetQuantity
     * @param string $eventOffsetUnits
     * @param string $generalTimingSpecification
     */
    public function addFieldRepeatPattern(
        $additivesIdentifier = null,
        $additivesText = null,
        $additivesNameOfCodingSystem = null,
        $additivesAltIdentifier = null,
        $additivesAltText = null,
        $additivesNameOfAltCodingSystem = null,
        $additivesCodingSystemVersionId = null,
        $additivesAltCodingSystemVersionId = null,
        $additivesOriginalText = null,
        $calendarAlignment = null,
        $phaseRangeBeginValue = null,
        $phaseRangeEndValue = null,
        $periodQuantity = null,
        $periodUnits = null,
        $institutionSpecifiedTime = null,
        $event = null,
        $eventOffsetQuantity = null,
        $eventOffsetUnits = null,
        $generalTimingSpecification  = null
    ){
        $repeatPattern = $this
            ->dataTypeFactory
            ->create('RPT', $this->characterEncoding)
        ;
        $this->repeatPattern[] = $repeatPattern;
        $repeatPattern->setRepeatPatternCode($additivesIdentifier,
            $additivesText,
            $additivesNameOfCodingSystem,
            $additivesAltIdentifier,
            $additivesAltText,
            $additivesNameOfAltCodingSystem,
            $additivesCodingSystemVersionId,
            $additivesAltCodingSystemVersionId,
            $additivesOriginalText);
        $repeatPattern->setCalendarAlignment($calendarAlignment);
        $repeatPattern->setPhaseRangeBeginValue($phaseRangeBeginValue);
        $repeatPattern->setPhaseRangeEndValue($phaseRangeEndValue);
        $repeatPattern->setPeriodQuantity($periodQuantity);
        $repeatPattern->setPeriodUnits($periodUnits);
        $repeatPattern->setInstitutionSpecifiedTime($institutionSpecifiedTime);
        $repeatPattern->setEvent($event);
        $repeatPattern->setEventOffsetQuantity($eventOffsetQuantity);
        $repeatPattern->setEventOffsetUnits($eventOffsetUnits);
        $repeatPattern->setGeneralTimingSpecification($generalTimingSpecification);
    }

    /**
     * @param string $value
     */
    public function addFieldExplicitTime($value)
    {
        $explicitTime = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $explicitTime->setValue($value);
        $this->explicitTime[] = $explicitTime;
    }

    /**
     * @param string $quantity
     * @param string $unitsIdentifier
     * @param string $unitsText
     * @param string $unitsNameOfCodingSystem
     * @param string $unitsAltIdentifier
     * @param string $unitsAltText
     * @param string $unitsNameOfAltCodingSystem
     */
    public function setFieldServiceDuration(
        $quantity = null,
        $unitsIdentifier = null,
        $unitsText = null,
        $unitsNameOfCodingSystem = null,
        $unitsAltIdentifier = null,
        $unitsAltText = null,
        $unitsNameOfAltCodingSystem = null
    ) {
        $this->serviceDuration = $this
            ->dataTypeFactory
            ->create('CQ', $this->characterEncoding)
        ;
        $this->serviceDuration->setQuantity($quantity);
        $this->serviceDuration->setUnits(
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );
    }

    /**
     * @param string $quantity
     * @param string $unitsIdentifier
     * @param string $unitsText
     * @param string $unitsNameOfCodingSystem
     * @param string $unitsAltIdentifier
     * @param string $unitsAltText
     * @param string $unitsNameOfAltCodingSystem
     */
    public function addFieldRelativeTimeandUnits(
        $quantity = null,
        $unitsIdentifier = null,
        $unitsText = null,
        $unitsNameOfCodingSystem = null,
        $unitsAltIdentifier = null,
        $unitsAltText = null,
        $unitsNameOfAltCodingSystem = null
    ) {
        $relativeTimeandUnits = $this
            ->dataTypeFactory
            ->create('CQ', $this->characterEncoding)
        ;
        $this->$relativeTimeandUnits[] = $relativeTimeandUnits;
        $relativeTimeandUnits->setQuantity($quantity);
        $relativeTimeandUnits->setUnits(
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldStartdate_time($time, $degreeOfPrecision = null)
    {
        $this->startdate_time = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->startdate_time->setTime($time);
        $this->startdate_time->setDegreeOfPrecision($degreeOfPrecision);
    }


    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldEnddate_time($time, $degreeOfPrecision = null)
    {
        $this->enddate_time = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->enddate_time->setTime($time);
        $this->enddate_time->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $altCodingSystemVersionId
     * @param string $originalText
     */
    public function addFieldPriority(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null,
        $codingSystemVersionId = null,
        $altCodingSystemVersionId = null,
        $originalText = null
    ) {
        $priority = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->priority[] = $priority;
        $priority->setIdentifier($identifier);
        $priority->setText($text);
        $priority->setNameOfCodingSystem($nameOfCodingSystem);
        $priority->setAltIdentifier($altIdentifier);
        $priority->setAltText($altText);
        $priority->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $priority->setCodingSystemVersionId($codingSystemVersionId);
        $priority->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $priority->setOriginalText($originalText);
    }

    /**
     * @param string $value
     */
    public function setFieldConditiontext($value)
    {
        $this->conditiontext = $this
            ->dataTypeFactory
            ->create('TX', $this->characterEncoding)
        ;
        $this->conditiontext->setValue($value);
    }


    /**
     * @param string $value
     */
    public function setFieldTextinstruction($value)
    {
        $this->textinstruction = $this
            ->dataTypeFactory
            ->create('TX', $this->characterEncoding)
        ;
        $this->textinstruction->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldConjunction($value)
    {
        $this->conjunction = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->conjunction->setValue($value);
    }

    /**
     * @param string $quantity
     * @param string $unitsIdentifier
     * @param string $unitsText
     * @param string $unitsNameOfCodingSystem
     * @param string $unitsAltIdentifier
     * @param string $unitsAltText
     * @param string $unitsNameOfAltCodingSystem
     */
    public function setFieldOccurrenceduration(
        $quantity = null,
        $unitsIdentifier = null,
        $unitsText = null,
        $unitsNameOfCodingSystem = null,
        $unitsAltIdentifier = null,
        $unitsAltText = null,
        $unitsNameOfAltCodingSystem = null
    ) {
        $this->occurrenceduration = $this
            ->dataTypeFactory
            ->create('CQ', $this->characterEncoding)
        ;
        $this->occurrenceduration->setQuantity($quantity);
        $this->occurrenceduration->setUnits(
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );
    }

    /**
     * @param string $value
     */
    public function setFieldTotaloccurrences($value)
    {
        $this->totaloccurrences = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->totaloccurrences->setValue($value);
    }


    /**
     * @return \Hl7v2\DataType\SiDataType
     */
    public function getSetIDTQ1()
    {
        return $this->setID_TQ1;
    }

    /**
     * @return \Hl7v2\DataType\CqDataType
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return \Hl7v2\DataType\RptDataType
     */
    public function getRepeatPattern()
    {
        return $this->repeatPattern;
    }

    /**
     * @return \Hl7v2\DataType\TmDataType
     */
    public function getExplicitTime()
    {
        return $this->explicitTime;
    }

    /**
     * @return \Hl7v2\DataType\CqDataType
     */
    public function getRelativeTimeandUnits()
    {
        return $this->relativeTimeandUnits;
    }

    /**
     * @return \Hl7v2\DataType\CqDataType
     */
    public function getServiceDuration()
    {
        return $this->serviceDuration;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getStartdateTime()
    {
        return $this->startdate_time;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getEnddateTime()
    {
        return $this->enddate_time;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @return \Hl7v2\DataType\TxDataType
     */
    public function getConditiontext()
    {
        return $this->conditiontext;
    }

    /**
     * @return \Hl7v2\DataType\TxDataType
     */
    public function getTextinstruction()
    {
        return $this->textinstruction;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getConjunction()
    {
        return $this->conjunction;
    }

    /**
     * @return \Hl7v2\DataType\CqDataType
     */
    public function getOccurrenceduration()
    {
        return $this->occurrenceduration;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getTotaloccurrences()
    {
        return $this->totaloccurrences;
    }


}
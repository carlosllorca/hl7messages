<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/25/2017
 * Time: 7:16 PM
 */

namespace Hl7v2\Segment;


use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\SegmentError;

/**
 * SPM: Specimen
 * The intent of this segment is to describe the characteristics of a specimen.
 * It differs from the intent of the OBR in that the OBR addresses order-specific information.
 * It differs from the SAC segment in that the SAC addresses specimen container attributes.
 * An advantage afforded by a separate specimen segment is that it generalizes the multiple relationships among order(s),
 * results, specimen(s) and specimen container(s).
 */
class SpmSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\SiDataType
     */
    public $setID_SPM = null;
    /**
     * @var \Hl7v2\DataType\EipDataType
     */
    public $specimenID = null;
    /**
     * @var \Hl7v2\DataType\EipDataType[]
     */
    public $specimenParentIDs = [];
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $specimenType;
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $specimenTypeModifier = [];
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $specimenAdditives = [];
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $specimenCollectionMethod = null;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $specimenSourceSite = null;
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $specimenSourceSiteModifier = [];
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $specimenCollectionSite = null;
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $specimenRole = [];
    /**
     * @var \Hl7v2\DataType\CqDataType
     */
    public $specimenCollectionAmount = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $groupedSpecimenCount = null;
    /**
     * @var \Hl7v2\DataType\StDataType[]
     */
    public $specimenDescription = [];
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $specimenHandlingCode = [];
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $specimenRiskCode = [];
    /**
     * @var \Hl7v2\DataType\DrDataType
     */
    public $specimenCollectionDate_Time = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $specimenReceivedDate_Time = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $specimenExpirationDate_Time = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $specimenAvailability = null;
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $specimenRejectReason = [];
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $specimenQuality = null;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $specimenAppropriateness = null;
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $specimenCondition = [];
    /**
     * @var \Hl7v2\DataType\CqDataType
     */
    public $specimenCurrentQuantity = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $numberofSpecimenContainers = null;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $containerType = null;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $containerCondition = null;
    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $specimenChildRole = null;


    /*** Crea la class dado el mensaje creado en el Datagram y return datagram***/
    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // SPM.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetID_SPM', 4, $datagram->getPositionalState());
        $this->setFieldSetID_SPM($codec->extractComponent($datagram));

        // SPM.2
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenID', 80, $datagram->getPositionalState());
        $sequence = [[1,1,1,1],[1,1,1,1]];
        list(
            list(
            $placerAssignedIdentifierEntityIdentifier,
            $placerAssignedIdentifierNamespaceId,
            $placerAssignedIdentifierUniversalId,
            $placerAssignedIdentifierUniversalIdType,
            ),
            list(
            $fillerAssignedIdentifierEntityIdentifier,
            $fillerAssignedIdentifierNamespaceId,
            $fillerAssignedIdentifierUniversalId,
            $fillerAssignedIdentifierUniversalIdType,
            ),
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenID(
            $placerAssignedIdentifierEntityIdentifier,
            $placerAssignedIdentifierNamespaceId,
            $placerAssignedIdentifierUniversalId,
            $placerAssignedIdentifierUniversalIdType,
            $fillerAssignedIdentifierEntityIdentifier,
            $fillerAssignedIdentifierNamespaceId,
            $fillerAssignedIdentifierUniversalId,
            $fillerAssignedIdentifierUniversalIdType
        );

        // SPM.3
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenParentIDs', 80, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $entityIdentifier,
                $namespaceId,
                $universalId,
                $universalIdType,
                ) = $components;
            $this->addFieldSpecimenParentIDs(
                $entityIdentifier,
                $namespaceId,
                $universalId,
                $universalIdType
            );
        }


        // SPM.4
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenType', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenType(
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

        // SPM.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenTypeModifier', 250, $datagram->getPositionalState());
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
            $this->addFieldSpecimenTypeModifier(
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

        // SPM.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenAdditives', 250, $datagram->getPositionalState());
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
            $this->addFieldSpecimenAdditives(
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

        // SPM.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenCollectionMethod', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenCollectionMethod(
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

        // SPM.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenSourceSite', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenSourceSite(
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

        // SPM.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenSourceSiteModifier', 250, $datagram->getPositionalState());
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
            $this->addFieldSpecimenSourceSiteModifier(
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


        // SPM.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenCollectionSite', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenCollectionSite(
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

        // SPM.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenRole', 250, $datagram->getPositionalState());
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
            $this->addFieldSpecimenRole(
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

        // SPM.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenCollectionAmount', 20, $datagram->getPositionalState());
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
        $this->setFieldSpecimenCollectionAmount(
            $quantity,
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );

        //SPM.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('GroupedSpecimenCount', 6, $datagram->getPositionalState());
        $this->setFieldGroupedSpecimenCount($codec->extractComponent($datagram));

        // SPM.14
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBX Segment data contains too few required fields.'
            );
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenDescription', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldSpecimenDescription($value);
        }

        // SPM.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenHandlingCode', 250, $datagram->getPositionalState());
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
            $this->addFieldSpecimenHandlingCode(
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

        // SPM.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenRiskCode', 250, $datagram->getPositionalState());
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
            $this->addFieldSpecimenRiskCode(
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

        //SPM.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenCollectionDate_Time', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            list(
            $rangeStartDateTimeTime,
            $rangeStartDateTimeDegreeOfPrecision,
            ),
            list(
            $rangeEndDateTimeTime,
            $rangeEndDateTimeDegreeOfPrecision,
            ),
            ) = $this->extractComponents($datagram, $codec, $sequence);
            $this->setFieldSpecimenCollectionDate_Time(
                $rangeStartDateTimeTime,
                $rangeStartDateTimeDegreeOfPrecision,
                $rangeEndDateTimeTime,
                $rangeEndDateTimeDegreeOfPrecision
            );

        //SPM.18
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenReceivedDate_Time', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenReceivedDate_Time(
            $time,
            $degreeOfPrecision
        );

        //SPM.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenExpirationDate_Time', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenExpirationDate_Time(
            $time,
            $degreeOfPrecision
        );

        //SPM.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenAvailability', 1, $datagram->getPositionalState());
        $this->setFieldSpecimenAvailability($codec->extractComponent($datagram));


        // SPM.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenRejectReason', 250, $datagram->getPositionalState());
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
            $this->addFieldSpecimenRejectReason(
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


        // SPM.22
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenQuality', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenQuality(
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


        // SPM.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenAppropriateness', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenAppropriateness(
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

        // SPM.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('SpecimenCondition', 250, $datagram->getPositionalState());
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
            $this->addFieldSpecimenCondition(
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

        //SPM.25
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenCurrentQuantity', 20, $datagram->getPositionalState());
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
        $this->setFieldSpecimenCurrentQuantity(
            $quantity,
            $unitsIdentifier,
            $unitsText,
            $unitsNameOfCodingSystem,
            $unitsAltIdentifier,
            $unitsAltText,
            $unitsNameOfAltCodingSystem
        );

        //SPM.26
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('NumberofSpecimenContainers', 4, $datagram->getPositionalState());
        $this->setFieldNumberofSpecimenContainers($codec->extractComponent($datagram));


        // SPM.27
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ContainerType', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldContainerType(
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


        // SPM.28
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ContainerCondition', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldContainerCondition(
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

        // SPM.29
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpecimenChildRole', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpecimenChildRole(
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


    /**
     * @param string $value
     */
    public function setFieldSetID_SPM($value)
    {
        $this->setID_SPM = $this
            ->dataTypeFactory
            ->create('SI', $this->characterEncoding)
        ;
        $this->setID_SPM->setValue($value);
    }

    /**
     * @param string $placerAssignedIdentifierEntityIdentifier
     * @param string $placerAssignedIdentifierNamespaceId
     * @param string $placerAssignedIdentifierUniversalId
     * @param string $placerAssignedIdentifierUniversalIdType
     * @param string $fillerAssignedIdentifierEntityIdentifier
     * @param string $fillerAssignedIdentifierNamespaceId
     * @param string $fillerAssignedIdentifierUniversalId
     * @param string $fillerAssignedIdentifierUniversalIdType
     */
    public function setFieldSpecimenID(
        $placerAssignedIdentifierEntityIdentifier = null,
        $placerAssignedIdentifierNamespaceId = null,
        $placerAssignedIdentifierUniversalId = null,
        $placerAssignedIdentifierUniversalIdType = null,
        $fillerAssignedIdentifierEntityIdentifier = null,
        $fillerAssignedIdentifierNamespaceId = null,
        $fillerAssignedIdentifierUniversalId = null,
        $fillerAssignedIdentifierUniversalIdType = null
    ) {
        $this->specimenID = $this
            ->dataTypeFactory
            ->create('EIP', $this->characterEncoding)
        ;
        $this->specimenID->setPlacerAssignedIdentifier(
            $placerAssignedIdentifierEntityIdentifier,
            $placerAssignedIdentifierNamespaceId,
            $placerAssignedIdentifierUniversalId,
            $placerAssignedIdentifierUniversalIdType
        );
        $this->specimenID->setFillerAssignedIdentifier(
            $fillerAssignedIdentifierEntityIdentifier,
            $fillerAssignedIdentifierNamespaceId,
            $fillerAssignedIdentifierUniversalId,
            $fillerAssignedIdentifierUniversalIdType
        );
    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function addFieldSpecimenParentIDs(
        $entityIdentifier = null,
        $namespaceId = null,
        $universalId = null,
        $universalIdType = null
    ) {
        $specimenParentIDs = $this
            ->dataTypeFactory
            ->create('EI', $this->characterEncoding)
        ;
        $this->specimenParentIDs[] = $specimenParentIDs;
        $specimenParentIDs->setEntityIdentifier($entityIdentifier);
        $specimenParentIDs->setNamespaceId($namespaceId);
        $specimenParentIDs->setUniversalId($universalId);
        $specimenParentIDs->setUniversalIdType($universalIdType);
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
    public function setFieldSpecimenType(
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
        $this->specimenType = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenType->setIdentifier($identifier);
        $this->specimenType->setText($text);
        $this->specimenType->setNameOfCodingSystem($nameOfCodingSystem);
        $this->specimenType->setAltIdentifier($altIdentifier);
        $this->specimenType->setAltText($altText);
        $this->specimenType->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->specimenType->setCodingSystemVersionId($codingSystemVersionId);
        $this->specimenType->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->specimenType->setOriginalText($originalText);
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
    public function setFieldSpecimenCollectionMethod(
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
        $this->specimenCollectionMethod = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenCollectionMethod->setIdentifier($identifier);
        $this->specimenCollectionMethod->setText($text);
        $this->specimenCollectionMethod->setNameOfCodingSystem($nameOfCodingSystem);
        $this->specimenCollectionMethod->setAltIdentifier($altIdentifier);
        $this->specimenCollectionMethod->setAltText($altText);
        $this->specimenCollectionMethod->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->specimenCollectionMethod->setCodingSystemVersionId($codingSystemVersionId);
        $this->specimenCollectionMethod->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->specimenCollectionMethod->setOriginalText($originalText);
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
    public function setFieldSpecimenSourceSite(
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
        $this->specimenSourceSite = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenSourceSite->setIdentifier($identifier);
        $this->specimenSourceSite->setText($text);
        $this->specimenSourceSite->setNameOfCodingSystem($nameOfCodingSystem);
        $this->specimenSourceSite->setAltIdentifier($altIdentifier);
        $this->specimenSourceSite->setAltText($altText);
        $this->specimenSourceSite->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->specimenSourceSite->setCodingSystemVersionId($codingSystemVersionId);
        $this->specimenSourceSite->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->specimenSourceSite->setOriginalText($originalText);
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
    public function setFieldSpecimenCollectionSite(
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
        $this->specimenCollectionSite = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenCollectionSite->setIdentifier($identifier);
        $this->specimenCollectionSite->setText($text);
        $this->specimenCollectionSite->setNameOfCodingSystem($nameOfCodingSystem);
        $this->specimenCollectionSite->setAltIdentifier($altIdentifier);
        $this->specimenCollectionSite->setAltText($altText);
        $this->specimenCollectionSite->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->specimenCollectionSite->setCodingSystemVersionId($codingSystemVersionId);
        $this->specimenCollectionSite->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->specimenCollectionSite->setOriginalText($originalText);
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
    public function setFieldSpecimenQuality(
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
        $this->specimenQuality = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenQuality->setIdentifier($identifier);
        $this->specimenQuality->setText($text);
        $this->specimenQuality->setNameOfCodingSystem($nameOfCodingSystem);
        $this->specimenQuality->setAltIdentifier($altIdentifier);
        $this->specimenQuality->setAltText($altText);
        $this->specimenQuality->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->specimenQuality->setCodingSystemVersionId($codingSystemVersionId);
        $this->specimenQuality->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->specimenQuality->setOriginalText($originalText);
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
    public function setFieldSpecimenAppropriateness(
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
        $this->specimenAppropriateness = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenAppropriateness->setIdentifier($identifier);
        $this->specimenAppropriateness->setText($text);
        $this->specimenAppropriateness->setNameOfCodingSystem($nameOfCodingSystem);
        $this->specimenAppropriateness->setAltIdentifier($altIdentifier);
        $this->specimenAppropriateness->setAltText($altText);
        $this->specimenAppropriateness->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->specimenAppropriateness->setCodingSystemVersionId($codingSystemVersionId);
        $this->specimenAppropriateness->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->specimenAppropriateness->setOriginalText($originalText);
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
    public function setFieldContainerType(
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
        $this->containerType = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->containerType->setIdentifier($identifier);
        $this->containerType->setText($text);
        $this->containerType->setNameOfCodingSystem($nameOfCodingSystem);
        $this->containerType->setAltIdentifier($altIdentifier);
        $this->containerType->setAltText($altText);
        $this->containerType->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->containerType->setCodingSystemVersionId($codingSystemVersionId);
        $this->containerType->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->containerType->setOriginalText($originalText);
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
    public function setFieldContainerCondition(
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
        $this->containerCondition = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->containerCondition->setIdentifier($identifier);
        $this->containerCondition->setText($text);
        $this->containerCondition->setNameOfCodingSystem($nameOfCodingSystem);
        $this->containerCondition->setAltIdentifier($altIdentifier);
        $this->containerCondition->setAltText($altText);
        $this->containerCondition->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->containerCondition->setCodingSystemVersionId($codingSystemVersionId);
        $this->containerCondition->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->containerCondition->setOriginalText($originalText);
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
    public function setFieldSpecimenChildRole(
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
        $this->specimenChildRole = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenChildRole->setIdentifier($identifier);
        $this->specimenChildRole->setText($text);
        $this->specimenChildRole->setNameOfCodingSystem($nameOfCodingSystem);
        $this->specimenChildRole->setAltIdentifier($altIdentifier);
        $this->specimenChildRole->setAltText($altText);
        $this->specimenChildRole->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $this->specimenChildRole->setCodingSystemVersionId($codingSystemVersionId);
        $this->specimenChildRole->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->specimenChildRole->setOriginalText($originalText);
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
    public function addFieldSpecimenTypeModifier(
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
        $specimenTypeModifier = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenTypeModifier[] = $specimenTypeModifier;
        $specimenTypeModifier->setIdentifier($identifier);
        $specimenTypeModifier->setText($text);
        $specimenTypeModifier->setNameOfCodingSystem($nameOfCodingSystem);
        $specimenTypeModifier->setAltIdentifier($altIdentifier);
        $specimenTypeModifier->setAltText($altText);
        $specimenTypeModifier->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $specimenTypeModifier->setCodingSystemVersionId($codingSystemVersionId);
        $specimenTypeModifier->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $specimenTypeModifier->setOriginalText($originalText);
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
    public function addFieldSpecimenAdditives(
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
        $specimenAdditives = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenAdditives[] = $specimenAdditives;
        $specimenAdditives->setIdentifier($identifier);
        $specimenAdditives->setText($text);
        $specimenAdditives->setNameOfCodingSystem($nameOfCodingSystem);
        $specimenAdditives->setAltIdentifier($altIdentifier);
        $specimenAdditives->setAltText($altText);
        $specimenAdditives->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $specimenAdditives->setCodingSystemVersionId($codingSystemVersionId);
        $specimenAdditives->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $specimenAdditives->setOriginalText($originalText);
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
    public function addFieldSpecimenSourceSiteModifier(
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
        $specimenSourceSiteModifier = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenSourceSiteModifier[] = $specimenSourceSiteModifier;
        $specimenSourceSiteModifier->setIdentifier($identifier);
        $specimenSourceSiteModifier->setText($text);
        $specimenSourceSiteModifier->setNameOfCodingSystem($nameOfCodingSystem);
        $specimenSourceSiteModifier->setAltIdentifier($altIdentifier);
        $specimenSourceSiteModifier->setAltText($altText);
        $specimenSourceSiteModifier->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $specimenSourceSiteModifier->setCodingSystemVersionId($codingSystemVersionId);
        $specimenSourceSiteModifier->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $specimenSourceSiteModifier->setOriginalText($originalText);
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
    public function addFieldSpecimenRole(
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
        $specimenRole = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenRole[] = $specimenRole;
        $specimenRole->setIdentifier($identifier);
        $specimenRole->setText($text);
        $specimenRole->setNameOfCodingSystem($nameOfCodingSystem);
        $specimenRole->setAltIdentifier($altIdentifier);
        $specimenRole->setAltText($altText);
        $specimenRole->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $specimenRole->setCodingSystemVersionId($codingSystemVersionId);
        $specimenRole->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $specimenRole->setOriginalText($originalText);
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
    public function setFieldSpecimenCollectionAmount(
        $quantity = null,
        $unitsIdentifier = null,
        $unitsText = null,
        $unitsNameOfCodingSystem = null,
        $unitsAltIdentifier = null,
        $unitsAltText = null,
        $unitsNameOfAltCodingSystem = null
    ) {
        $this->specimenCollectionAmount = $this
            ->dataTypeFactory
            ->create('CQ', $this->characterEncoding)
        ;
        $this->specimenCollectionAmount->setQuantity($quantity);
        $this->specimenCollectionAmount->setUnits(
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
    public function setFieldGroupedSpecimenCount($value)
    {
        $this->groupedSpecimenCount = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->groupedSpecimenCount->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldSpecimenDescription($value)
    {
        $specimenDescription = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $specimenDescription->setValue($value);
        $this->specimenDescription[] = $specimenDescription;
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
    public function addFieldSpecimenHandlingCode(
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
        $specimenHandlingCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenHandlingCode[] = $specimenHandlingCode;
        $specimenHandlingCode->setIdentifier($identifier);
        $specimenHandlingCode->setText($text);
        $specimenHandlingCode->setNameOfCodingSystem($nameOfCodingSystem);
        $specimenHandlingCode->setAltIdentifier($altIdentifier);
        $specimenHandlingCode->setAltText($altText);
        $specimenHandlingCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $specimenHandlingCode->setCodingSystemVersionId($codingSystemVersionId);
        $specimenHandlingCode->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $specimenHandlingCode->setOriginalText($originalText);
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
    public function addFieldSpecimenRiskCode(
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
        $specimenRiskCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenRiskCode[] = $specimenRiskCode;
        $specimenRiskCode->setIdentifier($identifier);
        $specimenRiskCode->setText($text);
        $specimenRiskCode->setNameOfCodingSystem($nameOfCodingSystem);
        $specimenRiskCode->setAltIdentifier($altIdentifier);
        $specimenRiskCode->setAltText($altText);
        $specimenRiskCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $specimenRiskCode->setCodingSystemVersionId($codingSystemVersionId);
        $specimenRiskCode->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $specimenRiskCode->setOriginalText($originalText);
    }

    /**
     * @param string $rangeStartDateTimeTime
     * @param string $rangeStartDateTimeDegreeOfPrecision
     * @param string $rangeEndDateTimeTime
     * @param string $rangeEndDateTimeDegreeOfPrecision
     */
    public function setFieldSpecimenCollectionDate_Time(
        $rangeStartDateTimeTime,
        $rangeStartDateTimeDegreeOfPrecision = null,
        $rangeEndDateTimeTime,
        $rangeEndDateTimeDegreeOfPrecision = null
    ) {
        $this->specimenCollectionDate_Time = $this
            ->dataTypeFactory
            ->create('DR', $this->characterEncoding)
        ;
        $this->specimenCollectionDate_Time->setRangeStartDateTime($rangeStartDateTimeTime,
            $rangeStartDateTimeDegreeOfPrecision);
        $this->specimenCollectionDate_Time->setRangeEndDateTime($rangeEndDateTimeTime,
            $rangeEndDateTimeDegreeOfPrecision);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldSpecimenReceivedDate_Time($time, $degreeOfPrecision = null)
    {
        $this->specimenReceivedDate_Time = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->specimenReceivedDate_Time->setTime($time);
        $this->specimenReceivedDate_Time->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldSpecimenExpirationDate_Time($time, $degreeOfPrecision = null)
    {
        $this->specimenExpirationDate_Time = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->specimenExpirationDate_Time->setTime($time);
        $this->specimenExpirationDate_Time->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldSpecimenAvailability($value)
    {
        $this->specimenAvailability = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->specimenAvailability->setValue($value);
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
    public function addFieldSpecimenRejectReason(
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
        $specimenRejectReason = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenRejectReason[] = $specimenRejectReason;
        $specimenRejectReason->setIdentifier($identifier);
        $specimenRejectReason->setText($text);
        $specimenRejectReason->setNameOfCodingSystem($nameOfCodingSystem);
        $specimenRejectReason->setAltIdentifier($altIdentifier);
        $specimenRejectReason->setAltText($altText);
        $specimenRejectReason->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $specimenRejectReason->setCodingSystemVersionId($codingSystemVersionId);
        $specimenRejectReason->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $specimenRejectReason->setOriginalText($originalText);
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
    public function addFieldSpecimenCondition(
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
        $specimenCondition = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->specimenCondition[] = $specimenCondition;
        $specimenCondition->setIdentifier($identifier);
        $specimenCondition->setText($text);
        $specimenCondition->setNameOfCodingSystem($nameOfCodingSystem);
        $specimenCondition->setAltIdentifier($altIdentifier);
        $specimenCondition->setAltText($altText);
        $specimenCondition->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $specimenCondition->setCodingSystemVersionId($codingSystemVersionId);
        $specimenCondition->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $specimenCondition->setOriginalText($originalText);
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
    public function setFieldSpecimenCurrentQuantity(
        $quantity = null,
        $unitsIdentifier = null,
        $unitsText = null,
        $unitsNameOfCodingSystem = null,
        $unitsAltIdentifier = null,
        $unitsAltText = null,
        $unitsNameOfAltCodingSystem = null
    ) {
        $this->specimenCurrentQuantity = $this
            ->dataTypeFactory
            ->create('CQ', $this->characterEncoding)
        ;
        $this->specimenCurrentQuantity->setQuantity($quantity);
        $this->specimenCurrentQuantity->setUnits(
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
    public function setFieldNumberofSpecimenContainers($value)
    {
        $this->numberofSpecimenContainers = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->numberofSpecimenContainers->setValue($value);
    }


    /**
     * @return \Hl7v2\DataType\SiDataType
     */
    public function getSetIDSPM()
    {
        return $this->SetID_SPM;
    }

    /**
     * @return \Hl7v2\DataType\EipDataType
     */
    public function getSpecimenID()
    {
        return $this->SpecimenID;
    }

    /**
     * @return \Hl7v2\DataType\EipDataType[]
     */
    public function getSpecimenParentIDs()
    {
        return $this->SpecimenParentIDs;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSpecimenType()
    {
        return $this->SpecimenType;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getSpecimenTypeModifier()
    {
        return $this->SpecimenTypeModifier;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getSpecimenAdditives()
    {
        return $this->SpecimenAdditives;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSpecimenCollectionMethod()
    {
        return $this->SpecimenCollectionMethod;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSpecimenSourceSite()
    {
        return $this->SpecimenSourceSite;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getSpecimenSourceSiteModifier()
    {
        return $this->SpecimenSourceSiteModifier;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSpecimenCollectionSite()
    {
        return $this->SpecimenCollectionSite;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getSpecimenRole()
    {
        return $this->SpecimenRole;
    }

    /**
     * @return \Hl7v2\DataType\CqDataType
     */
    public function getSpecimenCollectionAmount()
    {
        return $this->SpecimenCollectionAmount;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getGroupedSpecimenCount()
    {
        return $this->GroupedSpecimenCount;
    }

    /**
     * @return \Hl7v2\DataType\StDataType[]
     */
    public function getSpecimenDescription()
    {
        return $this->SpecimenDescription;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getSpecimenHandlingCode()
    {
        return $this->SpecimenHandlingCode;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getSpecimenRiskCode()
    {
        return $this->SpecimenRiskCode;
    }

    /**
     * @return \Hl7v2\DataType\DrDataType
     */
    public function getSpecimenCollectionDateTime()
    {
        return $this->SpecimenCollectionDate_Time;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getSpecimenReceivedDateTime()
    {
        return $this->SpecimenReceivedDate_Time;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getSpecimenExpirationDateTime()
    {
        return $this->SpecimenExpirationDate_Time;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getSpecimenAvailability()
    {
        return $this->SpecimenAvailability;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getSpecimenRejectReason()
    {
        return $this->SpecimenRejectReason;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSpecimenQuality()
    {
        return $this->SpecimenQuality;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSpecimenAppropriateness()
    {
        return $this->SpecimenAppropriateness;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getSpecimenCondition()
    {
        return $this->SpecimenCondition;
    }

    /**
     * @return \Hl7v2\DataType\CqDataType
     */
    public function getSpecimenCurrentQuantity()
    {
        return $this->SpecimenCurrentQuantity;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getNumberofSpecimenContainers()
    {
        return $this->NumberofSpecimenContainers;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getContainerType()
    {
        return $this->ContainerType;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getContainerCondition()
    {
        return $this->ContainerCondition;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getSpecimenChildRole()
    {
        return $this->SpecimenChildRole;
    }
    
    
}
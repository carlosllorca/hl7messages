<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/24/2017
 * Time: 3:34 PM
 */

namespace Hl7v2\Segment;


use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\SegmentError;

/**
 * ORC: Common Order
 * The Common Order segment (ORC) is used to transmit fields that are common to all orders (all types of services that are requested). The ORC segment is required in the Order (ORM) message.
 * ORC is mandatory in Order Acknowledgment (ORR) messages if an order detail segment is present, but is not required otherwise.
 */
class OrcSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $orderControl;

    /**
     * @var \Hl7v2\DataType\EiDataType
     */
    public $placerOrderNumber = null;

    /**
     * @var \Hl7v2\DataType\EiDataType
     */
    public $fillerOrderNumber = null;

    /**
     * @var \Hl7v2\DataType\EiDataType
     */
    public $placerGroupNumber = null;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $orderStatus = null;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $responseFlag = null;

    /**
     * @var \Hl7v2\DataType\TqDataType[]
     */
    public $quantity_Timing = [];

    /**
     * @var \Hl7v2\DataType\EipDataType
     */
    public $parentOrder = null;

    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $date_TimeofTransaction = null;

    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    public $enteredBy = [];

    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    public $verifiedBy = [];

    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    public $orderingProvider = [];

    /**
     * @var \Hl7v2\DataType\PlDataType
     */
    public $enterersLocation = null;

    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    public $callBackPhoneNumber = [];

    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $orderEffectiveDate_Time = null;

    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $orderControlCodeReason = null;

    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $enteringOrganization = null;

    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $enteringDevice = null;

    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    public $actionBy = [];

    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $advancedBeneficiaryNoticeCode = null;

    /**
     * @var \Hl7v2\DataType\XonDataType[]
     */
    public $orderingFacilityName = [];

    /**
     * @var \Hl7v2\DataType\XadDataType[]
     */
    public $orderingFacilityAddress = [];

    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    public $orderingFacilityPhoneNumber = [];

    /**
     * @var \Hl7v2\DataType\XadDataType[]
     */
    public $orderingProviderAddress = [];

    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $orderStatusModifier = null;

    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $advancedBeneficiaryNoticeOverrideReason = null;

    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $fillersExpectedAvailabilityDate_Time = null;

    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $confidentialityCode = null;

    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $orderType = null;

    /**
     * @var \Hl7v2\DataType\CneDataType
     */
    public $entererAuthorizationMode = null;

    /**
     * @var \Hl7v2\DataType\CweDataType
     */
    public $parentUniversalServiceIdentifier = null;



    /*** Crea la class dado el mensaje creado en el Datagram y return datagram***/
    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // ORC.1
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderControl', 2, $datagram->getPositionalState());
        $this->setFieldOrderControl($codec->extractComponent($datagram));

        // ORC.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'ORC Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('PlacerOrderNumber', 22, $datagram->getPositionalState());
        $sequence = [1,1,1,1];
        list(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPlacerOrderNumber(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType
        );

        //ORC.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'ORC Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('FillerOrderNumber', 22, $datagram->getPositionalState());
        $sequence = [1,1,1,1];
        list(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldFillerOrderNumber(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType
        );

        //ORC.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'ORC Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('PlacerGroupNumber', 22, $datagram->getPositionalState());
        $sequence = [1,1,1,1];
        list(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPlacerGroupNumber(
            $entityIdentifier,
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // ORC.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderStatus', 2, $datagram->getPositionalState());
        $this->setFieldOrderStatus($codec->extractComponent($datagram));


        // ORC.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ResponseFlag', 1, $datagram->getPositionalState());
        $this->setFieldResponseFlag($codec->extractComponent($datagram));

        // OCR.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,[1,1,1,1,1,1]],[1,1],1,[1,1],[1,1],1,1,1,1,[1,1,1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Quantity_Timing', 200, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                $quantityQuantity,
                list(
                $quantityUnitsIdentifier,
                $quantityUnitsText,
                $quantityUnitsNameOfCodingSystem,
                $quantityUnitsAltIdentifier,
                $quantityUnitsAltText,
                $quantityUnitsNameOfAltCodingSystem,
                ),
                ),
                list(
                $intervalRepeatPattern,
                $intervalExplicitTimeInterval,
                ),
                $duration,
                list(
                $startDateTimeTime,
                $startDateTimeDegreeOfPrecision,
                ),
                list(
                $endDateTimeTime,
                $endDateTimeDegreeOfPrecision,
                ),
                $priority,
                $condition,
                $text,
                $conjunction,
                list(
                $orderSequencingSequenceResultsFlag,
                $orderSequencingPlacerOrderNumberEntityIdentifier,
                $orderSequencingPlacerOrderNumberNamespaceId,
                $orderSequencingFillerOrderNumberEntityIdentifier,
                $orderSequencingFillerOrderNumberNamespaceId,
                $orderSequencingSequenceConditionValue,
                $orderSequencingMaximumNumberOfRepeats,
                $orderSequencingPlacerOrderNumberUniversalId,
                $orderSequencingPlacerOrderNumberUniversalIdType,
                $orderSequencingFillerOrderNumberUniversalId,
                $orderSequencingFillerOrderNumberUniversalIdType,
                ),
                list(
                $occurrenceDurationIdentifier,
                $occurrenceDurationText,
                $occurrenceDurationNameOfCodingSystem,
                $occurrenceDurationAltIdentifier,
                $occurrenceDurationAltText,
                $occurrenceDurationNameOfAltCodingSystem,
                ),
                $totalOccurrences,
                ) = $components;
            $this->addFieldQuantity_Timing(
                $quantityQuantity,
                $quantityUnitsIdentifier,
                $quantityUnitsText,
                $quantityUnitsNameOfCodingSystem,
                $quantityUnitsAltIdentifier,
                $quantityUnitsAltText,
                $quantityUnitsNameOfAltCodingSystem,
                $intervalRepeatPattern,
                $intervalExplicitTimeInterval,
                $duration,
                $startDateTimeTime,
                $startDateTimeDegreeOfPrecision,
                $endDateTimeTime,
                $endDateTimeDegreeOfPrecision,
                $priority,
                $condition,
                $text,
                $conjunction,
                $orderSequencingSequenceResultsFlag,
                $orderSequencingPlacerOrderNumberEntityIdentifier,
                $orderSequencingPlacerOrderNumberNamespaceId,
                $orderSequencingFillerOrderNumberEntityIdentifier,
                $orderSequencingFillerOrderNumberNamespaceId,
                $orderSequencingSequenceConditionValue,
                $orderSequencingMaximumNumberOfRepeats,
                $orderSequencingPlacerOrderNumberUniversalId,
                $orderSequencingPlacerOrderNumberUniversalIdType,
                $orderSequencingFillerOrderNumberUniversalId,
                $orderSequencingFillerOrderNumberUniversalIdType,
                $occurrenceDurationIdentifier,
                $occurrenceDurationText,
                $occurrenceDurationNameOfCodingSystem,
                $occurrenceDurationAltIdentifier,
                $occurrenceDurationAltText,
                $occurrenceDurationNameOfAltCodingSystem,
                $totalOccurrences
            );
        }


        // OCR.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ParentOrder', 200, $datagram->getPositionalState());
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
        $this->setFieldParentOrder(
            $placerAssignedIdentifierEntityIdentifier,
            $placerAssignedIdentifierNamespaceId,
            $placerAssignedIdentifierUniversalId,
            $placerAssignedIdentifierUniversalIdType,
            $fillerAssignedIdentifierEntityIdentifier,
            $fillerAssignedIdentifierNamespaceId,
            $fillerAssignedIdentifierUniversalId,
            $fillerAssignedIdentifierUniversalIdType
        );

        // PID.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Date_TimeofTransaction', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDate_TimeofTransaction(
            $time,
            $degreeOfPrecision
        );


        // OCR.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('EnteredBy', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
                list(
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                ),
                list(
                list(
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                ),
                list(
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                ),
                ),
                $nameAssemblyOrder,
                list(
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                ),
                list(
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                ),
                list(
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText,
                ),
                ) = $components;
            $this->addFieldEnteredBy(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
            );
        }

        // OCR.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('VerifiedBy', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
                list(
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                ),
                list(
                list(
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                ),
                list(
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                ),
                ),
                $nameAssemblyOrder,
                list(
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                ),
                list(
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                ),
                list(
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText,
                ),
                ) = $components;
            $this->addFieldVerifiedBy(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
            );
        }


// OCR.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingProvider', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
                list(
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                ),
                list(
                list(
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                ),
                list(
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                ),
                ),
                $nameAssemblyOrder,
                list(
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                ),
                list(
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                ),
                list(
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText,
                ),
                ) = $components;
            $this->addFieldOrderingProvider(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
            );
        }

// PID.13
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,[1,1,1],1,1,1,1,1,[1,1,1,1],[1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('EnterersLocation', 80, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $pointOfCare,
                $room,
                $bed,
                list($facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType),
                $locationStatus,
                $personLocationType,
                $building,
                $floor,
                $locationDescription,
                list($comprehensiveLocationIdentifierEntityIdentifier,
                $comprehensiveLocationIdentifierNamespaceId,
                $comprehensiveLocationIdentifierUniversalId,
                $comprehensiveLocationIdentifierUniversalIdType),
                list($assigningAuthorityForLocationNamespaceId,
                $assigningAuthorityForLocationUniversalId,
                $assigningAuthorityForLocationUniversalIdType)
                ) = $components;
            $this->setFieldEnterersLocation(
                $pointOfCare,
                $room,
                $bed,
                $facilityNamespaceId,
                $facilityUniversalId,
                $facilityUniversalIdType,
                $locationStatus,
                $personLocationType,
                $building,
                $floor,
                $locationDescription,
                $comprehensiveLocationIdentifierEntityIdentifier,
                $comprehensiveLocationIdentifierNamespaceId,
                $comprehensiveLocationIdentifierUniversalId,
                $comprehensiveLocationIdentifierUniversalIdType,
                $assigningAuthorityForLocationNamespaceId,
                $assigningAuthorityForLocationUniversalId,
                $assigningAuthorityForLocationUniversalIdType
            );
        }

        // PID.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('CallBackPhoneNumber', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber,
                ) = $components;
            $this->addFieldCallBackPhoneNumber(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber
            );
        }


        // PID.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderEffectiveDate_Time', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldOrderEffectiveDate_Time(
            $time,
            $degreeOfPrecision
        );


        // PID.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderControlCodeReason', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldOrderControlCodeReason(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );


// PID.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EnteringOrganization', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEnteringOrganization(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );


// PID.18
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EnteringDevice', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEnteringDevice (
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );


// OCR.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ActionBy', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $idNumber,
                list(
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                ),
                $givenName,
                $secondNames,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                list(
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                ),
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                list(
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                ),
                $nameRepresentationCode,
                list(
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                ),
                list(
                list(
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                ),
                list(
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                ),
                ),
                $nameAssemblyOrder,
                list(
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                ),
                list(
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                ),
                $professionalSuffix,
                list(
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                ),
                list(
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText,
                ),
                ) = $components;
            $this->addFieldActionBy(
                $idNumber,
                $familyNameSurname,
                $familyNameOwnSurnamePrefix,
                $familyNameOwnSurname,
                $familyNameSurnamePrefixFromPartner,
                $familyNameSurnameFromPartner,
                $givenName,
                $secondNames,
                $suffix,
                $prefix,
                $degree,
                $sourceTable,
                $assigningAuthorityNamespaceId,
                $assigningAuthorityUniversalId,
                $assigningAuthorityUniversalIdType,
                $nameTypeCode,
                $identifierCheckDigit,
                $checkDigitScheme,
                $identifierTypeCode,
                $assigningFacilityNamespaceId,
                $assigningFacilityUniversalId,
                $assigningFacilityUniversalIdType,
                $nameRepresentationCode,
                $nameContextIdentifier,
                $nameContextText,
                $nameContextNameOfCodingSystem,
                $nameContextAltIdentifier,
                $nameContextAltText,
                $nameContextNameOfAltCodingSystem,
                $nameValidityRangeRangeStartDateTimeTime,
                $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $nameValidityRangeRangeEndDateTimeTime,
                $nameValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $nameAssemblyOrder,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                $professionalSuffix,
                $assigningJurisdictionIdentifier,
                $assigningJurisdictionText,
                $assigningJurisdictionNameOfCodingSystem,
                $assigningJurisdictionAltIdentifier,
                $assigningJurisdictionAltText,
                $assigningJurisdictionNameOfAltCodingSystem,
                $assigningJurisdictionCodingSystemVersionId,
                $assigningJurisdictionAltCodingSystemVersionId,
                $assigningJurisdictionOriginalText,
                $assigningAgencyIdentifier,
                $assigningAgencyText,
                $assigningAgencyNameOfCodingSystem,
                $assigningAgencyAltIdentifier,
                $assigningAgencyAltText,
                $assigningAgencyNameOfAltCodingSystem,
                $assigningAgencyCodingSystemVersionId,
                $assigningAgencyAltCodingSystemVersionId,
                $assigningAgencyOriginalText
            );
        }

        // PID.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AdvancedBeneficiaryNoticeCode', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldAdvancedBeneficiaryNoticeCode (
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // ORC.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingFacilityName', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                $streetAddressStreetOrMailingAddress,
                $streetAddressStreetName,
                $streetAddressDwellingNumber,
                ),
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                list(
                list(
                $addressValidityRangeRangeStartDateTimeTime,
                $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                ),
                list(
                $addressValidityRangeRangeEndDateTimeTime,
                $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                ),
                ),
                list(
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                ),
                list(
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                ),
                ) = $components;
            $this->addFieldOrderingFacilityName(
                $streetAddressStreetOrMailingAddress,
                $streetAddressStreetName,
                $streetAddressDwellingNumber,
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                $addressValidityRangeRangeStartDateTimeTime,
                $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $addressValidityRangeRangeEndDateTimeTime,
                $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision
            );
        }




        // ORC.22
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingFacilityAddress', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                $streetAddressStreetOrMailingAddress,
                $streetAddressStreetName,
                $streetAddressDwellingNumber,
                ),
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                list(
                list(
                $addressValidityRangeRangeStartDateTimeTime,
                $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                ),
                list(
                $addressValidityRangeRangeEndDateTimeTime,
                $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                ),
                ),
                list(
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                ),
                list(
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                ),
                ) = $components;
            $this->addFieldOrderingFacilityAddress(
                $streetAddressStreetOrMailingAddress,
                $streetAddressStreetName,
                $streetAddressDwellingNumber,
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                $addressValidityRangeRangeStartDateTimeTime,
                $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $addressValidityRangeRangeEndDateTimeTime,
                $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision
            );
        }


// PID.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingFacilityPhoneNumber', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber,
                ) = $components;
            $this->addFieldOrderingFacilityPhoneNumber(
                $telephoneNumber,
                $telecommunicationUseCode,
                $telepcommunicationEquipmentType,
                $emailAddress,
                $countryCode,
                $areaCityCode,
                $localNumber,
                $extension,
                $anyText,
                $extensionPrefix,
                $speedDialCode,
                $unformattedTelephoneNumber
            );
        }

// ORC.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('OrderingProviderAddress', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
                list(
                $streetAddressStreetOrMailingAddress,
                $streetAddressStreetName,
                $streetAddressDwellingNumber,
                ),
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                list(
                list(
                $addressValidityRangeRangeStartDateTimeTime,
                $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                ),
                list(
                $addressValidityRangeRangeEndDateTimeTime,
                $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                ),
                ),
                list(
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                ),
                list(
                $expirationDateTime,
                $expirationDateDegreeOfPrecision,
                ),
                ) = $components;
            $this->addFieldOrderingProviderAddress(
                $streetAddressStreetOrMailingAddress,
                $streetAddressStreetName,
                $streetAddressDwellingNumber,
                $otherDesignation,
                $city,
                $stateOrProvince,
                $zipOrPostalCode,
                $country,
                $addressType,
                $otherGeographicDesignation,
                $countyParishCode,
                $censusTract,
                $addressRepresentationCode,
                $addressValidityRangeRangeStartDateTimeTime,
                $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
                $addressValidityRangeRangeEndDateTimeTime,
                $addressValidityRangeRangeEndDateTimeDegreeOfPrecision,
                $effectiveDateTime,
                $effectiveDateDegreeOfPrecision,
                $expirationDateTime,
                $expirationDateDegreeOfPrecision
            );
        }

        // OBR.25
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderStatusModifier', 250, $datagram->getPositionalState());
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
        $this->setFieldOrderStatusModifier(
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


// ORC.26
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AdvancedBeneficiaryNoticeOverrideReason', 60, $datagram->getPositionalState());
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
        $this->setFieldAdvancedBeneficiaryNoticeOverrideReason(
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



// ORC.27
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('FillersExpectedAvailabilityDate_Time', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldFillersExpectedAvailabilityDate_Time(
            $time,
            $degreeOfPrecision
        );


// ORC.28
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ConfidentialityCode', 250, $datagram->getPositionalState());
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
        $this->setFieldConfidentialityCode(
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


// ORC.29
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('OrderType', 250, $datagram->getPositionalState());
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
        $this->setFieldOrderType(
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

// ORC.30

        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('EntererAuthorizationMode', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $alternateCodingSystemVersionId,
            $originalText
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldEntererAuthorizationMode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            $codingSystemVersionId,
            $alternateCodingSystemVersionId,
            $originalText
        );


// ORC.31
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ParentUniversalServiceIdentifier', 250, $datagram->getPositionalState());
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
        $this->setFieldParentUniversalServiceIdentifier(
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
    public function setFieldOrderControl($value){
        $this->orderControl = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->orderControl->setValue($value);
    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldPlacerOrderNumber(
        $entityIdentifier = null,
        $namespaceId = null,
        $universalId = null,
        $universalIdType = null){

        $this->placerOrderNumber = $this
            ->dataTypeFactory
            ->create('EI', $this->characterEncoding)
        ;
        $this->placerOrderNumber->setEntityIdentifier($entityIdentifier);
        $this->placerOrderNumber->setNamespaceId($namespaceId);
        $this->placerOrderNumber->setUniversalId($universalId);
        $this->placerOrderNumber->setUniversalIdType($universalIdType);
    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldFillerOrderNumber($entityIdentifier = null,
                                              $namespaceId = null,
                                              $universalId = null,
                                              $universalIdType = null){

        $this->fillerOrderNumber = $this
            ->dataTypeFactory
            ->create('EI', $this->characterEncoding)
        ;
        $this->fillerOrderNumber->setEntityIdentifier($entityIdentifier);
        $this->fillerOrderNumber->setNamespaceId($namespaceId);
        $this->fillerOrderNumber->setUniversalId($universalId);
        $this->fillerOrderNumber->setUniversalIdType($universalIdType);

    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldPlacerGroupNumber($entityIdentifier = null,
                                              $namespaceId = null,
                                              $universalId = null,
                                              $universalIdType = null){

        $this->placerGroupNumber = $this
            ->dataTypeFactory
            ->create('EI', $this->characterEncoding)
        ;
        $this->placerGroupNumber->setEntityIdentifier($entityIdentifier);
        $this->placerGroupNumber->setNamespaceId($namespaceId);
        $this->placerGroupNumber->setUniversalId($universalId);
        $this->placerGroupNumber->setUniversalIdType($universalIdType);

    }

    /**
     * @param string $value
     */
    public function setFieldOrderStatus($value){
        $this->orderStatus = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->orderStatus->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldResponseFlag($value){
        $this->responseFlag = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->responseFlag->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldQuantity_Timing($value){
        $quantity_Timing = $this
            ->dataTypeFactory
            ->create('TX', $this->characterEncoding)
        ;
        $this->quantity_Timing[] = $quantity_Timing;
        $quantity_Timing->setValue($value);
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
    public function setFieldParentOrder($placerAssignedIdentifierEntityIdentifier = null,
                                        $placerAssignedIdentifierNamespaceId = null,
                                        $placerAssignedIdentifierUniversalId = null,
                                        $placerAssignedIdentifierUniversalIdType = null,
                                        $fillerAssignedIdentifierEntityIdentifier = null,
                                        $fillerAssignedIdentifierNamespaceId = null,
                                        $fillerAssignedIdentifierUniversalId = null,
                                        $fillerAssignedIdentifierUniversalIdType = null){

        $this->parentOrder = $this
            ->dataTypeFactory
            ->create('EIP', $this->characterEncoding)
        ;
        $this->parentOrder->setPlacerAssignedIdentifier(
            $placerAssignedIdentifierEntityIdentifier,
            $placerAssignedIdentifierNamespaceId,
            $placerAssignedIdentifierUniversalId,
            $placerAssignedIdentifierUniversalIdType);
        $this->parentOrder->setPlacerAssignedIdentifier(
            $fillerAssignedIdentifierEntityIdentifier,
            $fillerAssignedIdentifierNamespaceId,
            $fillerAssignedIdentifierUniversalId,
            $fillerAssignedIdentifierUniversalIdType);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDate_TimeofTransaction($time, $degreeOfPrecision = null)
    {
        $this->date_TimeofTransaction = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->date_TimeofTransaction->setTime($time);
        $this->date_TimeofTransaction->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $idNumber
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldEnteredBy(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $enteredBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->enteredBy[] = $enteredBy;
        $enteredBy->setIdNumber($idNumber);
        $enteredBy->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $enteredBy->setGivenName($givenName);
        $enteredBy->setSecondNames($secondNames);
        $enteredBy->setSuffix($suffix);
        $enteredBy->setPrefix($prefix);
        $enteredBy->setDegree($degree);
        $enteredBy->setSourceTable($sourceTable);
        $enteredBy->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $enteredBy->setNameTypeCode($nameTypeCode);
        $enteredBy->setIdentifierCheckDigit($identifierCheckDigit);
        $enteredBy->setCheckDigitScheme($checkDigitScheme);
        $enteredBy->setIdentifierTypeCode($identifierTypeCode);
        $enteredBy->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $enteredBy->setNameRepresentationCode($nameRepresentationCode);
        $enteredBy->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $enteredBy->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $enteredBy->setNameAssemblyOrder($nameAssemblyOrder);
        $enteredBy->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $enteredBy->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $enteredBy->setProfessionalSuffix($professionalSuffix);
        $enteredBy->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $enteredBy->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $idNumber
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldVerifiedBy(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $verifiedBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->verifiedBy[] = $verifiedBy;
        $verifiedBy->setIdNumber($idNumber);
        $verifiedBy->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $verifiedBy->setGivenName($givenName);
        $verifiedBy->setSecondNames($secondNames);
        $verifiedBy->setSuffix($suffix);
        $verifiedBy->setPrefix($prefix);
        $verifiedBy->setDegree($degree);
        $verifiedBy->setSourceTable($sourceTable);
        $verifiedBy->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $verifiedBy->setNameTypeCode($nameTypeCode);
        $verifiedBy->setIdentifierCheckDigit($identifierCheckDigit);
        $verifiedBy->setCheckDigitScheme($checkDigitScheme);
        $verifiedBy->setIdentifierTypeCode($identifierTypeCode);
        $verifiedBy->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $verifiedBy->setNameRepresentationCode($nameRepresentationCode);
        $verifiedBy->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $verifiedBy->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $verifiedBy->setNameAssemblyOrder($nameAssemblyOrder);
        $verifiedBy->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $verifiedBy->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $verifiedBy->setProfessionalSuffix($professionalSuffix);
        $verifiedBy->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $verifiedBy->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $idNumber
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldOrderingProvider(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $orderingProvider = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->orderingProvider[] = $orderingProvider;
        $orderingProvider->setIdNumber($idNumber);
        $orderingProvider->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $orderingProvider->setGivenName($givenName);
        $orderingProvider->setSecondNames($secondNames);
        $orderingProvider->setSuffix($suffix);
        $orderingProvider->setPrefix($prefix);
        $orderingProvider->setDegree($degree);
        $orderingProvider->setSourceTable($sourceTable);
        $orderingProvider->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $orderingProvider->setNameTypeCode($nameTypeCode);
        $orderingProvider->setIdentifierCheckDigit($identifierCheckDigit);
        $orderingProvider->setCheckDigitScheme($checkDigitScheme);
        $orderingProvider->setIdentifierTypeCode($identifierTypeCode);
        $orderingProvider->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $orderingProvider->setNameRepresentationCode($nameRepresentationCode);
        $orderingProvider->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $orderingProvider->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $orderingProvider->setNameAssemblyOrder($nameAssemblyOrder);
        $orderingProvider->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $orderingProvider->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $orderingProvider->setProfessionalSuffix($professionalSuffix);
        $orderingProvider->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $orderingProvider->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $pointOfCare
     * @param string $room
     * @param string $bed
     * @param string $facilityNamespaceId
     * @param string $facilityUniversalId
     * @param string $facilityUniversalIdType
     * @param string $locationStatus
     * @param string $personLocationType
     * @param string $building
     * @param string $floor
     * @param string $locationDescription
     * @param string $comprehensiveLocationIdentifierEntityIdentifier
     * @param string $comprehensiveLocationIdentifierNamespaceId
     * @param string $comprehensiveLocationIdentifierUniversalId
     * @param string $comprehensiveLocationIdentifierUniversalIdType
     * @param string $assigningAuthorityForLocationNamespaceId
     * @param string $assigningAuthorityForLocationUniversalId
     * @param string $assigningAuthorityForLocationUniversalIdType
     */
    public function setFieldEnterersLocation(
        $pointOfCare = null,
        $room = null,
        $bed = null,
        $facilityNamespaceId,
        $facilityUniversalId,
        $facilityUniversalIdType,
        $locationStatus = null,
        $personLocationType = null,
        $building = null,
        $floor = null,
        $locationDescription = null,
        $comprehensiveLocationIdentifierEntityIdentifier = null,
        $comprehensiveLocationIdentifierNamespaceId = null,
        $comprehensiveLocationIdentifierUniversalId = null,
        $comprehensiveLocationIdentifierUniversalIdType = null,
        $assigningAuthorityForLocationNamespaceId,
        $assigningAuthorityForLocationUniversalId,
        $assigningAuthorityForLocationUniversalIdType
    ) {
        $this->enterersLocation = $this
            ->dataTypeFactory
            ->create('PL', $this->characterEncoding)
        ;
        $this->enterersLocation->setPointOfCare($pointOfCare);
        $this->enterersLocation->setRoom($room);
        $this->enterersLocation->setBed($bed);
        $this->enterersLocation->setFacility(
            $facilityNamespaceId,
            $facilityUniversalId,
            $facilityUniversalIdType
        );
        $this->enterersLocation->setLocationStatus($locationStatus);
        $this->enterersLocation->setPersonLocationType($personLocationType);
        $this->enterersLocation->setBuilding($building);
        $this->enterersLocation->setFloor($floor);
        $this->enterersLocation->setLocationDescription($locationDescription);
        $this->enterersLocation->setComprehensiveLocationIdentifier(
            $comprehensiveLocationIdentifierEntityIdentifier,
            $comprehensiveLocationIdentifierNamespaceId,
            $comprehensiveLocationIdentifierUniversalId,
            $comprehensiveLocationIdentifierUniversalIdType
        );
        $this->enterersLocation->setAssigningAuthorityForLocation(
            $assigningAuthorityForLocationNamespaceId,
            $assigningAuthorityForLocationUniversalId,
            $assigningAuthorityForLocationUniversalIdType
        );
    }

    /**
     * @param string $telephoneNumber
     * @param string $telecommunicationUseCode
     * @param string $telepcommunicationEquipmentType
     * @param string $emailAddress
     * @param string $countryCode
     * @param string $areaCityCode
     * @param string $localNumber
     * @param string $extension
     * @param string $anyText
     * @param string $extensionPrefix
     * @param string $speedDialCode
     * @param string $unformattedTelephoneNumber
     */
    public function addFieldCallBackPhoneNumber(
        $telephoneNumber = null,
        $telecommunicationUseCode = null,
        $telepcommunicationEquipmentType = null,
        $emailAddress = null,
        $countryCode = null,
        $areaCityCode = null,
        $localNumber = null,
        $extension = null,
        $anyText = null,
        $extensionPrefix = null,
        $speedDialCode = null,
        $unformattedTelephoneNumber = null
    ) {
        $callBackPhoneNumber = $this
            ->dataTypeFactory
            ->create('XTN', $this->characterEncoding)
        ;
        $this->callBackPhoneNumber[] = $callBackPhoneNumber;
        $callBackPhoneNumber->setTelephoneNumber($telephoneNumber);
        $callBackPhoneNumber->setTelecommunicationUseCode($telecommunicationUseCode);
        $callBackPhoneNumber->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $callBackPhoneNumber->setEmailAddress($emailAddress);
        $callBackPhoneNumber->setCountryCode($countryCode);
        $callBackPhoneNumber->setAreaCityCode($areaCityCode);
        $callBackPhoneNumber->setLocalNumber($localNumber);
        $callBackPhoneNumber->setExtension($extension);
        $callBackPhoneNumber->setAnyText($anyText);
        $callBackPhoneNumber->setExtensionPrefix($extensionPrefix);
        $callBackPhoneNumber->setSpeedDialCode($speedDialCode);
        $callBackPhoneNumber->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldOrderEffectiveDate_Time($time, $degreeOfPrecision = null)
    {
        $this->orderEffectiveDate_Time= $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->orderEffectiveDate_Time->setTime($time);
        $this->orderEffectiveDate_Time->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldOrderControlCodeReason(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->orderControlCodeReason = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->orderControlCodeReason->setIdentifier($identifier);
        $this->orderControlCodeReason->setText($text);
        $this->orderControlCodeReason->setNameOfCodingSystem($nameOfCodingSystem);
        $this->orderControlCodeReason->setAltIdentifier($altIdentifier);
        $this->orderControlCodeReason->setAltText($altText);
        $this->orderControlCodeReason->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldEnteringOrganization(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->enteringOrganization = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->enteringOrganization->setIdentifier($identifier);
        $this->enteringOrganization->setText($text);
        $this->enteringOrganization->setNameOfCodingSystem($nameOfCodingSystem);
        $this->enteringOrganization->setAltIdentifier($altIdentifier);
        $this->enteringOrganization->setAltText($altText);
        $this->enteringOrganization->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldEnteringDevice(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->enteringDevice = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->enteringDevice->setIdentifier($identifier);
        $this->enteringDevice->setText($text);
        $this->enteringDevice->setNameOfCodingSystem($nameOfCodingSystem);
        $this->enteringDevice->setAltIdentifier($altIdentifier);
        $this->enteringDevice->setAltText($altText);
        $this->enteringDevice->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $idNumber
     * @param string $familyNameSurname
     * @param string $familyNameOwnSurnamePrefix
     * @param string $familyNameOwnSurname
     * @param string $familyNameSurnamePrefixFromPartner
     * @param string $familyNameSurnameFromPartner
     * @param string $givenName
     * @param string $secondNames
     * @param string $suffix
     * @param string $prefix
     * @param string $degree
     * @param string $sourceTable
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $nameTypeCode
     * @param string $identifierCheckDigit
     * @param string $checkDigitScheme
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     * @param string $nameContextIdentifier
     * @param string $nameContextText
     * @param string $nameContextNameOfCodingSystem
     * @param string $nameContextAltIdentifier
     * @param string $nameContextAltText
     * @param string $nameContextNameOfAltCodingSystem
     * @param string $nameValidityRangeRangeStartDateTimeTime
     * @param string $nameValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $nameValidityRangeRangeEndDateTimeTime
     * @param string $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $nameAssemblyOrder
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     * @param string $professionalSuffix
     * @param string $assigningJurisdictionIdentifier
     * @param string $assigningJurisdictionText
     * @param string $assigningJurisdictionNameOfCodingSystem
     * @param string $assigningJurisdictionAltIdentifier
     * @param string $assigningJurisdictionAltText
     * @param string $assigningJurisdictionNameOfAltCodingSystem
     * @param string $assigningJurisdictionCodingSystemVersionId
     * @param string $assigningJurisdictionAltCodingSystemVersionId
     * @param string $assigningJurisdictionOriginalText
     * @param string $assigningAgencyIdentifier
     * @param string $assigningAgencyText
     * @param string $assigningAgencyNameOfCodingSystem
     * @param string $assigningAgencyAltIdentifier
     * @param string $assigningAgencyAltText
     * @param string $assigningAgencyNameOfAltCodingSystem
     * @param string $assigningAgencyCodingSystemVersionId
     * @param string $assigningAgencyAltCodingSystemVersionId
     * @param string $assigningAgencyOriginalText
     */
    public function addFieldActionBy(
        $idNumber = null,
        $familyNameSurname,
        $familyNameOwnSurnamePrefix = null,
        $familyNameOwnSurname = null,
        $familyNameSurnamePrefixFromPartner = null,
        $familyNameSurnameFromPartner = null,
        $givenName = null,
        $secondNames = null,
        $suffix = null,
        $prefix = null,
        $degree = null,
        $sourceTable = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $nameTypeCode = null,
        $identifierCheckDigit = null,
        $checkDigitScheme = null,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $nameContextIdentifier = null,
        $nameContextText = null,
        $nameContextNameOfCodingSystem = null,
        $nameContextAltIdentifier = null,
        $nameContextAltText = null,
        $nameContextNameOfAltCodingSystem = null,
        $nameValidityRangeRangeStartDateTimeTime,
        $nameValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $nameValidityRangeRangeEndDateTimeTime,
        $nameValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $nameAssemblyOrder = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null,
        $professionalSuffix = null,
        $assigningJurisdictionIdentifier = null,
        $assigningJurisdictionText = null,
        $assigningJurisdictionNameOfCodingSystem = null,
        $assigningJurisdictionAltIdentifier = null,
        $assigningJurisdictionAltText = null,
        $assigningJurisdictionNameOfAltCodingSystem = null,
        $assigningJurisdictionCodingSystemVersionId = null,
        $assigningJurisdictionAltCodingSystemVersionId = null,
        $assigningJurisdictionOriginalText = null,
        $assigningAgencyIdentifier = null,
        $assigningAgencyText = null,
        $assigningAgencyNameOfCodingSystem = null,
        $assigningAgencyAltIdentifier = null,
        $assigningAgencyAltText = null,
        $assigningAgencyNameOfAltCodingSystem = null,
        $assigningAgencyCodingSystemVersionId = null,
        $assigningAgencyAltCodingSystemVersionId = null,
        $assigningAgencyOriginalText = null
    ) {
        $actionBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->actionBy[] = $actionBy;
        $actionBy->setIdNumber($idNumber);
        $actionBy->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $actionBy->setGivenName($givenName);
        $actionBy->setSecondNames($secondNames);
        $actionBy->setSuffix($suffix);
        $actionBy->setPrefix($prefix);
        $actionBy->setDegree($degree);
        $actionBy->setSourceTable($sourceTable);
        $actionBy->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $actionBy->setNameTypeCode($nameTypeCode);
        $actionBy->setIdentifierCheckDigit($identifierCheckDigit);
        $actionBy->setCheckDigitScheme($checkDigitScheme);
        $actionBy->setIdentifierTypeCode($identifierTypeCode);
        $actionBy->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $actionBy->setNameRepresentationCode($nameRepresentationCode);
        $actionBy->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $actionBy->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $actionBy->setNameAssemblyOrder($nameAssemblyOrder);
        $actionBy->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $actionBy->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $actionBy->setProfessionalSuffix($professionalSuffix);
        $actionBy->setAssigningJurisdiction(
            $assigningJurisdictionIdentifier,
            $assigningJurisdictionText,
            $assigningJurisdictionNameOfCodingSystem,
            $assigningJurisdictionAltIdentifier,
            $assigningJurisdictionAltText,
            $assigningJurisdictionNameOfAltCodingSystem,
            $assigningJurisdictionCodingSystemVersionId,
            $assigningJurisdictionAltCodingSystemVersionId,
            $assigningJurisdictionOriginalText
        );
        $actionBy->setAssigningAgency(
            $assigningAgencyIdentifier,
            $assigningAgencyText,
            $assigningAgencyNameOfCodingSystem,
            $assigningAgencyAltIdentifier,
            $assigningAgencyAltText,
            $assigningAgencyNameOfAltCodingSystem,
            $assigningAgencyCodingSystemVersionId,
            $assigningAgencyAltCodingSystemVersionId,
            $assigningAgencyOriginalText
        );
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldAdvancedBeneficiaryNoticeCode(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->advancedBeneficiaryNoticeCode = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->advancedBeneficiaryNoticeCode->setIdentifier($identifier);
        $this->advancedBeneficiaryNoticeCode->setText($text);
        $this->advancedBeneficiaryNoticeCode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->advancedBeneficiaryNoticeCode->setAltIdentifier($altIdentifier);
        $this->advancedBeneficiaryNoticeCode->setAltText($altText);
        $this->advancedBeneficiaryNoticeCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $organisationName
     * @param string $organisationNameTypeCode
     * @param string $idNumber
     * @param string $checkDigit
     * @param string $checkDigitScheme
     * @param string $assigningAuthorityNamespaceId
     * @param string $assigningAuthorityUniversalId
     * @param string $assigningAuthorityUniversalIdType
     * @param string $identifierTypeCode
     * @param string $assigningFacilityNamespaceId
     * @param string $assigningFacilityUniversalId
     * @param string $assigningFacilityUniversalIdType
     * @param string $nameRepresentationCode
     * @param string $organisationIdentifier
     */
    public function addFieldOrderingFacilityName(
        $organisationName = null,
        $organisationNameTypeCode = null,
        $idNumber = null,
        $checkDigit = null,
        $checkDigitScheme = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $nameRepresentationCode = null,
        $organisationIdentifier = null
    ) {
        $orderingFacilityName = $this
            ->dataTypeFactory
            ->create('XON', $this->characterEncoding)
        ;
        $this->orderingFacilityName[] = $orderingFacilityName;
        $orderingFacilityName->setOrganisationName($organisationName);
        $orderingFacilityName->setOrganisationNameTypeCode($organisationNameTypeCode);
        $orderingFacilityName->setIdNumber($idNumber);
        $orderingFacilityName->setCheckDigit($checkDigit);
        $orderingFacilityName->setCheckDigitScheme($checkDigitScheme);
        $orderingFacilityName->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $orderingFacilityName->setIdentifierTypeCode($identifierTypeCode);
        $orderingFacilityName->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $orderingFacilityName->setNameRepresentationCode($nameRepresentationCode);
        $orderingFacilityName->setOrganisationIdentifier($organisationIdentifier);
    }

    /**
     * @param string $streetAddressStreetOrMailingAddress
     * @param string $streetAddressStreetName
     * @param string $streetAddressDwellingNumber
     * @param string $otherDesignation
     * @param string $city
     * @param string $stateOrProvince
     * @param string $zipOrPostalCode
     * @param string $country
     * @param string $addressType
     * @param string $otherGeographicDesignation
     * @param string $countyParishCode
     * @param string $censusTract
     * @param string $addressRepresentationCode
     * @param string $addressValidityRangeRangeStartDateTimeTime
     * @param string $addressValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $addressValidityRangeRangeEndDateTimeTime
     * @param string $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     */
    public function addFieldOrderingFacilityAddress(
        $streetAddressStreetOrMailingAddress = null,
        $streetAddressStreetName = null,
        $streetAddressDwellingNumber = null,
        $otherDesignation = null,
        $city = null,
        $stateOrProvince = null,
        $zipOrPostalCode = null,
        $country = null,
        $addressType = null,
        $otherGeographicDesignation = null,
        $countyParishCode = null,
        $censusTract = null,
        $addressRepresentationCode = null,
        $addressValidityRangeRangeStartDateTimeTime,
        $addressValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $addressValidityRangeRangeEndDateTimeTime,
        $addressValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null
    ) {
        $orderingFacilityAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->characterEncoding)
        ;
        $this->orderingFacilityAddress[] = $orderingFacilityAddress;
        $orderingFacilityAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $orderingFacilityAddress->setOtherDesignation($otherDesignation);
        $orderingFacilityAddress->setCity($city);
        $orderingFacilityAddress->setStateOrProvince($stateOrProvince);
        $orderingFacilityAddress->setZipOrPostalCode($zipOrPostalCode);
        $orderingFacilityAddress->setCountry($country);
        $orderingFacilityAddress->setAddressType($addressType);
        $orderingFacilityAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $orderingFacilityAddress->setCountyParishCode($countyParishCode);
        $orderingFacilityAddress->setCensusTract($censusTract);
        $orderingFacilityAddress->setAddressRepresentationCode($addressRepresentationCode);
        $orderingFacilityAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $orderingFacilityAddress->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $orderingFacilityAddress->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
    }

    /**
     * @param string $telephoneNumber
     * @param string $telecommunicationUseCode
     * @param string $telepcommunicationEquipmentType
     * @param string $emailAddress
     * @param string $countryCode
     * @param string $areaCityCode
     * @param string $localNumber
     * @param string $extension
     * @param string $anyText
     * @param string $extensionPrefix
     * @param string $speedDialCode
     * @param string $unformattedTelephoneNumber
     */
    public function addFieldOrderingFacilityPhoneNumber(
        $telephoneNumber = null,
        $telecommunicationUseCode = null,
        $telepcommunicationEquipmentType = null,
        $emailAddress = null,
        $countryCode = null,
        $areaCityCode = null,
        $localNumber = null,
        $extension = null,
        $anyText = null,
        $extensionPrefix = null,
        $speedDialCode = null,
        $unformattedTelephoneNumber = null
    ) {
        $orderingFacilityPhoneNumber = $this
            ->dataTypeFactory
            ->create('XTN', $this->characterEncoding)
        ;
        $this->orderingFacilityPhoneNumber[] = $orderingFacilityPhoneNumber;
        $orderingFacilityPhoneNumber->setTelephoneNumber($telephoneNumber);
        $orderingFacilityPhoneNumber->setTelecommunicationUseCode($telecommunicationUseCode);
        $orderingFacilityPhoneNumber->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $orderingFacilityPhoneNumber->setEmailAddress($emailAddress);
        $orderingFacilityPhoneNumber->setCountryCode($countryCode);
        $orderingFacilityPhoneNumber->setAreaCityCode($areaCityCode);
        $orderingFacilityPhoneNumber->setLocalNumber($localNumber);
        $orderingFacilityPhoneNumber->setExtension($extension);
        $orderingFacilityPhoneNumber->setAnyText($anyText);
        $orderingFacilityPhoneNumber->setExtensionPrefix($extensionPrefix);
        $orderingFacilityPhoneNumber->setSpeedDialCode($speedDialCode);
        $orderingFacilityPhoneNumber->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
    }


    /**
     * @param string $streetAddressStreetOrMailingAddress
     * @param string $streetAddressStreetName
     * @param string $streetAddressDwellingNumber
     * @param string $otherDesignation
     * @param string $city
     * @param string $stateOrProvince
     * @param string $zipOrPostalCode
     * @param string $country
     * @param string $addressType
     * @param string $otherGeographicDesignation
     * @param string $countyParishCode
     * @param string $censusTract
     * @param string $addressRepresentationCode
     * @param string $addressValidityRangeRangeStartDateTimeTime
     * @param string $addressValidityRangeRangeStartDateTimeDegreeOfPrecision
     * @param string $addressValidityRangeRangeEndDateTimeTime
     * @param string $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
     * @param string $effectiveDateTime
     * @param string $effectiveDateDegreeOfPrecision
     * @param string $expirationDateTime
     * @param string $expirationDateDegreeOfPrecision
     */
    public function addFieldOrderingProviderAddress(
        $streetAddressStreetOrMailingAddress = null,
        $streetAddressStreetName = null,
        $streetAddressDwellingNumber = null,
        $otherDesignation = null,
        $city = null,
        $stateOrProvince = null,
        $zipOrPostalCode = null,
        $country = null,
        $addressType = null,
        $otherGeographicDesignation = null,
        $countyParishCode = null,
        $censusTract = null,
        $addressRepresentationCode = null,
        $addressValidityRangeRangeStartDateTimeTime,
        $addressValidityRangeRangeStartDateTimeDegreeOfPrecision = null,
        $addressValidityRangeRangeEndDateTimeTime,
        $addressValidityRangeRangeEndDateTimeDegreeOfPrecision = null,
        $effectiveDateTime,
        $effectiveDateDegreeOfPrecision = null,
        $expirationDateTime,
        $expirationDateDegreeOfPrecision = null
    ) {
        $orderingProviderAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->characterEncoding)
        ;
        $this->orderingProviderAddress[] = $orderingProviderAddress;
        $orderingProviderAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $orderingProviderAddress->setOtherDesignation($otherDesignation);
        $orderingProviderAddress->setCity($city);
        $orderingProviderAddress->setStateOrProvince($stateOrProvince);
        $orderingProviderAddress->setZipOrPostalCode($zipOrPostalCode);
        $orderingProviderAddress->setCountry($country);
        $orderingProviderAddress->setAddressType($addressType);
        $orderingProviderAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $orderingProviderAddress->setCountyParishCode($countyParishCode);
        $orderingProviderAddress->setCensusTract($censusTract);
        $orderingProviderAddress->setAddressRepresentationCode($addressRepresentationCode);
        $orderingProviderAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $orderingProviderAddress->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $orderingProviderAddress->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
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
    public function setFieldOrderStatusModifier(
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
        $this->orderStatusModifier = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->orderStatusModifier->setIdentifier($identifier);
        $this->orderStatusModifier->setText($text);
        $this->orderStatusModifier->setNameOfCodingSystem(
            $nameOfCodingSystem
        );
        $this->orderStatusModifier->setAltIdentifier($altIdentifier);
        $this->orderStatusModifier->setAltText($altText);
        $this->orderStatusModifier->setNameOfAltCodingSystem(
            $nameOfAltCodingSystem
        );
        $this->orderStatusModifier->setCodingSystemVersionId(
            $codingSystemVersionId
        );
        $this->orderStatusModifier->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->orderStatusModifier->setOriginalText($originalText);
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
    public function setFieldAdvancedBeneficiaryNoticeOverrideReason(
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
        $this->advancedBeneficiaryNoticeOverrideReason = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->advancedBeneficiaryNoticeOverrideReason->setIdentifier($identifier);
        $this->advancedBeneficiaryNoticeOverrideReason->setText($text);
        $this->advancedBeneficiaryNoticeOverrideReason->setNameOfCodingSystem(
            $nameOfCodingSystem
        );
        $this->advancedBeneficiaryNoticeOverrideReason->setAltIdentifier($altIdentifier);
        $this->advancedBeneficiaryNoticeOverrideReason->setAltText($altText);
        $this->advancedBeneficiaryNoticeOverrideReason->setNameOfAltCodingSystem(
            $nameOfAltCodingSystem
        );
        $this->advancedBeneficiaryNoticeOverrideReason->setCodingSystemVersionId(
            $codingSystemVersionId
        );
        $this->advancedBeneficiaryNoticeOverrideReason->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->advancedBeneficiaryNoticeOverrideReason->setOriginalText($originalText);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldFillersExpectedAvailabilityDate_Time($time, $degreeOfPrecision = null)
    {
        $this->fillersExpectedAvailabilityDate_Time = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->fillersExpectedAvailabilityDate_Time->setTime($time);
        $this->fillersExpectedAvailabilityDate_Time->setDegreeOfPrecision($degreeOfPrecision);
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
    public function setFieldConfidentialityCode(
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
        $this->confidentialityCode = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->confidentialityCode->setIdentifier($identifier);
        $this->confidentialityCode->setText($text);
        $this->confidentialityCode->setNameOfCodingSystem(
            $nameOfCodingSystem
        );
        $this->confidentialityCode->setAltIdentifier($altIdentifier);
        $this->confidentialityCode->setAltText($altText);
        $this->confidentialityCode->setNameOfAltCodingSystem(
            $nameOfAltCodingSystem
        );
        $this->confidentialityCode->setCodingSystemVersionId(
            $codingSystemVersionId
        );
        $this->confidentialityCode->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->confidentialityCode->setOriginalText($originalText);
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
    public function setFieldOrderType(
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
        $this->orderType = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->orderType->setIdentifier($identifier);
        $this->orderType->setText($text);
        $this->orderType->setNameOfCodingSystem(
            $nameOfCodingSystem
        );
        $this->orderType->setAltIdentifier($altIdentifier);
        $this->orderType->setAltText($altText);
        $this->orderType->setNameOfAltCodingSystem(
            $nameOfAltCodingSystem
        );
        $this->orderType->setCodingSystemVersionId(
            $codingSystemVersionId
        );
        $this->orderType->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->orderType->setOriginalText($originalText);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     * @param string $codingSystemVersionId
     * @param string $alternateCodingSystemVersionId
     * @param string $originalText
     */
    public function setFieldEntererAuthorizationMode(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null,
        $codingSystemVersionId = null,
        $alternateCodingSystemVersionId = null,
        $originalText = null){

        $this->entererAuthorizationMode = $this
            ->dataTypeFactory
            ->create('CNE', $this->characterEncoding)
        ;
        $this->entererAuthorizationMode->setIdentifier($identifier);
        $this->entererAuthorizationMode->setIdentifier($text);
        $this->entererAuthorizationMode->setIdentifier($nameOfCodingSystem);
        $this->entererAuthorizationMode->setIdentifier($altIdentifier);
        $this->entererAuthorizationMode->setIdentifier($altText);
        $this->entererAuthorizationMode->setIdentifier($nameOfAltCodingSystem);
        $this->entererAuthorizationMode->setIdentifier($codingSystemVersionId);
        $this->entererAuthorizationMode->setIdentifier($alternateCodingSystemVersionId);
        $this->entererAuthorizationMode->setIdentifier($originalText);
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
    public function setFieldParentUniversalServiceIdentifier(
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
        $this->parentUniversalServiceIdentifier = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->parentUniversalServiceIdentifier->setIdentifier($identifier);
        $this->parentUniversalServiceIdentifier->setText($text);
        $this->parentUniversalServiceIdentifier->setNameOfCodingSystem(
            $nameOfCodingSystem
        );
        $this->parentUniversalServiceIdentifier->setAltIdentifier($altIdentifier);
        $this->parentUniversalServiceIdentifier->setAltText($altText);
        $this->parentUniversalServiceIdentifier->setNameOfAltCodingSystem(
            $nameOfAltCodingSystem
        );
        $this->parentUniversalServiceIdentifier->setCodingSystemVersionId(
            $codingSystemVersionId
        );
        $this->parentUniversalServiceIdentifier->setAltCodingSystemVersionId(
            $altCodingSystemVersionId
        );
        $this->parentUniversalServiceIdentifier->setOriginalText($originalText);
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getOrderControl()
    {
        return $this->orderControl;
    }

    /**
     * @return \Hl7v2\DataType\EiDataType
     */
    public function getPlacerOrderNumber()
    {
        return $this->placerOrderNumber;
    }

    /**
     * @return \Hl7v2\DataType\EiDataType
     */
    public function getFillerOrderNumber()
    {
        return $this->fillerOrderNumber;
    }

    /**
     * @return \Hl7v2\DataType\EiDataType
     */
    public function getPlacerGroupNumber()
    {
        return $this->placerGroupNumber;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getResponseFlag()
    {
        return $this->responseFlag;
    }

    /**
     * @return \Hl7v2\DataType\TqDataType
     */
    public function getQuantityTiming()
    {
        return $this->quantity_Timing;
    }

    /**
     * @return \Hl7v2\DataType\EipDataType
     */
    public function getParentOrder()
    {
        return $this->parentOrder;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getDateTimeofTransaction()
    {
        return $this->date_TimeofTransaction;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getEnteredBy()
    {
        return $this->enteredBy;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getVerifiedBy()
    {
        return $this->verifiedBy;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getOrderingProvider()
    {
        return $this->orderingProvider;
    }

    /**
     * @return \Hl7v2\DataType\PlDataType
     */
    public function getEnterersLocation()
    {
        return $this->enterersLocation;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getCallBackPhoneNumber()
    {
        return $this->callBackPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getOrderEffectiveDateTime()
    {
        return $this->orderEffectiveDate_Time;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getOrderControlCodeReason()
    {
        return $this->orderControlCodeReason;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getEnteringOrganization()
    {
        return $this->enteringOrganization;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getEnteringDevice()
    {
        return $this->enteringDevice;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getActionBy()
    {
        return $this->actionBy;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getAdvancedBeneficiaryNoticeCode()
    {
        return $this->advancedBeneficiaryNoticeCode;
    }

    /**
     * @return \Hl7v2\DataType\XonDataType[]
     */
    public function getOrderingFacilityName()
    {
        return $this->orderingFacilityName;
    }

    /**
     * @return \Hl7v2\DataType\XadDataType[]
     */
    public function getOrderingFacilityAddress()
    {
        return $this->orderingFacilityAddress;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getOrderingFacilityPhoneNumber()
    {
        return $this->orderingFacilityPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\XadDataType[]
     */
    public function getOrderingProviderAddress()
    {
        return $this->orderingProviderAddress;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getOrderStatusModifier()
    {
        return $this->orderStatusModifier;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getAdvancedBeneficiaryNoticeOverrideReason()
    {
        return $this->advancedBeneficiaryNoticeOverrideReason;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getFillersExpectedAvailabilityDateTime()
    {
        return $this->fillersExpectedAvailabilityDate_Time;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getConfidentialityCode()
    {
        return $this->confidentialityCode;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * @return \Hl7v2\DataType\CneDataType
     */
    public function getEntererAuthorizationMode()
    {
        return $this->entererAuthorizationMode;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType
     */
    public function getParentUniversalServiceIdentifier()
    {
        return $this->parentUniversalServiceIdentifier;
    }


}
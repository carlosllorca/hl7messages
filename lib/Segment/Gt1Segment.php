<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/31/2017
 * Time: 6:14 PM
 */

namespace Hl7v2\Segment;


use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\SegmentError;

/**
 * GT1: Guarantor
 * The GT1 segment contains guarantor (e.g., the person or the organization with financial responsibility for payment of a patient account)
 * data for patient and insurance billing applications
 */
class Gt1Segment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\SiDataType
     */
    public $SetID_GT1;
    /**
     * @var \Hl7v2\DataType\CxDataType
     */
    public $GuarantorNumber = null;
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $GuarantorName;
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $GuarantorSpouseName = [];
    /**
     * @var \Hl7v2\DataType\XadDataType[]
     */
    public $GuarantorAddress = [];
    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    public $GuarantorPhNum_Home = [];
    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    public $GuarantorPhNum_Business = [];
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $GuarantorDateTimeOfBirth = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $GuarantorAdministrativeSex = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $GuarantorType = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $GuarantorRelationship = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $GuarantorSSN = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $GuarantorDate_Begin = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $GuarantorDate_End = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $GuarantorPriority = null;
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $GuarantorEmployerName = [];
    /**
     * @var \Hl7v2\DataType\XadDataType[]
     */
    public $GuarantorEmployerAddress = [];
    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    public $GuarantorEmployerPhoneNumber = [];
    /**
     * @var \Hl7v2\DataType\CxDataType
     */
    public $GuarantorEmployeeIDNumber = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $GuarantorEmploymentStatus = null;
    /**
     * @var \Hl7v2\DataType\XonDataType[]
     */
    public $GuarantorOrganizationName = [];
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $GuarantorBillingHoldFlag = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $GuarantorCreditRatingCode = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $GuarantorDeathDateAndTime = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $GuarantorDeathFlag = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $GuarantorChargeAdjustmentCode = null;
    /**
     * @var \Hl7v2\DataType\CpDataType
     */
    public $GuarantorHouseholdAnnualIncome = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $GuarantorHouseholdSize = null;
    /**
     * @var \Hl7v2\DataType\CxDataType
     */
    public $GuarantorEmployerIDNumber = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $GuarantorMaritalStatusCode = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $GuarantorHireEffectiveDate = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $EmploymentStopDate = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $LivingDependency = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $AmbulatoryStatus = null;
    /**
     * @var \Hl7v2\DataType\CeDataType[]
     */
    public $Citizenship = [];
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $PrimaryLanguage = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $LivingArrangement = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $PublicityCode = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $ProtectionIndicator = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $StudentIndicator = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $Religion = null;
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $MothersMaidenName = [];
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $Nationality = null;
    /**
     * @var \Hl7v2\DataType\CeDataType[]
     */
    public $EthnicGroup = [];
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $ContactPersonsName = [];
    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    public $ContactPersonsTelephoneNumber = [];
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $ContactReason = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $ContactRelationship = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $JobTitle = null;

    //TODO implenentar el datatype
    public $JobCodeClass = null;
    /**
     * @var \Hl7v2\DataType\XonDataType[]
     */
    public $GuarantorEmployersOrganizationName = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $Handicap = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $JobStatus = null;
    /**
     * @var \Hl7v2\DataType\FcDataType
     */
    public $GuarantorFinancialClass = null;
    /**
     * @var \Hl7v2\DataType\CeDataType[]
     */
    public $GuarantorRace = [];
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $GuarantorBirthPlace = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $VIPIndicator = null;

    /*** Crea la class dado el mensaje creado en el Datagram y return datagram***/
    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // GT1.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetID_GT1', 4, $datagram->getPositionalState());
        $this->setFieldSetID_GT1($codec->extractComponent($datagram));

        // GT1.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('GuarantorNumber', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        list(
            $idNumber,
            $checkDigit,
            $checkDigitScheme,
            list(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            ),
            $identifierTypeCode,
            list(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType,
            ),
            $effectiveDate,
            $expirationDate,
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
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldGuarantorNumber(
            $idNumber,
            $checkDigit,
            $checkDigitScheme,
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType,
            $identifierTypeCode,
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType,
            $effectiveDate,
            $expirationDate,
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

        // Gt1.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [[1,1,1,1,1],1,1,1,1,1,1,1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('GuarantorName', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
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
                $nameTypeCode,
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
                ) = $components;
            $this->addFieldGuarantorName(
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
                $nameTypeCode,
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
                $professionalSuffix
            );
        }

        // GT1.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [[1,1,1,1,1],1,1,1,1,1,1,1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('GuarantorSpouseName', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
            list(
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
                $nameTypeCode,
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
                ) = $components;
            $this->addFieldGuarantorSpouseName(
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
                $nameTypeCode,
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
                $professionalSuffix
            );
        }

        // GT1.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('GuarantorAddress', 250, $datagram->getPositionalState());
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
            $this->addFieldGuarantorAddress(
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

        // GT1.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('GuarantorPhNum_Home', 250, $datagram->getPositionalState());
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
            $this->addFieldGuarantorPhNum_Home(
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


        // GT1.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('GuarantorPhNum_Business', 250, $datagram->getPositionalState());
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
            $this->addFieldGuarantorPhNum_Business(
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

        // GT1.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('GuarantorDateTimeOfBirth', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldGuarantorDateTimeOfBirth(
            $time,
            $degreeOfPrecision
        );

        // GT1.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('GuarantorAdministrativeSex', 1, $datagram->getPositionalState());
        $this->setFieldGuarantorAdministrativeSex($codec->extractComponent($datagram));

        // GT1.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('GuarantorType', 2, $datagram->getPositionalState());
        $this->setFieldGuarantorType($codec->extractComponent($datagram));




    }

    /**
     * @param string $value
     */
    public function setFieldSetID_GT1($value)
    {
        $this->SetID_GT1 = $this
            ->dataTypeFactory
            ->create('SI', $this->characterEncoding)
        ;
        $this->SetID_GT1->setValue($value);
    }

    /**
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
     * @param string $effectiveDate
     * @param string $expirationDate
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
    public function setFieldGuarantorNumber(
        $idNumber,
        $checkDigit = null,
        $checkDigitScheme = null,
        $assigningAuthorityNamespaceId,
        $assigningAuthorityUniversalId,
        $assigningAuthorityUniversalIdType,
        $identifierTypeCode = null,
        $assigningFacilityNamespaceId,
        $assigningFacilityUniversalId,
        $assigningFacilityUniversalIdType,
        $effectiveDate = null,
        $expirationDate = null,
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
        $this->GuarantorNumber = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->GuarantorNumber->setIdNumber($idNumber);
        $this->GuarantorNumber->setCheckDigit($checkDigit);
        $this->GuarantorNumber->setCheckDigitScheme($checkDigitScheme);
        $this->GuarantorNumber->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->GuarantorNumber->setIdentifierTypeCode($identifierTypeCode);
        $this->GuarantorNumber->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $this->GuarantorNumber->setEffectiveDate($effectiveDate);
        $this->GuarantorNumber->setExpirationDate($expirationDate);
        $this->GuarantorNumber->setAssigningJurisdiction(
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
        $this->GuarantorNumber->setAssigningAgency(
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
     * @param string $nameTypeCode
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
     */
    public function addFieldGuarantorName(
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
        $nameTypeCode = null,
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
        $professionalSuffix = null
    ) {
        $GuarantorName = $this
            ->dataTypeFactory
            ->create('XPN', $this->characterEncoding)
        ;
        $this->GuarantorName[] = $GuarantorName;
        $GuarantorName->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $GuarantorName->setGivenName($givenName);
        $GuarantorName->setSecondNames($secondNames);
        $GuarantorName->setSuffix($suffix);
        $GuarantorName->setPrefix($prefix);
        $GuarantorName->setDegree($degree);
        $GuarantorName->setNameTypeCode($nameTypeCode);
        $GuarantorName->setNameRepresentationCode($nameRepresentationCode);
        $GuarantorName->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $GuarantorName->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $GuarantorName->setNameAssemblyOrder($nameAssemblyOrder);
        $GuarantorName->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $GuarantorName->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $GuarantorName->setProfessionalSuffix($professionalSuffix);
    }


    /**
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
     * @param string $nameTypeCode
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
     */
    public function addFieldGuarantorSpouseName(
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
        $nameTypeCode = null,
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
        $professionalSuffix = null
    ) {
        $GuarantorSpouseName = $this
            ->dataTypeFactory
            ->create('XPN', $this->characterEncoding)
        ;
        $this->GuarantorSpouseName[] = $GuarantorSpouseName;
        $GuarantorSpouseName->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $GuarantorSpouseName->setGivenName($givenName);
        $GuarantorSpouseName->setSecondNames($secondNames);
        $GuarantorSpouseName->setSuffix($suffix);
        $GuarantorSpouseName->setPrefix($prefix);
        $GuarantorSpouseName->setDegree($degree);
        $GuarantorSpouseName->setNameTypeCode($nameTypeCode);
        $GuarantorSpouseName->setNameRepresentationCode($nameRepresentationCode);
        $GuarantorSpouseName->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $GuarantorSpouseName->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $GuarantorSpouseName->setNameAssemblyOrder($nameAssemblyOrder);
        $GuarantorSpouseName->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $GuarantorSpouseName->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $GuarantorSpouseName->setProfessionalSuffix($professionalSuffix);
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
    public function addFieldGuarantorAddress(
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
        $GuarantorAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->characterEncoding)
        ;
        $this->GuarantorAddress[] = $GuarantorAddress;
        $GuarantorAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $GuarantorAddress->setOtherDesignation($otherDesignation);
        $GuarantorAddress->setCity($city);
        $GuarantorAddress->setStateOrProvince($stateOrProvince);
        $GuarantorAddress->setZipOrPostalCode($zipOrPostalCode);
        $GuarantorAddress->setCountry($country);
        $GuarantorAddress->setAddressType($addressType);
        $GuarantorAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $GuarantorAddress->setCountyParishCode($countyParishCode);
        $GuarantorAddress->setCensusTract($censusTract);
        $GuarantorAddress->setAddressRepresentationCode($addressRepresentationCode);
        $GuarantorAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $GuarantorAddress->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $GuarantorAddress->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
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
    public function addFieldGuarantorPhNum_Home(
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
        $GuarantorPhNum_Home = $this
            ->dataTypeFactory
            ->create('XTN', $this->characterEncoding)
        ;
        $this->GuarantorPhNum_Home[] = $GuarantorPhNum_Home;
        $GuarantorPhNum_Home->setTelephoneNumber($telephoneNumber);
        $GuarantorPhNum_Home->setTelecommunicationUseCode($telecommunicationUseCode);
        $GuarantorPhNum_Home->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $GuarantorPhNum_Home->setEmailAddress($emailAddress);
        $GuarantorPhNum_Home->setCountryCode($countryCode);
        $GuarantorPhNum_Home->setAreaCityCode($areaCityCode);
        $GuarantorPhNum_Home->setLocalNumber($localNumber);
        $GuarantorPhNum_Home->setExtension($extension);
        $GuarantorPhNum_Home->setAnyText($anyText);
        $GuarantorPhNum_Home->setExtensionPrefix($extensionPrefix);
        $GuarantorPhNum_Home->setSpeedDialCode($speedDialCode);
        $GuarantorPhNum_Home->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
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
    public function addFieldGuarantorPhNum_Business(
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
        $GuarantorPhNum_Business = $this
            ->dataTypeFactory
            ->create('XTN', $this->characterEncoding)
        ;
        $this->GuarantorPhNum_Business[] = $GuarantorPhNum_Business;
        $GuarantorPhNum_Business->setTelephoneNumber($telephoneNumber);
        $GuarantorPhNum_Business->setTelecommunicationUseCode($telecommunicationUseCode);
        $GuarantorPhNum_Business->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $GuarantorPhNum_Business->setEmailAddress($emailAddress);
        $GuarantorPhNum_Business->setCountryCode($countryCode);
        $GuarantorPhNum_Business->setAreaCityCode($areaCityCode);
        $GuarantorPhNum_Business->setLocalNumber($localNumber);
        $GuarantorPhNum_Business->setExtension($extension);
        $GuarantorPhNum_Business->setAnyText($anyText);
        $GuarantorPhNum_Business->setExtensionPrefix($extensionPrefix);
        $GuarantorPhNum_Business->setSpeedDialCode($speedDialCode);
        $GuarantorPhNum_Business->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldGuarantorDateTimeOfBirth($time, $degreeOfPrecision = null)
    {
        $this->GuarantorDateTimeOfBirth = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->GuarantorDateTimeOfBirth->setTime($time);
        $this->GuarantorDateTimeOfBirth->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldGuarantorAdministrativeSex($value)
    {
        $this->GuarantorAdministrativeSex = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->GuarantorAdministrativeSex->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldGuarantorType($value)
    {
        $this->GuarantorType = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->GuarantorType->setValue($value);
    }





    /**
     * @return \Hl7v2\DataType\SiDataType
     */
    public function getSetIDGT1()
    {
        return $this->SetID_GT1;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType
     */
    public function getGuarantorNumber()
    {
        return $this->GuarantorNumber;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getGuarantorName()
    {
        return $this->GuarantorName;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getGuarantorSpouseName()
    {
        return $this->GuarantorSpouseName;
    }

    /**
     * @return \Hl7v2\DataType\XadDataType[]
     */
    public function getGuarantorAddress()
    {
        return $this->GuarantorAddress;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getGuarantorPhNumHome()
    {
        return $this->GuarantorPhNum_Home;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getGuarantorPhNumBusiness()
    {
        return $this->GuarantorPhNum_Business;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getGuarantorDateTimeOfBirth()
    {
        return $this->GuarantorDateTimeOfBirth;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getGuarantorAdministrativeSex()
    {
        return $this->GuarantorAdministrativeSex;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getGuarantorType()
    {
        return $this->GuarantorType;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getGuarantorRelationship()
    {
        return $this->GuarantorRelationship;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getGuarantorSSN()
    {
        return $this->GuarantorSSN;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getGuarantorDateBegin()
    {
        return $this->GuarantorDate_Begin;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getGuarantorDateEnd()
    {
        return $this->GuarantorDate_End;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getGuarantorPriority()
    {
        return $this->GuarantorPriority;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getGuarantorEmployerName()
    {
        return $this->GuarantorEmployerName;
    }

    /**
     * @return \Hl7v2\DataType\XadDataType[]
     */
    public function getGuarantorEmployerAddress()
    {
        return $this->GuarantorEmployerAddress;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getGuarantorEmployerPhoneNumber()
    {
        return $this->GuarantorEmployerPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType
     */
    public function getGuarantorEmployeeIDNumber()
    {
        return $this->GuarantorEmployeeIDNumber;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getGuarantorEmploymentStatus()
    {
        return $this->GuarantorEmploymentStatus;
    }

    /**
     * @return \Hl7v2\DataType\XonDataType[]
     */
    public function getGuarantorOrganizationName()
    {
        return $this->GuarantorOrganizationName;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getGuarantorBillingHoldFlag()
    {
        return $this->GuarantorBillingHoldFlag;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getGuarantorCreditRatingCode()
    {
        return $this->GuarantorCreditRatingCode;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getGuarantorDeathDateAndTime()
    {
        return $this->GuarantorDeathDateAndTime;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getGuarantorDeathFlag()
    {
        return $this->GuarantorDeathFlag;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getGuarantorChargeAdjustmentCode()
    {
        return $this->GuarantorChargeAdjustmentCode;
    }

    /**
     * @return \Hl7v2\DataType\CpDataType
     */
    public function getGuarantorHouseholdAnnualIncome()
    {
        return $this->GuarantorHouseholdAnnualIncome;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getGuarantorHouseholdSize()
    {
        return $this->GuarantorHouseholdSize;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType
     */
    public function getGuarantorEmployerIDNumber()
    {
        return $this->GuarantorEmployerIDNumber;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getGuarantorMaritalStatusCode()
    {
        return $this->GuarantorMaritalStatusCode;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getGuarantorHireEffectiveDate()
    {
        return $this->GuarantorHireEffectiveDate;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getEmploymentStopDate()
    {
        return $this->EmploymentStopDate;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getLivingDependency()
    {
        return $this->LivingDependency;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getAmbulatoryStatus()
    {
        return $this->AmbulatoryStatus;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType[]
     */
    public function getCitizenship()
    {
        return $this->Citizenship;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getPrimaryLanguage()
    {
        return $this->PrimaryLanguage;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getLivingArrangement()
    {
        return $this->LivingArrangement;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getPublicityCode()
    {
        return $this->PublicityCode;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getProtectionIndicator()
    {
        return $this->ProtectionIndicator;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getStudentIndicator()
    {
        return $this->StudentIndicator;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getReligion()
    {
        return $this->Religion;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getMothersMaidenName()
    {
        return $this->MothersMaidenName;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getNationality()
    {
        return $this->Nationality;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType[]
     */
    public function getEthnicGroup()
    {
        return $this->EthnicGroup;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getContactPersonsName()
    {
        return $this->ContactPersonsName;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getContactPersonsTelephoneNumber()
    {
        return $this->ContactPersonsTelephoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getContactReason()
    {
        return $this->ContactReason;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getContactRelationship()
    {
        return $this->ContactRelationship;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getJobTitle()
    {
        return $this->JobTitle;
    }

    /**
     * @return null
     */
    public function getJobCodeClass()
    {
        return $this->JobCodeClass;
    }

    /**
     * @return \Hl7v2\DataType\XonDataType[]
     */
    public function getGuarantorEmployersOrganizationName()
    {
        return $this->GuarantorEmployersOrganizationName;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getHandicap()
    {
        return $this->Handicap;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getJobStatus()
    {
        return $this->JobStatus;
    }

    /**
     * @return \Hl7v2\DataType\FcDataType
     */
    public function getGuarantorFinancialClass()
    {
        return $this->GuarantorFinancialClass;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType[]
     */
    public function getGuarantorRace()
    {
        return $this->GuarantorRace;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getGuarantorBirthPlace()
    {
        return $this->GuarantorBirthPlace;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getVIPIndicator()
    {
        return $this->VIPIndicator;
    }
    
    
}
<?php

namespace Hl7v2\Segment;

use carlosllorca\hl7messages\Segments\Pid;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;

/**
 * Patient Identification (PID).
 * The PID segment is used by all applications as the primary means of communicating patient identification information.
 * This segment contains permanent patient identifying and demographic information that, for the most part, is not likely to change frequently.
 */
class PidSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\SiDataType
     */
    public $setId = null;
    /**
     * @var \Hl7v2\DataType\CxDataType
     */
    public $patientId = null;
    /**
     * @var \Hl7v2\DataType\CxDataType[]
     */
    public $patientIdentifierList;
    /**
     * @var \Hl7v2\DataType\CxDataType[]
     */
    public $altPatientId = [];
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $patientName;
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $mothersMaidenName = [];
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $datetimeOfBirth = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $administrativeSex = null;
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $patientAlias = [];
    /**
     * @var \Hl7v2\DataType\CeDataType[]
     */
    public $race = [];
    /**
     * @var \Hl7v2\DataType\XadDataType[]
     */
    public $patientAddress = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $countyCode = null;
    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    public $phoneNumberHome = [];
    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    public $phoneNumberBusiness = [];
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $primaryLanguage = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $maritalStatus = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $religion = null;
    /**
     * @var \Hl7v2\DataType\CxDataType
     */
    public $patientAccountNumber = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $ssnNumberPatient = null;
    /**
     * @var \Hl7v2\DataType\DlnDataType
     */
    public $driversLicenseNumberPatient = null;
    /**
     * @var \Hl7v2\DataType\CxDataType[]
     */
    public $mothersIdentifier = [];
    /**
     * @var \Hl7v2\DataType\CeDataType[]
     */
    public $ethnicGroup = [];
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $birthPlace = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $multipleBirthIndicator = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $birthOrder = null;
    /**
     * @var \Hl7v2\DataType\CeDataType[]
     */
    public $citizenship = [];
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $veteransMilitaryStatus = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $nationality = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $patientDeathDateAndTime = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $patientDeathIndicator = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $identityUnknownIndicator = null;
    /**
     * @var \Hl7v2\DataType\IsDataType[]
     */
    public $identityReliabilityCode = [];
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $lastUpdateDatetime = null;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    public $lastUpdateFacility = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $speciesCode = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $breedCode = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $strain = null;
    /**
     * @var \Hl7v2\DataType\CeDataType[]
     */
    public $productionClassCode = [];
    /**
     * @var \Hl7v2\DataType\CweDataType[]
     */
    public $tribalCitizenship = [];


    /**
     * @param string $value
     */
    public function setFieldSetId($value)
    {
        $this->setId = $this
            ->dataTypeFactory
            ->create('SI', $this->characterEncoding)
        ;
        $this->setId->setValue($value);
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
    public function setFieldPatientId(
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
        $this->patientId = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->patientId->setIdNumber($idNumber);
        $this->patientId->setCheckDigit($checkDigit);
        $this->patientId->setCheckDigitScheme($checkDigitScheme);
        $this->patientId->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->patientId->setIdentifierTypeCode($identifierTypeCode);
        $this->patientId->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $this->patientId->setEffectiveDate($effectiveDate);
        $this->patientId->setExpirationDate($expirationDate);
        $this->patientId->setAssigningJurisdiction(
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
        $this->patientId->setAssigningAgency(
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
    public function addFieldPatientIdentifierList(
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
        $patientIdentifierList = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->patientIdentifierList[] = $patientIdentifierList;
        $patientIdentifierList->setIdNumber($idNumber);
        $patientIdentifierList->setCheckDigit($checkDigit);
        $patientIdentifierList->setCheckDigitScheme($checkDigitScheme);
        $patientIdentifierList->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $patientIdentifierList->setIdentifierTypeCode($identifierTypeCode);
        $patientIdentifierList->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $patientIdentifierList->setEffectiveDate($effectiveDate);
        $patientIdentifierList->setExpirationDate($expirationDate);
        $patientIdentifierList->setAssigningJurisdiction(
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
        $patientIdentifierList->setAssigningAgency(
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
    public function addFieldAltPatientId(
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
        $altPatientId = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->altPatientId[] = $altPatientId;
        $altPatientId->setIdNumber($idNumber);
        $altPatientId->setCheckDigit($checkDigit);
        $altPatientId->setCheckDigitScheme($checkDigitScheme);
        $altPatientId->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $altPatientId->setIdentifierTypeCode($identifierTypeCode);
        $altPatientId->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $altPatientId->setEffectiveDate($effectiveDate);
        $altPatientId->setExpirationDate($expirationDate);
        $altPatientId->setAssigningJurisdiction(
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
        $altPatientId->setAssigningAgency(
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
    public function addFieldPatientName(
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
        $patientName = $this
            ->dataTypeFactory
            ->create('XPN', $this->characterEncoding)
        ;
        $this->patientName[] = $patientName;
        $patientName->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $patientName->setGivenName($givenName);
        $patientName->setSecondNames($secondNames);
        $patientName->setSuffix($suffix);
        $patientName->setPrefix($prefix);
        $patientName->setDegree($degree);
        $patientName->setNameTypeCode($nameTypeCode);
        $patientName->setNameRepresentationCode($nameRepresentationCode);
        $patientName->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $patientName->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $patientName->setNameAssemblyOrder($nameAssemblyOrder);
        $patientName->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $patientName->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $patientName->setProfessionalSuffix($professionalSuffix);
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
    public function addFieldMothersMaidenName(
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
        $mothersMaidenName = $this
            ->dataTypeFactory
            ->create('XPN', $this->characterEncoding)
        ;
        $this->mothersMaidenName[] = $mothersMaidenName;
        $mothersMaidenName->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $mothersMaidenName->setGivenName($givenName);
        $mothersMaidenName->setSecondNames($secondNames);
        $mothersMaidenName->setSuffix($suffix);
        $mothersMaidenName->setPrefix($prefix);
        $mothersMaidenName->setDegree($degree);
        $mothersMaidenName->setNameTypeCode($nameTypeCode);
        $mothersMaidenName->setNameRepresentationCode($nameRepresentationCode);
        $mothersMaidenName->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $mothersMaidenName->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $mothersMaidenName->setNameAssemblyOrder($nameAssemblyOrder);
        $mothersMaidenName->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $mothersMaidenName->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $mothersMaidenName->setProfessionalSuffix($professionalSuffix);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDatetimeOfBirth($time, $degreeOfPrecision = null)
    {
        $this->datetimeOfBirth = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->datetimeOfBirth->setTime($time);
        $this->datetimeOfBirth->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldAdministrativeSex($value)
    {
        $this->administrativeSex = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->administrativeSex->setValue($value);
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
    public function addFieldPatientAlias(
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
        $patientAlias = $this
            ->dataTypeFactory
            ->create('XPN', $this->characterEncoding)
        ;
        $this->patientAlias[] = $patientAlias;
        $patientAlias->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $patientAlias->setGivenName($givenName);
        $patientAlias->setSecondNames($secondNames);
        $patientAlias->setSuffix($suffix);
        $patientAlias->setPrefix($prefix);
        $patientAlias->setDegree($degree);
        $patientAlias->setNameTypeCode($nameTypeCode);
        $patientAlias->setNameRepresentationCode($nameRepresentationCode);
        $patientAlias->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $patientAlias->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $patientAlias->setNameAssemblyOrder($nameAssemblyOrder);
        $patientAlias->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $patientAlias->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $patientAlias->setProfessionalSuffix($professionalSuffix);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldRace(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $race = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->race[] = $race;
        $race->setIdentifier($identifier);
        $race->setText($text);
        $race->setNameOfCodingSystem($nameOfCodingSystem);
        $race->setAltIdentifier($altIdentifier);
        $race->setAltText($altText);
        $race->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function addFieldPatientAddress(
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
        $patientAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->characterEncoding)
        ;
        $this->patientAddress[] = $patientAddress;
        $patientAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $patientAddress->setOtherDesignation($otherDesignation);
        $patientAddress->setCity($city);
        $patientAddress->setStateOrProvince($stateOrProvince);
        $patientAddress->setZipOrPostalCode($zipOrPostalCode);
        $patientAddress->setCountry($country);
        $patientAddress->setAddressType($addressType);
        $patientAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $patientAddress->setCountyParishCode($countyParishCode);
        $patientAddress->setCensusTract($censusTract);
        $patientAddress->setAddressRepresentationCode($addressRepresentationCode);
        $patientAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $patientAddress->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $patientAddress->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldCountyCode($value)
    {
        $this->countyCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->countyCode->setValue($value);
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
    public function addFieldPhoneNumberHome(
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
        $phoneNumberHome = $this
            ->dataTypeFactory
            ->create('XTN', $this->characterEncoding)
        ;
        $this->phoneNumberHome[] = $phoneNumberHome;
        $phoneNumberHome->setTelephoneNumber($telephoneNumber);
        $phoneNumberHome->setTelecommunicationUseCode($telecommunicationUseCode);
        $phoneNumberHome->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $phoneNumberHome->setEmailAddress($emailAddress);
        $phoneNumberHome->setCountryCode($countryCode);
        $phoneNumberHome->setAreaCityCode($areaCityCode);
        $phoneNumberHome->setLocalNumber($localNumber);
        $phoneNumberHome->setExtension($extension);
        $phoneNumberHome->setAnyText($anyText);
        $phoneNumberHome->setExtensionPrefix($extensionPrefix);
        $phoneNumberHome->setSpeedDialCode($speedDialCode);
        $phoneNumberHome->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
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
    public function addFieldPhoneNumberBusiness(
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
        $phoneNumberBusiness = $this
            ->dataTypeFactory
            ->create('XTN', $this->characterEncoding)
        ;
        $this->phoneNumberBusiness[] = $phoneNumberBusiness;
        $phoneNumberBusiness->setTelephoneNumber($telephoneNumber);
        $phoneNumberBusiness->setTelecommunicationUseCode($telecommunicationUseCode);
        $phoneNumberBusiness->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $phoneNumberBusiness->setEmailAddress($emailAddress);
        $phoneNumberBusiness->setCountryCode($countryCode);
        $phoneNumberBusiness->setAreaCityCode($areaCityCode);
        $phoneNumberBusiness->setLocalNumber($localNumber);
        $phoneNumberBusiness->setExtension($extension);
        $phoneNumberBusiness->setAnyText($anyText);
        $phoneNumberBusiness->setExtensionPrefix($extensionPrefix);
        $phoneNumberBusiness->setSpeedDialCode($speedDialCode);
        $phoneNumberBusiness->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldPrimaryLanguage(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->primaryLanguage = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->primaryLanguage->setIdentifier($identifier);
        $this->primaryLanguage->setText($text);
        $this->primaryLanguage->setNameOfCodingSystem($nameOfCodingSystem);
        $this->primaryLanguage->setAltIdentifier($altIdentifier);
        $this->primaryLanguage->setAltText($altText);
        $this->primaryLanguage->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldMaritalStatus(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->maritalStatus = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->maritalStatus->setIdentifier($identifier);
        $this->maritalStatus->setText($text);
        $this->maritalStatus->setNameOfCodingSystem($nameOfCodingSystem);
        $this->maritalStatus->setAltIdentifier($altIdentifier);
        $this->maritalStatus->setAltText($altText);
        $this->maritalStatus->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldReligion(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->religion = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->religion->setIdentifier($identifier);
        $this->religion->setText($text);
        $this->religion->setNameOfCodingSystem($nameOfCodingSystem);
        $this->religion->setAltIdentifier($altIdentifier);
        $this->religion->setAltText($altText);
        $this->religion->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function setFieldPatientAccountNumber(
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
        $this->patientAccountNumber = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->patientAccountNumber->setIdNumber($idNumber);
        $this->patientAccountNumber->setCheckDigit($checkDigit);
        $this->patientAccountNumber->setCheckDigitScheme($checkDigitScheme);
        $this->patientAccountNumber->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $this->patientAccountNumber->setIdentifierTypeCode($identifierTypeCode);
        $this->patientAccountNumber->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $this->patientAccountNumber->setEffectiveDate($effectiveDate);
        $this->patientAccountNumber->setExpirationDate($expirationDate);
        $this->patientAccountNumber->setAssigningJurisdiction(
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
        $this->patientAccountNumber->setAssigningAgency(
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
     * @param string $value
     */
    public function setFieldSsnNumberPatient($value)
    {
        $this->ssnNumberPatient = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->ssnNumberPatient->setValue($value);
    }

    /**
     * @param string $licenseNumber
     * @param string $issuingStateProvinceCountry
     * @param string $expirationDate
     */
    public function setFieldDriversLicenseNumberPatient(
        $licenseNumber,
        $issuingStateProvinceCountry = null,
        $expirationDate = null
    ) {
        $this->driversLicenseNumberPatient = $this
            ->dataTypeFactory
            ->create('DLN', $this->characterEncoding)
        ;
        $this->driversLicenseNumberPatient->setLicenseNumber($licenseNumber);
        $this->driversLicenseNumberPatient->setIssuingStateProvinceCountry(
            $issuingStateProvinceCountry
        );
        $this->driversLicenseNumberPatient->setExpirationDate($expirationDate);
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
    public function addFieldMothersIdentifier(
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
        $mothersIdentifier = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->mothersIdentifier[] = $mothersIdentifier;
        $mothersIdentifier->setIdNumber($idNumber);
        $mothersIdentifier->setCheckDigit($checkDigit);
        $mothersIdentifier->setCheckDigitScheme($checkDigitScheme);
        $mothersIdentifier->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $mothersIdentifier->setIdentifierTypeCode($identifierTypeCode);
        $mothersIdentifier->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $mothersIdentifier->setEffectiveDate($effectiveDate);
        $mothersIdentifier->setExpirationDate($expirationDate);
        $mothersIdentifier->setAssigningJurisdiction(
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
        $mothersIdentifier->setAssigningAgency(
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
    public function addFieldEthnicGroup(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $ethnicGroup = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->ethnicGroup[] = $ethnicGroup;
        $ethnicGroup->setIdentifier($identifier);
        $ethnicGroup->setText($text);
        $ethnicGroup->setNameOfCodingSystem($nameOfCodingSystem);
        $ethnicGroup->setAltIdentifier($altIdentifier);
        $ethnicGroup->setAltText($altText);
        $ethnicGroup->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldBirthPlace($value)
    {
        $this->birthPlace = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->birthPlace->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldMultipleBirthIndicator($value)
    {
        $this->multipleBirthIndicator = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->multipleBirthIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBirthOrder($value)
    {
        $this->birthOrder = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->birthOrder->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldCitizenship(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $citizenship = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->citizenship[] = $citizenship;
        $citizenship->setIdentifier($identifier);
        $citizenship->setText($text);
        $citizenship->setNameOfCodingSystem($nameOfCodingSystem);
        $citizenship->setAltIdentifier($altIdentifier);
        $citizenship->setAltText($altText);
        $citizenship->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldVeteransMilitaryStatus(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->veteransMilitaryStatus = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->veteransMilitaryStatus->setIdentifier($identifier);
        $this->veteransMilitaryStatus->setText($text);
        $this->veteransMilitaryStatus->setNameOfCodingSystem($nameOfCodingSystem);
        $this->veteransMilitaryStatus->setAltIdentifier($altIdentifier);
        $this->veteransMilitaryStatus->setAltText($altText);
        $this->veteransMilitaryStatus->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldNationality(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->nationality = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->nationality->setIdentifier($identifier);
        $this->nationality->setText($text);
        $this->nationality->setNameOfCodingSystem($nameOfCodingSystem);
        $this->nationality->setAltIdentifier($altIdentifier);
        $this->nationality->setAltText($altText);
        $this->nationality->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldPatientDeathDateAndTime($time, $degreeOfPrecision = null)
    {
        $this->patientDeathDateAndTime = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->patientDeathDateAndTime->setTime($time);
        $this->patientDeathDateAndTime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldPatientDeathIndicator($value)
    {
        $this->patientDeathIndicator = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->patientDeathIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldIdentityUnknownIndicator($value)
    {
        $this->identityUnknownIndicator = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->identityUnknownIndicator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldIdentityReliabilityCode($value)
    {
        $identityReliabilityCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $identityReliabilityCode->setValue($value);
        $this->identityReliabilityCode[] = $identityReliabilityCode;
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldLastUpdateDatetime($time, $degreeOfPrecision = null)
    {
        $this->lastUpdateDatetime = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->lastUpdateDatetime->setTime($time);
        $this->lastUpdateDatetime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldLastUpdateFacility($namespaceId, $universalId, $universalIdType)
    {
        $this->lastUpdateFacility = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->lastUpdateFacility->setNamespaceId($namespaceId);
        $this->lastUpdateFacility->setUniversalId($universalId, $universalIdType);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldSpeciesCode(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->speciesCode = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->speciesCode->setIdentifier($identifier);
        $this->speciesCode->setText($text);
        $this->speciesCode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->speciesCode->setAltIdentifier($altIdentifier);
        $this->speciesCode->setAltText($altText);
        $this->speciesCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldBreedCode(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->breedCode = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->breedCode->setIdentifier($identifier);
        $this->breedCode->setText($text);
        $this->breedCode->setNameOfCodingSystem($nameOfCodingSystem);
        $this->breedCode->setAltIdentifier($altIdentifier);
        $this->breedCode->setAltText($altText);
        $this->breedCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldStrain($value)
    {
        $this->strain = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->strain->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function addFieldProductionClassCode(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        if (2 <= sizeof($this->productionClassCode)) {
            throw new SegmentError(
                "Maximum repetitions (2) of this Field would be exceeded."
            );
        }
        $productionClassCode = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->productionClassCode[] = $productionClassCode;
        $productionClassCode->setIdentifier($identifier);
        $productionClassCode->setText($text);
        $productionClassCode->setNameOfCodingSystem($nameOfCodingSystem);
        $productionClassCode->setAltIdentifier($altIdentifier);
        $productionClassCode->setAltText($altText);
        $productionClassCode->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function addFieldTribalCitizenship(
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
        $tribalCitizenship = $this
            ->dataTypeFactory
            ->create('CWE', $this->characterEncoding)
        ;
        $this->tribalCitizenship[] = $tribalCitizenship;
        $tribalCitizenship->setIdentifier($identifier);
        $tribalCitizenship->setText($text);
        $tribalCitizenship->setNameOfCodingSystem($nameOfCodingSystem);
        $tribalCitizenship->setAltIdentifier($altIdentifier);
        $tribalCitizenship->setAltText($altText);
        $tribalCitizenship->setNameOfAltCodingSystem($nameOfAltCodingSystem);
        $tribalCitizenship->setCodingSystemVersionId($codingSystemVersionId);
        $tribalCitizenship->setAltCodingSystemVersionId($altCodingSystemVersionId);
        $tribalCitizenship->setOriginalText($originalText);
    }

    /**
     * @return \Hl7v2\DataType\SiDataType
     */
    public function getFieldSetId()
    {
        return $this->setId;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType
     */
    public function getFieldPatientId()
    {
        return $this->patientId;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType[]
     */
    public function getFieldPatientIdentifierList()
    {
        return $this->patientIdentifierList;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType[]
     */
    public function getFieldAltPatientId()
    {
        return $this->altPatientId;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getFieldPatientName()
    {
        return $this->patientName;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getFieldMothersMaidenName()
    {
        return $this->mothersMaidenName;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getFieldDatetimeOfBirth()
    {
        return $this->datetimeOfBirth;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldAdministrativeSex()
    {
        return $this->administrativeSex;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getFieldPatientAlias()
    {
        return $this->patientAlias;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType[]
     */
    public function getFieldRace()
    {
        return $this->race;
    }

    /**
     * @return \Hl7v2\DataType\XadDataType[]
     */
    public function getFieldPatientAddress()
    {
        return $this->patientAddress;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getFieldCountyCode()
    {
        return $this->countyCode;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getFieldPhoneNumberHome()
    {
        return $this->phoneNumberHome;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getFieldPhoneNumberBusiness()
    {
        return $this->phoneNumberBusiness;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldPrimaryLanguage()
    {
        return $this->primaryLanguage;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldReligion()
    {
        return $this->religion;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType
     */
    public function getFieldPatientAccountNumber()
    {
        return $this->patientAccountNumber;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldSsnNumberPatient()
    {
        return $this->ssnNumberPatient;
    }

    /**
     * @return \Hl7v2\DataType\DlnDataType
     */
    public function getFieldDriversLicenseNumberPatient()
    {
        return $this->driversLicenseNumberPatient;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType[]
     */
    public function getFieldMothersIdentifier()
    {
        return $this->mothersIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType[]
     */
    public function getFieldEthnicGroup()
    {
        return $this->ethnicGroup;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldMultipleBirthIndicator()
    {
        return $this->multipleBirthIndicator;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldBirthOrder()
    {
        return $this->birthOrder;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType[]
     */
    public function getFieldCitizenship()
    {
        return $this->citizenship;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldVeteransMilitaryStatus()
    {
        return $this->veteransMilitaryStatus;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldNationality()
    {
        return $this->nationality;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getFieldPatientDeathDateAndTime()
    {
        return $this->patientDeathDateAndTime;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldPatientDeathIndicator()
    {
        return $this->patientDeathIndicator;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldIdentityUnknownIndicator()
    {
        return $this->identityUnknownIndicator;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType[]
     */
    public function getFieldIdentityReliabilityCode()
    {
        return $this->identityReliabilityCode;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getFieldLastUpdateDatetime()
    {
        return $this->lastUpdateDatetime;
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getFieldLastUpdateFacility()
    {
        return $this->lastUpdateFacility;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldSpeciesCode()
    {
        return $this->speciesCode;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldBreedCode()
    {
        return $this->breedCode;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldStrain()
    {
        return $this->strain;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType[]
     */
    public function getFieldProductionClassCode()
    {
        return $this->productionClassCode;
    }

    /**
     * @return \Hl7v2\DataType\CweDataType[]
     */
    public function getFieldTribalCitizenship()
    {
        return $this->tribalCitizenship;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // PID.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetId', 4, $datagram->getPositionalState());
        $this->setFieldSetId($codec->extractComponent($datagram));

        // PID.2
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('PatientId', 20, $datagram->getPositionalState());
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
        $this->setFieldPatientId(
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

        // PID.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PatientIdentifierList', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
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
            ) = $components;
            $this->addFieldPatientIdentifierList(
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
        }

        // PID.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('AltPatientId', 20, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
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
            ) = $components;
            $this->addFieldAltPatientId(
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
        }

        // PID.5
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [[1,1,1,1,1],1,1,1,1,1,1,1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PatientName', 250, $datagram->getPositionalState());
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
            $this->addFieldPatientName(
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

        // PID.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1,1,1],1,1,1,1,1,1,1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('MothersMaidenName', 250, $datagram->getPositionalState());
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
            $this->addFieldMothersMaidenName(
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

        // PID.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DatetimeOfBirth', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDatetimeOfBirth(
            $time,
            $degreeOfPrecision
        );

        // PID.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AdministrativeSex', 1, $datagram->getPositionalState());
        $this->setFieldAdministrativeSex($codec->extractComponent($datagram));

        // PID.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1,1,1],1,1,1,1,1,1,1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PatientAlias', 250, $datagram->getPositionalState());
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
            $this->addFieldPatientAlias(
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

        // PID.10
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Race', 250, $datagram->getPositionalState());
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
            ) = $components;
            $this->addFieldRace(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // PID.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PatientAddress', 250, $datagram->getPositionalState());
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
            $this->addFieldPatientAddress(
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

        // PID.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CountyCode', 4, $datagram->getPositionalState());
        $this->setFieldCountyCode($codec->extractComponent($datagram));

        // PID.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PhoneNumberHome', 250, $datagram->getPositionalState());
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
            $this->addFieldPhoneNumberHome(
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

        // PID.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('PhoneNumberBusiness', 250, $datagram->getPositionalState());
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
            $this->addFieldPhoneNumberBusiness(
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
        $this->checkFieldLength('PrimaryLanguage', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPrimaryLanguage(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('MaritalStatus', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldMaritalStatus(
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
        $this->checkFieldLength('Religion', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldReligion(
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
        $this->checkFieldLength('PatientAccountNumber', 250, $datagram->getPositionalState());
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
        $this->setFieldPatientAccountNumber(
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

        // PID.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SsnNumberPatient', 16, $datagram->getPositionalState());
        $this->setFieldSsnNumberPatient($codec->extractComponent($datagram));

        // PID.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DriversLicenseNumberPatient', 25, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $licenseNumber,
            $issuingStateProvinceCountry,
            $expirationDate,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDriversLicenseNumberPatient(
            $licenseNumber,
            $issuingStateProvinceCountry,
            $expirationDate
        );

        // PID.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('MothersIdentifier', 250, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, $sequence);
            $first = false;
        }
        foreach ($repetitions as $components) {
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
            ) = $components;
            $this->addFieldMothersIdentifier(
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
        }

        // PID.22
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('EthnicGroup', 250, $datagram->getPositionalState());
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
            ) = $components;
            $this->addFieldEthnicGroup(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // PID.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BirthPlace', 250, $datagram->getPositionalState());
        $this->setFieldBirthPlace($codec->extractComponent($datagram));

        // PID.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('MultipleBirthIndicator', 1, $datagram->getPositionalState());
        $this->setFieldMultipleBirthIndicator($codec->extractComponent($datagram));

        // PID.25
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BirthOrder', 2, $datagram->getPositionalState());
        $this->setFieldBirthOrder($codec->extractComponent($datagram));

        // PID.26
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('Citizenship', 250, $datagram->getPositionalState());
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
            ) = $components;
            $this->addFieldCitizenship(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // PID.27
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('VeteransMilitaryStatus', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldVeteransMilitaryStatus(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.28
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Nationality', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldNationality(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.29
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PatientDeathDateAndTime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPatientDeathDateAndTime(
            $time,
            $degreeOfPrecision
        );

        // PID.30
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PatientDeathIndicator', 1, $datagram->getPositionalState());
        $this->setFieldPatientDeathIndicator($codec->extractComponent($datagram));

        // PID.31
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('IdentityUnknownIndicator', 1, $datagram->getPositionalState());
        $this->setFieldIdentityUnknownIndicator($codec->extractComponent($datagram));

        // PID.32
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('IdentityReliabilityCode', 20, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldIdentityReliabilityCode($value);
        }

        // PID.33
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('LastUpdateDatetime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldLastUpdateDatetime(
            $time,
            $degreeOfPrecision
        );

        // PID.34
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('LastUpdateFacility', 241, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldLastUpdateFacility(
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // PID.35
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SpeciesCode', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSpeciesCode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.36
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BreedCode', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldBreedCode(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // PID.37
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Strain', 80, $datagram->getPositionalState());
        $this->setFieldStrain($codec->extractComponent($datagram));

        // PID.38
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('ProductionClassCode', 250, $datagram->getPositionalState());
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
            ) = $components;
            $this->addFieldProductionClassCode(
                $identifier,
                $text,
                $nameOfCodingSystem,
                $altIdentifier,
                $altText,
                $nameOfAltCodingSystem
            );
        }

        // PID.39
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('TribalCitizenship', 250, $datagram->getPositionalState());
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
            $this->addFieldTribalCitizenship(
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
    }

}

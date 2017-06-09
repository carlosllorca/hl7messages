<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/26/2017
 * Time: 9:31 AM
 */

namespace Hl7v2\Segment;


use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Exception\SegmentError;

/**
 * IN1: Insurance
 * The IN1 segment contains insurance policy coverage information necessary to produce properly pro-rated and patient
 * and insurance bills.
 */
class In1Segment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\SiDataType
     */
    public $setID_IN1;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $insurancePlanID;
    /**
     * @var \Hl7v2\DataType\CxDataType[]
     */
    public $insuranceCompanyID;
    /**
     * @var \Hl7v2\DataType\XonDataType[]
     */
    public $insuranceCompanyName = [];
    /**
     * @var \Hl7v2\DataType\XadDataType[]
     */
    public $insuranceCompanyAddress = [];
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $insuranceCoContactPerson = [];
    /**
     * @var \Hl7v2\DataType\XtnDataType[]
     */
    public $insuranceCoPhoneNumber = [];
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $groupNumber = null;
    /**
     * @var \Hl7v2\DataType\XonDataType[]
     */
    public $groupName = [];
    /**
     * @var \Hl7v2\DataType\CxDataType[]
     */
    public $insuredsGroupEmpID = [];
    /**
     * @var \Hl7v2\DataType\XonDataType[]
     */
    public $insuredsGroupEmpName = [];
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $planEffectiveDate = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $planExpirationDate = null;
    /**
     * @var \Hl7v2\DataType\AuiDataType
     */
    public $authorizationInformation = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $planType = null;
    /**
     * @var \Hl7v2\DataType\XpnDataType[]
     */
    public $nameOfInsured = [];
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $insuredsRelationshipToPatient = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $insuredsDateOfBirth = null;
    /**
     * @var \Hl7v2\DataType\XadDataType[]
     */
    public $insuredsAddress = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $assignmentOfBenefits = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $coordinationOfBenefits = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $coordOfBenPriority = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $noticeOfAdmissionFlag = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $noticeOfAdmissionDate = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $reportOfEligibilityFlag = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $reportOfEligibilityDate = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $releaseInformationCode = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $pre_AdmitCert = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $verificationDate_Time = null;
    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    public $verificationBy = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $typeOfAgreementCode = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $billingStatus = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $lifetimeReserveDays = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $delayBeforeLRDay = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $companyPlanCode = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $policyNumber = null;
    /**
     * @var \Hl7v2\DataType\CpDataType
     */
    public $policyDeductible = null;
    /**
     * @var \Hl7v2\DataType\CpDataType
     */
    public $policyLimit_Amount = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $policyLimit_Days = null;
    /**
     * @var \Hl7v2\DataType\CpDataType
     */
    public $roomRate_Semi_Private = null;
    /**
     * @var \Hl7v2\DataType\CpDataType
     */
    public $roomRate_Private = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $insuredsEmploymentStatus = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $insuredsAdministrativeSex = null;
    /**
     * @var \Hl7v2\DataType\XadDataType[]
     */
    public $insuredsEmployersAddress = [];
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $verificationStatus = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $priorInsurancePlanID = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $coverageType = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $handicap = null;
    /**
     * @var \Hl7v2\DataType\CxDataType[]
     */
    public $insuredsIDNumber = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $siignatureCode = null;
    /**
     * @var \Hl7v2\DataType\DtDataType
     */
    public $signatureCodeDate = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $insured_sBirthPlace = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $vIPIndicator = null;


    /*** Crea la class dado el mensaje creado en el Datagram y return datagram***/
    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        //IN1.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetID_IN1', 4, $datagram->getPositionalState());
        $this->setFieldSetID_IN1($codec->extractComponent($datagram));

        // IN1.2
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('InsurancePlanID', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldInsurancePlanID(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // In1.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InsuranceCompanyID', 250, $datagram->getPositionalState());
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
            $this->addFieldInsuranceCompanyID(
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

        // IN1.4
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InsuredsGroupEmpName', 250, $datagram->getPositionalState());
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
            $this->addFieldInsuredsGroupEmpName(
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


        // IN1.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InsuranceCompanyAddress', 250, $datagram->getPositionalState());
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
            $this->addFieldInsuranceCompanyAddress(
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


        // IN1.6
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [[1,1,1,1,1],1,1,1,1,1,1,1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InsuranceCoContactPerson', 250, $datagram->getPositionalState());
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
            $this->addFieldInsuranceCoContactPerson(
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

        // IN1.7
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1,1,1,1,1,1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InsuranceCoPhoneNumber', 250, $datagram->getPositionalState());
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
            $this->addFieldInsuranceCoPhoneNumber(
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

        // IN1.8
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('GroupNumber', 12, $datagram->getPositionalState());
        $this->setFieldGroupNumber($codec->extractComponent($datagram));


        // IN1.9
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('GroupName', 250, $datagram->getPositionalState());
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
            $this->addFieldGroupName(
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


        // In1.10
         if (false === $codec->advanceToField($datagram)) {
             throw new SegmentError(
                 'PID Segment data contains too few required fields.'
             );
         }
          $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
          $repetitions = [];
          $first = true;
          while ($first || false !== $codec->advanceToRepetition($datagram)) {
              $this->checkRepetitionLength('InsuredsGroupEmpID', 250, $datagram->getPositionalState());
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
                    $this->addFieldinsuredsGroupEmpID(
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



        // IN1.11
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InsuredsGroupEmpName', 250, $datagram->getPositionalState());
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
            $this->addFieldInsuredsGroupEmpName(
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


        // IN1.12
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PlanEffectiveDate', 8, $datagram->getPositionalState());
        $this->setFieldPlanEffectiveDate($codec->extractComponent($datagram));

        // IN1.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PlanExpirationDate', 8, $datagram->getPositionalState());
        $this->setFieldPlanExpirationDate($codec->extractComponent($datagram));


        //IN1.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AuthorizationInformation', 239, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $authorizationNumber,
            $date,
            $source
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldAuthorizationInformation(
            $authorizationNumber,
            $date,
            $source

        );

        // IN1.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PlanType', 3, $datagram->getPositionalState());
        $this->setFieldPlanType($codec->extractComponent($datagram));

        // IN1.16
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [[1,1,1,1,1],1,1,1,1,1,1,1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('NameOfInsured', 250, $datagram->getPositionalState());
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
            $this->addFieldNameOfInsured(
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


        // IN1.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('InsuredsRelationshipToPatient', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldInsuredsRelationshipToPatient(
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
        $this->checkFieldLength('InsuredsDateOfBirth', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldInsuredsDateOfBirth(
            $time,
            $degreeOfPrecision
        );

        // IN1.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InsuredsAddress', 250, $datagram->getPositionalState());
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
            $this->addFieldInsuredsAddress(
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

        // IN1.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AssignmentOfBenefits', 2, $datagram->getPositionalState());
        $this->setFieldAssignmentOfBenefits($codec->extractComponent($datagram));


        // IN1.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CoordinationOfBenefits', 2, $datagram->getPositionalState());
        $this->setFieldCoordinationOfBenefits($codec->extractComponent($datagram));


        // PID.22
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CoordOfBenPriority', 2, $datagram->getPositionalState());
        $this->setFieldCoordOfBenPriority($codec->extractComponent($datagram));

        // PID.23
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('NoticeOfAdmissionFlag', 1, $datagram->getPositionalState());
        $this->setFieldNoticeOfAdmissionFlag($codec->extractComponent($datagram));


        // IN1.24
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('NoticeOfAdmissionDate', 8, $datagram->getPositionalState());
        $this->setFieldNoticeOfAdmissionDate($codec->extractComponent($datagram));

        // PID.25
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ReportOfEligibilityFlag', 1, $datagram->getPositionalState());
        $this->setFieldReportOfEligibilityFlag($codec->extractComponent($datagram));

        // IN1.26
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ReportOfEligibilityDate', 8, $datagram->getPositionalState());
        $this->setFieldReportOfEligibilityDate($codec->extractComponent($datagram));

        // IN1.27
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ReleaseInformationCode', 2, $datagram->getPositionalState());
        $this->setFieldReleaseInformationCode($codec->extractComponent($datagram));

        // IN1.28
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Pre_AdmitCert', 15, $datagram->getPositionalState());
        $this->setFieldPre_AdmitCert($codec->extractComponent($datagram));

        // IN1.29
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('VerificationDate_Time', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldVerificationDate_Time(
            $time,
            $degreeOfPrecision
        );

        // In1.30
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,[1,1,1,1,1],1,1,1,1,1,1,[1,1,1],1,1,1,1,[1,1,1],1,[1,1,1,1,1,1],[[1,1],[1,1]],1,[1,1],[1,1],1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('VerificationBy', 250, $datagram->getPositionalState());
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
            $this->addFieldVerificationBy(
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



        // IN1.31
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('TypeOfAgreementCode', 2, $datagram->getPositionalState());
        $this->setFieldTypeOfAgreementCode($codec->extractComponent($datagram));


        // IN1.32
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('BillingStatus', 2, $datagram->getPositionalState());
        $this->setFieldBillingStatus($codec->extractComponent($datagram));

        // IN1.33
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('LifetimeReserveDays', 2, $datagram->getPositionalState());
        $this->setFieldLifetimeReserveDays($codec->extractComponent($datagram));

        // IN1.34
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DelayBeforeLRDay', 2, $datagram->getPositionalState());
        $this->setFieldDelayBeforeLRDay($codec->extractComponent($datagram));



        // IN1.35
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CompanyPlanCode', 8, $datagram->getPositionalState());
        $this->setFieldCompanyPlanCode($codec->extractComponent($datagram));


        // PID.36
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PolicyNumber', 15, $datagram->getPositionalState());
        $this->setFieldPolicyNumber($codec->extractComponent($datagram));


        // IN1.42
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('InsuredsEmploymentStatus', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldInsuredsEmploymentStatus(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // IN1.43
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('InsuredsAdministrativeSex', 1, $datagram->getPositionalState());
        $this->setFieldInsuredsAdministrativeSex($codec->extractComponent($datagram));

        // IN1.44
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [[1,1,1],1,1,1,1,1,1,1,1,1,1,[[1,1],[1,1]],[1,1],[1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InsuredsEmployersAddress', 250, $datagram->getPositionalState());
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
            $this->addFieldInsuredsEmployersAddress(
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

        // PID.45
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('VerificationStatus', 2, $datagram->getPositionalState());
        $this->setFieldVerificationStatus($codec->extractComponent($datagram));

        // IN1.46
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PriorInsurancePlanID', 8, $datagram->getPositionalState());
        $this->setFieldPriorInsurancePlanID($codec->extractComponent($datagram));


        // IN1.47
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CoverageType', 3, $datagram->getPositionalState());
        $this->setFieldCoverageType($codec->extractComponent($datagram));


        // IN1.48
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Handicap', 2, $datagram->getPositionalState());
        $this->setFieldHandicap($codec->extractComponent($datagram));

        // In1.49
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $sequence = [1,1,1,[1,1,1],1,[1,1,1],1,1,[1,1,1,1,1,1,1,1,1],[1,1,1,1,1,1,1,1,1]];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('InsuredsIDNumber', 20, $datagram->getPositionalState());
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
            $this->addFieldInsuredsIDNumber(
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

        // IN1.50
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SiignatureCode', 1, $datagram->getPositionalState());
        $this->setFieldSiignatureCode($codec->extractComponent($datagram));

        // IN1.51
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SignatureCodeDate', 8, $datagram->getPositionalState());
        $this->setFieldSignatureCodeDate($codec->extractComponent($datagram));

        // PID.52
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('Insured_sBirthPlace', 250, $datagram->getPositionalState());
        $this->setFieldInsured_sBirthPlace($codec->extractComponent($datagram));

        // IN1.53
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('VIPIndicator', 2, $datagram->getPositionalState());
        $this->setFieldVIPIndicator($codec->extractComponent($datagram));



    }

    /**
     * @param string $value
     */
    public function setFieldSetID_IN1($value)
    {
        $this->setID_IN1 = $this
            ->dataTypeFactory
            ->create('SI', $this->characterEncoding)
        ;
        $this->setID_IN1->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldInsurancePlanID(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->insurancePlanID = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->insurancePlanID->setIdentifier($identifier);
        $this->insurancePlanID->setText($text);
        $this->insurancePlanID->setNameOfCodingSystem($nameOfCodingSystem);
        $this->insurancePlanID->setAltIdentifier($altIdentifier);
        $this->insurancePlanID->setAltText($altText);
        $this->insurancePlanID->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldInsuredsRelationshipToPatient(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->insuredsRelationshipToPatient = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->insuredsRelationshipToPatient->setIdentifier($identifier);
        $this->insuredsRelationshipToPatient->setText($text);
        $this->insuredsRelationshipToPatient->setNameOfCodingSystem($nameOfCodingSystem);
        $this->insuredsRelationshipToPatient->setAltIdentifier($altIdentifier);
        $this->insuredsRelationshipToPatient->setAltText($altText);
        $this->insuredsRelationshipToPatient->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldNoticeOfAdmissionFlag($value)
    {
        $this->noticeOfAdmissionFlag = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->noticeOfAdmissionFlag->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldReportOfEligibilityFlag($value)
    {
        $this->reportOfEligibilityFlag = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->reportOfEligibilityFlag->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldInsuredsEmploymentStatus(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->insuredsEmploymentStatus = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->insuredsEmploymentStatus->setIdentifier($identifier);
        $this->insuredsEmploymentStatus->setText($text);
        $this->insuredsEmploymentStatus->setNameOfCodingSystem($nameOfCodingSystem);
        $this->insuredsEmploymentStatus->setAltIdentifier($altIdentifier);
        $this->insuredsEmploymentStatus->setAltText($altText);
        $this->insuredsEmploymentStatus->setNameOfAltCodingSystem($nameOfAltCodingSystem);
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
    public function addFieldInsuranceCompanyID(
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
        $insuranceCompanyID = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->insuranceCompanyID[] = $insuranceCompanyID;
        $insuranceCompanyID->setIdNumber($idNumber);
        $insuranceCompanyID->setCheckDigit($checkDigit);
        $insuranceCompanyID->setCheckDigitScheme($checkDigitScheme);
        $insuranceCompanyID->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $insuranceCompanyID->setIdentifierTypeCode($identifierTypeCode);
        $insuranceCompanyID->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $insuranceCompanyID->setEffectiveDate($effectiveDate);
        $insuranceCompanyID->setExpirationDate($expirationDate);
        $insuranceCompanyID->setAssigningJurisdiction(
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
        $insuranceCompanyID->setAssigningAgency(
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
    public function addFieldGroupName(
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
        $groupName = $this
            ->dataTypeFactory
            ->create('XON', $this->characterEncoding)
        ;
        $this->groupName[] = $groupName;
        $groupName->setOrganisationName($organisationName);
        $groupName->setOrganisationNameTypeCode($organisationNameTypeCode);
        $groupName->setIdNumber($idNumber);
        $groupName->setCheckDigit($checkDigit);
        $groupName->setCheckDigitScheme($checkDigitScheme);
        $groupName->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $groupName->setIdentifierTypeCode($identifierTypeCode);
        $groupName->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $groupName->setNameRepresentationCode($nameRepresentationCode);
        $groupName->setOrganisationIdentifier($organisationIdentifier);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldInsuredsDateOfBirth($time, $degreeOfPrecision = null)
    {
        $this->insuredsDateOfBirth = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->insuredsDateOfBirth->setTime($time);
        $this->insuredsDateOfBirth->setDegreeOfPrecision($degreeOfPrecision);
    }


    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldVerificationDate_Time($time, $degreeOfPrecision = null)
    {
        $this->verificationDate_Time = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->verificationDate_Time->setTime($time);
        $this->verificationDate_Time->setDegreeOfPrecision($degreeOfPrecision);
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
    public function addFieldVerificationBy(
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
        $verificationBy = $this
            ->dataTypeFactory
            ->create('XCN', $this->characterEncoding)
        ;
        $this->verificationBy[] = $verificationBy;
        $verificationBy->setIdNumber($idNumber);
        $verificationBy->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $verificationBy->setGivenName($givenName);
        $verificationBy->setSecondNames($secondNames);
        $verificationBy->setSuffix($suffix);
        $verificationBy->setPrefix($prefix);
        $verificationBy->setDegree($degree);
        $verificationBy->setSourceTable($sourceTable);
        $verificationBy->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $verificationBy->setNameTypeCode($nameTypeCode);
        $verificationBy->setIdentifierCheckDigit($identifierCheckDigit);
        $verificationBy->setCheckDigitScheme($checkDigitScheme);
        $verificationBy->setIdentifierTypeCode($identifierTypeCode);
        $verificationBy->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $verificationBy->setNameRepresentationCode($nameRepresentationCode);
        $verificationBy->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $verificationBy->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $verificationBy->setNameAssemblyOrder($nameAssemblyOrder);
        $verificationBy->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $verificationBy->setExpirationDate(
            $expirationDateTime,
            $expirationDateDegreeOfPrecision
        );
        $verificationBy->setProfessionalSuffix($professionalSuffix);
        $verificationBy->setAssigningJurisdiction(
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
        $verificationBy->setAssigningAgency(
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
    public function addFieldInsuranceCompanyName(
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
        $insuranceCompanyName = $this
            ->dataTypeFactory
            ->create('XON', $this->characterEncoding)
        ;
        $this->insuranceCompanyName[] = $insuranceCompanyName;
        $insuranceCompanyName->setOrganisationName($organisationName);
        $insuranceCompanyName->setOrganisationNameTypeCode($organisationNameTypeCode);
        $insuranceCompanyName->setIdNumber($idNumber);
        $insuranceCompanyName->setCheckDigit($checkDigit);
        $insuranceCompanyName->setCheckDigitScheme($checkDigitScheme);
        $insuranceCompanyName->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $insuranceCompanyName->setIdentifierTypeCode($identifierTypeCode);
        $insuranceCompanyName->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $insuranceCompanyName->setNameRepresentationCode($nameRepresentationCode);
        $insuranceCompanyName->setOrganisationIdentifier($organisationIdentifier);
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
    public function addFieldInsuredsGroupEmpID(
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
        $insuredsGroupEmpID = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->insuredsGroupEmpID[] = $insuredsGroupEmpID;
        $insuredsGroupEmpID->setIdNumber($idNumber);
        $insuredsGroupEmpID->setCheckDigit($checkDigit);
        $insuredsGroupEmpID->setCheckDigitScheme($checkDigitScheme);
        $insuredsGroupEmpID->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $insuredsGroupEmpID->setIdentifierTypeCode($identifierTypeCode);
        $insuredsGroupEmpID->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $insuredsGroupEmpID->setEffectiveDate($effectiveDate);
        $insuredsGroupEmpID->setExpirationDate($expirationDate);
        $insuredsGroupEmpID->setAssigningJurisdiction(
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
        $insuredsGroupEmpID->setAssigningAgency(
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
    public function addFieldInsuredsIDNumber(
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
        $insuredsIDNumber = $this
            ->dataTypeFactory
            ->create('CX', $this->characterEncoding)
        ;
        $this->insuredsIDNumber[] = $insuredsIDNumber;
        $insuredsIDNumber->setIdNumber($idNumber);
        $insuredsIDNumber->setCheckDigit($checkDigit);
        $insuredsIDNumber->setCheckDigitScheme($checkDigitScheme);
        $insuredsIDNumber->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $insuredsIDNumber->setIdentifierTypeCode($identifierTypeCode);
        $insuredsIDNumber->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $insuredsIDNumber->setEffectiveDate($effectiveDate);
        $insuredsIDNumber->setExpirationDate($expirationDate);
        $insuredsIDNumber->setAssigningJurisdiction(
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
        $insuredsIDNumber->setAssigningAgency(
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
    public function addFieldInsuredsGroupEmpName(
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
        $insuredsGroupEmpName = $this
            ->dataTypeFactory
            ->create('XON', $this->characterEncoding)
        ;
        $this->insuredsGroupEmpName[] = $insuredsGroupEmpName;
        $insuredsGroupEmpName->setOrganisationName($organisationName);
        $insuredsGroupEmpName->setOrganisationNameTypeCode($organisationNameTypeCode);
        $insuredsGroupEmpName->setIdNumber($idNumber);
        $insuredsGroupEmpName->setCheckDigit($checkDigit);
        $insuredsGroupEmpName->setCheckDigitScheme($checkDigitScheme);
        $insuredsGroupEmpName->setAssigningAuthority(
            $assigningAuthorityNamespaceId,
            $assigningAuthorityUniversalId,
            $assigningAuthorityUniversalIdType
        );
        $insuredsGroupEmpName->setIdentifierTypeCode($identifierTypeCode);
        $insuredsGroupEmpName->setAssigningFacility(
            $assigningFacilityNamespaceId,
            $assigningFacilityUniversalId,
            $assigningFacilityUniversalIdType
        );
        $insuredsGroupEmpName->setNameRepresentationCode($nameRepresentationCode);
        $insuredsGroupEmpName->setOrganisationIdentifier($organisationIdentifier);
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
    public function addFieldInsuranceCompanyAddress(
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
        $insuranceCompanyAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->characterEncoding)
        ;
        $this->insuranceCompanyAddress[] = $insuranceCompanyAddress;
        $insuranceCompanyAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $insuranceCompanyAddress->setOtherDesignation($otherDesignation);
        $insuranceCompanyAddress->setCity($city);
        $insuranceCompanyAddress->setStateOrProvince($stateOrProvince);
        $insuranceCompanyAddress->setZipOrPostalCode($zipOrPostalCode);
        $insuranceCompanyAddress->setCountry($country);
        $insuranceCompanyAddress->setAddressType($addressType);
        $insuranceCompanyAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $insuranceCompanyAddress->setCountyParishCode($countyParishCode);
        $insuranceCompanyAddress->setCensusTract($censusTract);
        $insuranceCompanyAddress->setAddressRepresentationCode($addressRepresentationCode);
        $insuranceCompanyAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $insuranceCompanyAddress->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $insuranceCompanyAddress->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
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
    public function addFieldInsuredsAddress(
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
        $insuredsAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->characterEncoding)
        ;
        $this->insuredsAddress[] = $insuredsAddress;
        $insuredsAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $insuredsAddress->setOtherDesignation($otherDesignation);
        $insuredsAddress->setCity($city);
        $insuredsAddress->setStateOrProvince($stateOrProvince);
        $insuredsAddress->setZipOrPostalCode($zipOrPostalCode);
        $insuredsAddress->setCountry($country);
        $insuredsAddress->setAddressType($addressType);
        $insuredsAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $insuredsAddress->setCountyParishCode($countyParishCode);
        $insuredsAddress->setCensusTract($censusTract);
        $insuredsAddress->setAddressRepresentationCode($addressRepresentationCode);
        $insuredsAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $insuredsAddress->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $insuredsAddress->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
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
    public function addFieldInsuredsEmployersAddress(
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
        $insuredsEmployersAddress = $this
            ->dataTypeFactory
            ->create('XAD', $this->characterEncoding)
        ;
        $this->insuredsEmployersAddress[] = $insuredsEmployersAddress;
        $insuredsEmployersAddress->setStreetAddress(
            $streetAddressStreetOrMailingAddress,
            $streetAddressStreetName,
            $streetAddressDwellingNumber
        );
        $insuredsEmployersAddress->setOtherDesignation($otherDesignation);
        $insuredsEmployersAddress->setCity($city);
        $insuredsEmployersAddress->setStateOrProvince($stateOrProvince);
        $insuredsEmployersAddress->setZipOrPostalCode($zipOrPostalCode);
        $insuredsEmployersAddress->setCountry($country);
        $insuredsEmployersAddress->setAddressType($addressType);
        $insuredsEmployersAddress->setOtherGeographicDesignation($otherGeographicDesignation);
        $insuredsEmployersAddress->setCountyParishCode($countyParishCode);
        $insuredsEmployersAddress->setCensusTract($censusTract);
        $insuredsEmployersAddress->setAddressRepresentationCode($addressRepresentationCode);
        $insuredsEmployersAddress->setAddressValidityRange(
            $addressValidityRangeRangeStartDateTimeTime,
            $addressValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $addressValidityRangeRangeEndDateTimeTime,
            $addressValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $insuredsEmployersAddress->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $insuredsEmployersAddress->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
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
    public function addFieldInsuranceCoContactPerson(
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
        $insuranceCoContactPerson = $this
            ->dataTypeFactory
            ->create('XPN', $this->characterEncoding)
        ;
        $this->insuranceCoContactPerson[] = $insuranceCoContactPerson;
        $insuranceCoContactPerson->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $insuranceCoContactPerson->setGivenName($givenName);
        $insuranceCoContactPerson->setSecondNames($secondNames);
        $insuranceCoContactPerson->setSuffix($suffix);
        $insuranceCoContactPerson->setPrefix($prefix);
        $insuranceCoContactPerson->setDegree($degree);
        $insuranceCoContactPerson->setNameTypeCode($nameTypeCode);
        $insuranceCoContactPerson->setNameRepresentationCode($nameRepresentationCode);
        $insuranceCoContactPerson->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $insuranceCoContactPerson->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $insuranceCoContactPerson->setNameAssemblyOrder($nameAssemblyOrder);
        $insuranceCoContactPerson->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $insuranceCoContactPerson->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $insuranceCoContactPerson->setProfessionalSuffix($professionalSuffix);
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
    public function addFieldNameOfInsured(
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
        $nameOfInsured = $this
            ->dataTypeFactory
            ->create('XPN', $this->characterEncoding)
        ;
        $this->nameOfInsured[] = $nameOfInsured;
        $nameOfInsured->setFamilyName(
            $familyNameSurname,
            $familyNameOwnSurnamePrefix,
            $familyNameOwnSurname,
            $familyNameSurnamePrefixFromPartner,
            $familyNameSurnameFromPartner
        );
        $nameOfInsured->setGivenName($givenName);
        $nameOfInsured->setSecondNames($secondNames);
        $nameOfInsured->setSuffix($suffix);
        $nameOfInsured->setPrefix($prefix);
        $nameOfInsured->setDegree($degree);
        $nameOfInsured->setNameTypeCode($nameTypeCode);
        $nameOfInsured->setNameRepresentationCode($nameRepresentationCode);
        $nameOfInsured->setNameContext(
            $nameContextIdentifier,
            $nameContextText,
            $nameContextNameOfCodingSystem,
            $nameContextAltIdentifier,
            $nameContextAltText,
            $nameContextNameOfAltCodingSystem
        );
        $nameOfInsured->setNameValidityRange(
            $nameValidityRangeRangeStartDateTimeTime,
            $nameValidityRangeRangeStartDateTimeDegreeOfPrecision,
            $nameValidityRangeRangeEndDateTimeTime,
            $nameValidityRangeRangeEndDateTimeDegreeOfPrecision
        );
        $nameOfInsured->setNameAssemblyOrder($nameAssemblyOrder);
        $nameOfInsured->setEffectiveDate($effectiveDateTime, $effectiveDateDegreeOfPrecision);
        $nameOfInsured->setExpirationDate($expirationDateTime, $expirationDateDegreeOfPrecision);
        $nameOfInsured->setProfessionalSuffix($professionalSuffix);
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
    public function addFieldInsuranceCoPhoneNumber(
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
        $insuranceCoPhoneNumber = $this
            ->dataTypeFactory
            ->create('XTN', $this->characterEncoding)
        ;
        $this->insuranceCoPhoneNumber[] = $insuranceCoPhoneNumber;
        $insuranceCoPhoneNumber->setTelephoneNumber($telephoneNumber);
        $insuranceCoPhoneNumber->setTelecommunicationUseCode($telecommunicationUseCode);
        $insuranceCoPhoneNumber->setTelepcommunicationEquipmentType($telepcommunicationEquipmentType);
        $insuranceCoPhoneNumber->setEmailAddress($emailAddress);
        $insuranceCoPhoneNumber->setCountryCode($countryCode);
        $insuranceCoPhoneNumber->setAreaCityCode($areaCityCode);
        $insuranceCoPhoneNumber->setLocalNumber($localNumber);
        $insuranceCoPhoneNumber->setExtension($extension);
        $insuranceCoPhoneNumber->setAnyText($anyText);
        $insuranceCoPhoneNumber->setExtensionPrefix($extensionPrefix);
        $insuranceCoPhoneNumber->setSpeedDialCode($speedDialCode);
        $insuranceCoPhoneNumber->setUnformattedTelephoneNumber($unformattedTelephoneNumber);
    }

    /**
     * @param string $value
     */
    public function setFieldPlanType($value)
    {
        $this->planType = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->planType->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldAssignmentOfBenefits($value)
    {
        $this->assignmentOfBenefits = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->assignmentOfBenefits->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldCoordinationOfBenefits($value)
    {
        $this->coordinationOfBenefits = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->coordinationOfBenefits->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldReleaseInformationCode($value)
    {
        $this->releaseInformationCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->releaseInformationCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldTypeOfAgreementCode($value)
    {
        $this->typeOfAgreementCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->typeOfAgreementCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldBillingStatus($value)
    {
        $this->billingStatus = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->billingStatus->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldLifetimeReserveDays($value)
    {
        $this->lifetimeReserveDays = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->lifetimeReserveDays->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDelayBeforeLRDay($value)
    {
        $this->delayBeforeLRDay = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->delayBeforeLRDay->setValue($value);
    }


    /**
     * @param string $value
     */
    public function setFieldCompanyPlanCode($value)
    {
        $this->companyPlanCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->companyPlanCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldInsuredsAdministrativeSex($value)
    {
        $this->insuredsAdministrativeSex = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->insuredsAdministrativeSex->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldPriorInsurancePlanID($value)
    {
        $this->priorInsurancePlanID = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->priorInsurancePlanID->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldCoverageType($value)
    {
        $this->coverageType = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->coverageType->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldHandicap($value)
    {
        $this->handicap = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->handicap->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldSiignatureCode($value)
    {
        $this->siignatureCode = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->siignatureCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldVIPIndicator($value)
    {
        $this->vIPIndicator = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->vIPIndicator->setValue($value);
    }


    /**
     * @param string $value
     */
    public function setFieldPlanEffectiveDate($value)
    {
        $this->planEffectiveDate = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
        ;
        $this->planEffectiveDate->setValue($value);
    }


    /**
     * @param string $value
     */
    public function setFieldPlanExpirationDate($value)
    {
        $this->planExpirationDate = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
        ;
        $this->planExpirationDate->setValue($value);
    }

    /**
     * @param string $authorizationNumber
     * @param string $date
     * @param string $source
     */
    public function setFieldAuthorizationInformation(
        $authorizationNumber = null,
        $date = null,
        $source = null
    ) {
        $this->authorizationInformation = $this
            ->dataTypeFactory
            ->create('AUI', $this->characterEncoding)
        ;
        $this->authorizationInformation->setAuthorizationNumber($authorizationNumber);
        $this->authorizationInformation->setDate($date);
        $this->authorizationInformation->setSource($source);
    }


    /**
     * @param string $value
     */
    public function setFieldNoticeOfAdmissionDate($value)
    {
        $this->noticeOfAdmissionDate = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
        ;
        $this->noticeOfAdmissionDate->setValue($value);
    }


    /**
     * @param string $value
     */
    public function setFieldReportOfEligibilityDate($value)
    {
        $this->reportOfEligibilityDate = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
        ;
        $this->reportOfEligibilityDate->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldSignatureCodeDate($value)
    {
        $this->signatureCodeDate = $this
            ->dataTypeFactory
            ->create('DT', $this->characterEncoding)
        ;
        $this->signatureCodeDate->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldGroupNumber($value)
    {
        $this->groupNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->groupNumber->setValue($value);
    }


    /**
     * @param string $value
     */
    public function setFieldCoordOfBenPriority($value)
    {
        $this->coordOfBenPriority = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->coordOfBenPriority->setValue($value);
    }


    /**
     * @param string $value
     */
    public function setFieldPre_AdmitCert($value)
    {
        $this->pre_AdmitCert = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->pre_AdmitCert->setValue($value);
    }


    /**
     * @param string $value
     */
    public function setFieldPolicyNumber($value)
    {
        $this->policyNumber = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->policyNumber->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldVerificationStatus($value)
    {
        $this->verificationStatus = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->verificationStatus->setValue($value);
    }


    /**
     * @param string $value
     */
    public function setFieldInsured_sBirthPlace($value)
    {
        $this->insured_sBirthPlace = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->insured_sBirthPlace->setValue($value);
    }


    /**
     * @return \Hl7v2\DataType\SiDataType
     */
    public function getSetIDIN1()
    {
        return $this->setID_IN1;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getInsurancePlanID()
    {
        return $this->insurancePlanID;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType[]
     */
    public function getInsuranceCompanyID()
    {
        return $this->insuranceCompanyID;
    }

    /**
     * @return \Hl7v2\DataType\XonDataType[]
     */
    public function getInsuranceCompanyName()
    {
        return $this->insuranceCompanyName;
    }

    /**
     * @return \Hl7v2\DataType\XadDataType[]
     */
    public function getInsuranceCompanyAddress()
    {
        return $this->insuranceCompanyAddress;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getInsuranceCoContactPerson()
    {
        return $this->insuranceCoContactPerson;
    }

    /**
     * @return \Hl7v2\DataType\XtnDataType[]
     */
    public function getInsuranceCoPhoneNumber()
    {
        return $this->insuranceCoPhoneNumber;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    /**
     * @return \Hl7v2\DataType\XonDataType[]
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType[]
     */
    public function getInsuredsGroupEmpID()
    {
        return $this->insuredsGroupEmpID;
    }

    /**
     * @return \Hl7v2\DataType\XonDataType[]
     */
    public function getInsuredsGroupEmpName()
    {
        return $this->insuredsGroupEmpName;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getPlanEffectiveDate()
    {
        return $this->planEffectiveDate;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getPlanExpirationDate()
    {
        return $this->planExpirationDate;
    }

    /**
     * @return \Hl7v2\DataType\AuiDataType
     */
    public function getAuthorizationInformation()
    {
        return $this->authorizationInformation;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getPlanType()
    {
        return $this->planType;
    }

    /**
     * @return \Hl7v2\DataType\XpnDataType[]
     */
    public function getNameOfInsured()
    {
        return $this->nameOfInsured;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getInsuredsRelationshipToPatient()
    {
        return $this->insuredsRelationshipToPatient;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getInsuredsDateOfBirth()
    {
        return $this->insuredsDateOfBirth;
    }

    /**
     * @return \Hl7v2\DataType\XadDataType[]
     */
    public function getInsuredsAddress()
    {
        return $this->insuredsAddress;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getAssignmentOfBenefits()
    {
        return $this->assignmentOfBenefits;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getCoordinationOfBenefits()
    {
        return $this->coordinationOfBenefits;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getCoordOfBenPriority()
    {
        return $this->coordOfBenPriority;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getNoticeOfAdmissionFlag()
    {
        return $this->noticeOfAdmissionFlag;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getNoticeOfAdmissionDate()
    {
        return $this->noticeOfAdmissionDate;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getReportOfEligibilityFlag()
    {
        return $this->reportOfEligibilityFlag;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getReportOfEligibilityDate()
    {
        return $this->reportOfEligibilityDate;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getReleaseInformationCode()
    {
        return $this->releaseInformationCode;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getPreAdmitCert()
    {
        return $this->pre_AdmitCert;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getVerificationDateTime()
    {
        return $this->verificationDate_Time;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getVerificationBy()
    {
        return $this->verificationBy;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getTypeOfAgreementCode()
    {
        return $this->typeOfAgreementCode;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getBillingStatus()
    {
        return $this->billingStatus;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getLifetimeReserveDays()
    {
        return $this->lifetimeReserveDays;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getDelayBeforeLRDay()
    {
        return $this->delayBeforeLRDay;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getCompanyPlanCode()
    {
        return $this->companyPlanCode;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getPolicyNumber()
    {
        return $this->policyNumber;
    }

    /**
     * @return \Hl7v2\DataType\CpDataType
     */
    public function getPolicyDeductible()
    {
        return $this->policyDeductible;
    }

    /**
     * @return \Hl7v2\DataType\CpDataType
     */
    public function getPolicyLimitAmount()
    {
        return $this->policyLimit_Amount;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getPolicyLimitDays()
    {
        return $this->policyLimit_Days;
    }

    /**
     * @return \Hl7v2\DataType\CpDataType
     */
    public function getRoomRateSemiPrivate()
    {
        return $this->roomRate_Semi_Private;
    }

    /**
     * @return \Hl7v2\DataType\CpDataType
     */
    public function getRoomRatePrivate()
    {
        return $this->roomRate_Private;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getInsuredsEmploymentStatus()
    {
        return $this->insuredsEmploymentStatus;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getInsuredsAdministrativeSex()
    {
        return $this->insuredsAdministrativeSex;
    }

    /**
     * @return \Hl7v2\DataType\XadDataType[]
     */
    public function getInsuredsEmployersAddress()
    {
        return $this->insuredsEmployersAddress;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getVerificationStatus()
    {
        return $this->verificationStatus;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getPriorInsurancePlanID()
    {
        return $this->priorInsurancePlanID;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getCoverageType()
    {
        return $this->coverageType;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getHandicap()
    {
        return $this->handicap;
    }

    /**
     * @return \Hl7v2\DataType\CxDataType[]
     */
    public function getInsuredsIDNumber()
    {
        return $this->insuredsIDNumber;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getSiignatureCode()
    {
        return $this->siignatureCode;
    }

    /**
     * @return \Hl7v2\DataType\DtDataType
     */
    public function getSignatureCodeDate()
    {
        return $this->signatureCodeDate;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getInsuredSBirthPlace()
    {
        return $this->insured_sBirthPlace;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getVIPIndicator()
    {
        return $this->vIPIndicator;
    }
    
    

}
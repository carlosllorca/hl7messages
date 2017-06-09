<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 6/1/2017
 * Time: 12:15 PM
 */

namespace Hl7v2\Segment;


use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;

class Dg1Segment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\SiDataType
     */
    public $SetID_DG1;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $DiagnosisCodingMethod = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $DiagnosisCode_DG1 = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $DiagnosisDescription = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $DiagnosisDateTime = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $DiagnosisType;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $MajorDiagnosticCategory = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $DiagnosticRelatedGroup = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $DRGApprovalIndicator = null;
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $DRGGrouperReviewCode = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $OutlierType = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $OutlierDays = null;
    /**
     * @var \Hl7v2\DataType\CpDataType
     */
    public $OutlierCost = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $GrouperVersionAndType = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $DiagnosisPriority = null;
    /**
     * @var \Hl7v2\DataType\XcnDataType[]
     */
    public $DiagnosingClinician = [];
    /**
     * @var \Hl7v2\DataType\IsDataType
     */
    public $DiagnosisClassification = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $ConfidentialIndicator = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $AttestationDateTime = null;
    /**
     * @var \Hl7v2\DataType\EipDataType
     */
    public $DiagnosisIdentifier = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $DiagnosisActionCode = null;


    /*** Crea la class dado el mensaje creado en el Datagram y return datagram***/
    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // DG1.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetID_DG1', 4, $datagram->getPositionalState());
        $this->setFieldSetID_DG1($codec->extractComponent($datagram));

        // DG1.2
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DiagnosisCodingMethod', 2, $datagram->getPositionalState());
        $this->setFieldDiagnosisCodingMethod($codec->extractComponent($datagram));

        // DG1.3
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DiagnosisCode_DG1', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDiagnosisCode_DG1(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // DG1.4
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DiagnosisDescription', 40, $datagram->getPositionalState());
        $this->setFieldDiagnosisDescription($codec->extractComponent($datagram));

        // DG1.5
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DiagnosisDateTime', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDiagnosisDateTime(
            $time,
            $degreeOfPrecision
        );

        // DG1.6
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('DiagnosisType', 2, $datagram->getPositionalState());
        $this->setFieldDiagnosisType($codec->extractComponent($datagram));


    }

    /**
     * @param string $value
     */
    public function setFieldSetID_DG1($value)
    {
        $this->SetID_DG1 = $this
            ->dataTypeFactory
            ->create('SI', $this->characterEncoding)
        ;
        $this->SetID_DG1->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldDiagnosisCodingMethod($value)
    {
        $this->DiagnosisCodingMethod = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->DiagnosisCodingMethod->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldDiagnosisCode_DG1(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->DiagnosisCode_DG1 = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->DiagnosisCode_DG1->setIdentifier($identifier);
        $this->DiagnosisCode_DG1->setText($text);
        $this->DiagnosisCode_DG1->setNameOfCodingSystem($nameOfCodingSystem);
        $this->DiagnosisCode_DG1->setAltIdentifier($altIdentifier);
        $this->DiagnosisCode_DG1->setAltText($altText);
        $this->DiagnosisCode_DG1->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldDiagnosisDescription($value)
    {
        $this->DiagnosisDescription = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->DiagnosisDescription->setValue($value);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDiagnosisDateTime($time, $degreeOfPrecision = null)
    {
        $this->DiagnosisDateTime = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->DiagnosisDateTime->setTime($time);
        $this->DiagnosisDateTime->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldDiagnosisType($value)
    {
        $this->DiagnosisType = $this
            ->dataTypeFactory
            ->create('IS', $this->characterEncoding)
        ;
        $this->DiagnosisType->setValue($value);
    }

    /**
     * @return \Hl7v2\DataType\SiDataType
     */
    public function getSetIDDG1()
    {
        return $this->SetID_DG1;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getDiagnosisCodingMethod()
    {
        return $this->DiagnosisCodingMethod;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getDiagnosisCodeDG1()
    {
        return $this->DiagnosisCode_DG1;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getDiagnosisDescription()
    {
        return $this->DiagnosisDescription;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getDiagnosisDateTime()
    {
        return $this->DiagnosisDateTime;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getDiagnosisType()
    {
        return $this->DiagnosisType;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getMajorDiagnosticCategory()
    {
        return $this->MajorDiagnosticCategory;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getDiagnosticRelatedGroup()
    {
        return $this->DiagnosticRelatedGroup;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getDRGApprovalIndicator()
    {
        return $this->DRGApprovalIndicator;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getDRGGrouperReviewCode()
    {
        return $this->DRGGrouperReviewCode;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getOutlierType()
    {
        return $this->OutlierType;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getOutlierDays()
    {
        return $this->OutlierDays;
    }

    /**
     * @return \Hl7v2\DataType\CpDataType
     */
    public function getOutlierCost()
    {
        return $this->OutlierCost;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getGrouperVersionAndType()
    {
        return $this->GrouperVersionAndType;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getDiagnosisPriority()
    {
        return $this->DiagnosisPriority;
    }

    /**
     * @return \Hl7v2\DataType\XcnDataType[]
     */
    public function getDiagnosingClinician()
    {
        return $this->DiagnosingClinician;
    }

    /**
     * @return \Hl7v2\DataType\IsDataType
     */
    public function getDiagnosisClassification()
    {
        return $this->DiagnosisClassification;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getConfidentialIndicator()
    {
        return $this->ConfidentialIndicator;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getAttestationDateTime()
    {
        return $this->AttestationDateTime;
    }

    /**
     * @return \Hl7v2\DataType\EipDataType
     */
    public function getDiagnosisIdentifier()
    {
        return $this->DiagnosisIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getDiagnosisActionCode()
    {
        return $this->DiagnosisActionCode;
    }

    
}
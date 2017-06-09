<?php

namespace Hl7v2\Segment;

use Hl7v2\Encoding\Datagram;
use Hl7v2\Encoding\Codec;
use Hl7v2\Exception\SegmentError;

/**
 * Message Header (MSH).
 *The MSH segment defines the intent, source, destination, and some specifics of the syntax of a message.
 */
class MshSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $fieldSeparator;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $encodingCharacters;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    public $sendingApplication = null;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    public $sendingFacility = null;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    public $receivingApplication = null;
    /**
     * @var \Hl7v2\DataType\HdDataType
     */
    public $receivingFacility = null;
    /**
     * @var \Hl7v2\DataType\TsDataType
     */
    public $dateTimeOfMessage;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $security = null;
    /**
     * @var \Hl7v2\DataType\MsgDataType
     */
    public $messageType;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $messageControlId;
    /**
     * @var \Hl7v2\DataType\PtDataType
     */
    public $processingId;
    /**
     * @var \Hl7v2\DataType\VidDataType
     */
    public $versionId;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $sequenceNumber = null;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $continuationPointer = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $acceptAcknowledgmentType = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $applicationAcknowledgmentType = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $countryCode = null;
    /**
     * @var \Hl7v2\DataType\IdDataType[]
     */
    public $characterSet = [];
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $principalLanguageOfMessage = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $altCharacterSetHandlingScheme = null;
    /**
     * @var \Hl7v2\DataType\EiDataType[]
     */
    public $messageProfileIdentifier = [];

    /**
     * @param string $value
     */
    public function setFieldFieldSeparator($value)
    {
        $this->fieldSeparator = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->fieldSeparator->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldEncodingCharacters($value)
    {
        $this->encodingCharacters = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->encodingCharacters->setValue($value);
    }

    /**
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldSendingApplication($namespaceId, $universalId, $universalIdType)
    {
        $this->sendingApplication = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->sendingApplication->setNamespaceId($namespaceId);
        $this->sendingApplication->setUniversalId($universalId, $universalIdType);
    }

    /**
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldSendingFacility($namespaceId, $universalId, $universalIdType)
    {
        $this->sendingFacility = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->sendingFacility->setNamespaceId($namespaceId);
        $this->sendingFacility->setUniversalId($universalId, $universalIdType);
    }

    /**
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldReceivingApplication($namespaceId, $universalId, $universalIdType)
    {
        $this->receivingApplication = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->receivingApplication->setNamespaceId($namespaceId);
        $this->receivingApplication->setUniversalId($universalId, $universalIdType);
    }

    /**
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function setFieldReceivingFacility($namespaceId, $universalId, $universalIdType)
    {
        $this->receivingFacility = $this
            ->dataTypeFactory
            ->create('HD', $this->characterEncoding)
        ;
        $this->receivingFacility->setNamespaceId($namespaceId);
        $this->receivingFacility->setUniversalId($universalId, $universalIdType);
    }

    /**
     * @param string $time
     * @param string $degreeOfPrecision
     */
    public function setFieldDateTimeOfMessage($time, $degreeOfPrecision = null)
    {
        $this->dateTimeOfMessage = $this
            ->dataTypeFactory
            ->create('TS', $this->characterEncoding)
        ;
        $this->dateTimeOfMessage->setTime($time);
        $this->dateTimeOfMessage->setDegreeOfPrecision($degreeOfPrecision);
    }

    /**
     * @param string $value
     */
    public function setFieldSecurity($value)
    {
        $this->security = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->security->setValue($value);
    }

    /**
     * @param string $messageCode
     * @param string $triggerEvent
     * @param string $messageStructure
     */
    public function setFieldMessageType($messageCode, $triggerEvent, $messageStructure)
    {
        $this->messageType = $this
            ->dataTypeFactory
            ->create('MSG', $this->characterEncoding)
        ;
        $this->messageType->setMessageCode($messageCode);
        $this->messageType->setTriggerEvent($triggerEvent);
        $this->messageType->setMessageStructure($messageStructure);
    }

    /**
     * @param string $value
     */
    public function setFieldMessageControlId($value)
    {
        $this->messageControlId = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->messageControlId->setValue($value);
    }

    /**
     * @param string $processingId
     * @param string $processingMode
     */
    public function setFieldProcessingId($processingId = null, $processingMode = null)
    {
        $this->processingId = $this
            ->dataTypeFactory
            ->create('PT', $this->characterEncoding)
        ;
        $this->processingId->setProcessingId($processingId);
        $this->processingId->setProcessingMode($processingMode);
    }

    /**
     * @param string $versionId
     * @param string $internationalisationCodeIdentifier
     * @param string $internationalisationCodeText
     * @param string $internationalisationCodeNameOfCodingSystem
     * @param string $internationalisationCodeAltIdentifier
     * @param string $internationalisationCodeAltText
     * @param string $internationalisationCodeNameOfAltCodingSystem
     * @param string $internationalisationVersionIdIdentifier
     * @param string $internationalisationVersionIdText
     * @param string $internationalisationVersionIdNameOfCodingSystem
     * @param string $internationalisationVersionIdAltIdentifier
     * @param string $internationalisationVersionIdAltText
     * @param string $internationalisationVersionIdNameOfAltCodingSystem
     */
    public function setFieldVersionId(
        $versionId = null,
        $internationalisationCodeIdentifier = null,
        $internationalisationCodeText = null,
        $internationalisationCodeNameOfCodingSystem = null,
        $internationalisationCodeAltIdentifier = null,
        $internationalisationCodeAltText = null,
        $internationalisationCodeNameOfAltCodingSystem = null,
        $internationalisationVersionIdIdentifier = null,
        $internationalisationVersionIdText = null,
        $internationalisationVersionIdNameOfCodingSystem = null,
        $internationalisationVersionIdAltIdentifier = null,
        $internationalisationVersionIdAltText = null,
        $internationalisationVersionIdNameOfAltCodingSystem = null
    ) {
        $this->versionId = $this
            ->dataTypeFactory
            ->create('VID', $this->characterEncoding)
        ;
        $this->versionId->setVersionId($versionId);
        $this->versionId->setInternationalisationCode(
            $internationalisationCodeIdentifier,
            $internationalisationCodeText,
            $internationalisationCodeNameOfCodingSystem,
            $internationalisationCodeAltIdentifier,
            $internationalisationCodeAltText,
            $internationalisationCodeNameOfAltCodingSystem
        );
        $this->versionId->setInternationalisationVersionId(
            $internationalisationVersionIdIdentifier,
            $internationalisationVersionIdText,
            $internationalisationVersionIdNameOfCodingSystem,
            $internationalisationVersionIdAltIdentifier,
            $internationalisationVersionIdAltText,
            $internationalisationVersionIdNameOfAltCodingSystem
        );
    }

    /**
     * @param string $value
     */
    public function setFieldSequenceNumber($value)
    {
        $this->sequenceNumber = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->sequenceNumber->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldContinuationPointer($value)
    {
        $this->continuationPointer = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->continuationPointer->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldAcceptAcknowledgmentType($value)
    {
        $this->acceptAcknowledgmentType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->acceptAcknowledgmentType->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldApplicationAcknowledgmentType($value)
    {
        $this->applicationAcknowledgmentType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->applicationAcknowledgmentType->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldCountryCode($value)
    {
        $this->countryCode = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->countryCode->setValue($value);
    }

    /**
     * @param string $value
     */
    public function addFieldCharacterSet($value)
    {
        $characterSet = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $characterSet->setValue($value);
        $this->characterSet[] = $characterSet;
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldPrincipalLanguageOfMessage(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->principalLanguageOfMessage = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->principalLanguageOfMessage->setIdentifier($identifier);
        $this->principalLanguageOfMessage->setText($text);
        $this->principalLanguageOfMessage->setNameOfCodingSystem($nameOfCodingSystem);
        $this->principalLanguageOfMessage->setAltIdentifier($altIdentifier);
        $this->principalLanguageOfMessage->setAltText($altText);
        $this->principalLanguageOfMessage->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @param string $value
     */
    public function setFieldAltCharacterSetHandlingScheme($value)
    {
        $this->altCharacterSetHandlingScheme = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->altCharacterSetHandlingScheme->setValue($value);
    }

    /**
     * @param string $entityIdentifier
     * @param string $namespaceId
     * @param string $universalId
     * @param string $universalIdType
     */
    public function addFieldMessageProfileIdentifier(
        $entityIdentifier = null,
        $namespaceId = null,
        $universalId = null,
        $universalIdType = null
    ) {
        $messageProfileIdentifier = $this
            ->dataTypeFactory
            ->create('EI', $this->characterEncoding)
        ;
        $this->messageProfileIdentifier[] = $messageProfileIdentifier;
        $messageProfileIdentifier->setEntityIdentifier($entityIdentifier);
        $messageProfileIdentifier->setNamespaceId($namespaceId);
        $messageProfileIdentifier->setUniversalId($universalId);
        $messageProfileIdentifier->setUniversalIdType($universalIdType);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldFieldSeparator()
    {
        return $this->fieldSeparator;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldEncodingCharacters()
    {
        return $this->encodingCharacters;
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getFieldSendingApplication()
    {
        return $this->sendingApplication;
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getFieldSendingFacility()
    {
        return $this->sendingFacility;
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getFieldReceivingApplication()
    {
        return $this->receivingApplication;
    }

    /**
     * @return \Hl7v2\DataType\HdDataType
     */
    public function getFieldReceivingFacility()
    {
        return $this->receivingFacility;
    }

    /**
     * @return \Hl7v2\DataType\TsDataType
     */
    public function getFieldDateTimeOfMessage()
    {
        return $this->dateTimeOfMessage;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldSecurity()
    {
        return $this->security;
    }

    /**
     * @return \Hl7v2\DataType\MsgDataType
     */
    public function getFieldMessageType()
    {
        return $this->messageType;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldMessageControlId()
    {
        return $this->messageControlId;
    }

    /**
     * @return \Hl7v2\DataType\PtDataType
     */
    public function getFieldProcessingId()
    {
        return $this->processingId;
    }

    /**
     * @return \Hl7v2\DataType\VidDataType
     */
    public function getFieldVersionId()
    {
        return $this->versionId;
    }

    /**
     * @return \Hl7v2\DataType\NmDataType
     */
    public function getFieldSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getFieldContinuationPointer()
    {
        return $this->continuationPointer;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldAcceptAcknowledgmentType()
    {
        return $this->acceptAcknowledgmentType;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldApplicationAcknowledgmentType()
    {
        return $this->applicationAcknowledgmentType;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType[]
     */
    public function getFieldCharacterSet()
    {
        return $this->characterSet;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getFieldPrincipalLanguageOfMessage()
    {
        return $this->principalLanguageOfMessage;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getFieldAltCharacterSetHandlingScheme()
    {
        return $this->altCharacterSetHandlingScheme;
    }

    /**
     * @return \Hl7v2\DataType\EiDataType[]
     */
    public function getFieldMessageProfileIdentifier()
    {
        return $this->messageProfileIdentifier;
    }

    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // MSH.1
        $encodingParams = $datagram->getEncodingParameters();
        $this->setFieldFieldSeparator($encodingParams->getFieldSep());

        // MSH.2
        $codec->advanceToField($datagram);
        $this->setFieldEncodingCharacters(
            $encodingParams->getComponentSep()
            . $encodingParams->getRepetitionSep()
            . $encodingParams->getEscapeChar()
            . $encodingParams->getSubcomponentSep()
        );

        // MSH.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SendingApplication', 227, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSendingApplication(
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // MSH.4
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SendingFacility', 227, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldSendingFacility(
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // MSH.5
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ReceivingApplication', 227, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldReceivingApplication(
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // MSH.6
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ReceivingFacility', 227, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $namespaceId,
            $universalId,
            $universalIdType,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldReceivingFacility(
            $namespaceId,
            $universalId,
            $universalIdType
        );

        // MSH.7
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('DateTimeOfMessage', 26, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $time,
            $degreeOfPrecision,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldDateTimeOfMessage(
            $time,
            $degreeOfPrecision
        );

        // MSH.8
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('Security', 40, $datagram->getPositionalState());
        $this->setFieldSecurity($codec->extractComponent($datagram));

        // MSH.9
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('MessageType', 15, $datagram->getPositionalState());
        $sequence = [1,1,1];
        list(
            $messageCode,
            $triggerEvent,
            $messageStructure,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldMessageType(
            $messageCode,
            $triggerEvent,
            $messageStructure
        );

        // MSH.10
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('MessageControlId', 20, $datagram->getPositionalState());
        $this->setFieldMessageControlId($codec->extractComponent($datagram));

        // MSH.11
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('ProcessingId', 3, $datagram->getPositionalState());
        $sequence = [1,1];
        list(
            $processingId,
            $processingMode,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldProcessingId(
            $processingId,
            $processingMode
        );

        // MSH.12
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'MSH Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('VersionId', 60, $datagram->getPositionalState());
        $sequence = [1,[1,1,1,1,1,1],[1,1,1,1,1,1]];
        list(
            $versionId,
            list(
                $internationalisationCodeIdentifier,
                $internationalisationCodeText,
                $internationalisationCodeNameOfCodingSystem,
                $internationalisationCodeAltIdentifier,
                $internationalisationCodeAltText,
                $internationalisationCodeNameOfAltCodingSystem,
            ),
            list(
                $internationalisationVersionIdIdentifier,
                $internationalisationVersionIdText,
                $internationalisationVersionIdNameOfCodingSystem,
                $internationalisationVersionIdAltIdentifier,
                $internationalisationVersionIdAltText,
                $internationalisationVersionIdNameOfAltCodingSystem,
            ),
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldVersionId(
            $versionId,
            $internationalisationCodeIdentifier,
            $internationalisationCodeText,
            $internationalisationCodeNameOfCodingSystem,
            $internationalisationCodeAltIdentifier,
            $internationalisationCodeAltText,
            $internationalisationCodeNameOfAltCodingSystem,
            $internationalisationVersionIdIdentifier,
            $internationalisationVersionIdText,
            $internationalisationVersionIdNameOfCodingSystem,
            $internationalisationVersionIdAltIdentifier,
            $internationalisationVersionIdAltText,
            $internationalisationVersionIdNameOfAltCodingSystem
        );

        // MSH.13
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SequenceNumber', 15, $datagram->getPositionalState());
        $this->setFieldSequenceNumber($codec->extractComponent($datagram));

        // MSH.14
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ContinuationPointer', 180, $datagram->getPositionalState());
        $this->setFieldContinuationPointer($codec->extractComponent($datagram));

        // MSH.15
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AcceptAcknowledgmentType', 2, $datagram->getPositionalState());
        $this->setFieldAcceptAcknowledgmentType($codec->extractComponent($datagram));

        // MSH.16
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('ApplicationAcknowledgmentType', 2, $datagram->getPositionalState());
        $this->setFieldApplicationAcknowledgmentType($codec->extractComponent($datagram));

        // MSH.17
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CountryCode', 3, $datagram->getPositionalState());
        $this->setFieldCountryCode($codec->extractComponent($datagram));

        // MSH.18
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('CharacterSet', 16, $datagram->getPositionalState());
            $repetitions[] = $this->extractComponents($datagram, $codec, [1]);
            $first = false;
        }
        foreach ($repetitions as list($value,)) {
            $this->addFieldCharacterSet($value);
        }

        // MSH.19
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('PrincipalLanguageOfMessage', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
        ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldPrincipalLanguageOfMessage(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );

        // MSH.20
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('AltCharacterSetHandlingScheme', 20, $datagram->getPositionalState());
        $this->setFieldAltCharacterSetHandlingScheme($codec->extractComponent($datagram));

        // MSH.21
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $sequence = [1,1,1,1];
        $repetitions = [];
        $first = true;
        while ($first || false !== $codec->advanceToRepetition($datagram)) {
            $this->checkRepetitionLength('MessageProfileIdentifier', 427, $datagram->getPositionalState());
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
            $this->addFieldMessageProfileIdentifier(
                $entityIdentifier,
                $namespaceId,
                $universalId,
                $universalIdType
            );
        }
    }


}

<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/24/2017
 * Time: 4:18 PM
 */

namespace Hl7v2\DataType;

/**
 * Class CneDataType
 * @package Hl7v2\DataType
 * CNE: Coded with No Exceptions
 */
class CneDataType extends ComponentDataType
{
    const MAX_LEN = 705;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $identifier;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $text;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $nameOfCodingSystem;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $altIdentifier;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $altText;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $nameOfAltCodingSystem;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $codingSystemVersionId = null;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $alternateCodingSystemVersionId = null;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $originalText = null;

    /**
     * @param string $identifier
     */
    public function setIdentifier($identifier = null)
    {
        $this->identifier = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->identifier->setValue($identifier);
    }

    /**
     * @param string $text
     */
    public function setText($text = null)
    {
        $this->text = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->text->setValue($text);
    }

    /**
     * @param string $nameOfCodingSystem
     */
    public function setNameOfCodingSystem($nameOfCodingSystem = null)
    {
        $this->nameOfCodingSystem = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->nameOfCodingSystem->setValue($nameOfCodingSystem);
    }

    /**
     * @param string $altIdentifier
     */
    public function setAltIdentifier($altIdentifier = null)
    {
        $this->altIdentifier = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->altIdentifier->setValue($altIdentifier);
    }

    /**
     * @param string $altText
     */
    public function setAltText($altText = null)
    {
        $this->altText = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->altText->setValue($altText);
    }

    /**
     * @param string $nameOfAltCodingSystem
     */
    public function setNameOfAltCodingSystem($nameOfAltCodingSystem = null)
    {
        $this->nameOfAltCodingSystem = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->nameOfAltCodingSystem->setValue($nameOfAltCodingSystem);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getNameOfCodingSystem()
    {
        return $this->nameOfCodingSystem;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getAltIdentifier()
    {
        return $this->altIdentifier;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getAltText()
    {
        return $this->altText;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getNameOfAltCodingSystem()
    {
        return $this->nameOfAltCodingSystem;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getCodingSystemVersionId()
    {
        return $this->codingSystemVersionId;
    }

    /**
     * @param string $codingSystemVersionId
     */
    public function setCodingSystemVersionId($codingSystemVersionId = null)
    {
        $this->codingSystemVersionId = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->codingSystemVersionId->setValue($codingSystemVersionId);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getAlternateCodingSystemVersionId()
    {
        return $this->alternateCodingSystemVersionId;
    }

    /**
     * @param string $alternateCodingSystemVersionId
     */
    public function setAlternateCodingSystemVersionId($alternateCodingSystemVersionId)
    {
        $this->alternateCodingSystemVersionId = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->alternateCodingSystemVersionId->setValue($alternateCodingSystemVersionId);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOriginalText()
    {
        return $this->originalText;
    }

    /**
     * @param string $originalText
     */
    public function setOriginalText($originalText)
    {
        $this->originalText = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->originalText->setValue($originalText);
    }


}
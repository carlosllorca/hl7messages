<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/26/2017
 * Time: 10:37 AM
 */

namespace Hl7v2\DataType;


class CpDataType extends ComponentDataType
{
    const MAX_LEN = 550;

    /**
     * @var \Hl7v2\DataType\MoDataType
     */
    public $price = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $priceType = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $fromValue = null;
    /**
     * @var \Hl7v2\DataType\NmDataType
     */
    public $toValue = null;
    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $rangeUnits = null;
    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $rangeType = null;

    /**
     * @param string $quantity
     * @param string $denomination
     */
    public function setPrice($quantity = null, $denomination = null)
    {
        $this->price = $this
            ->dataTypeFactory
            ->create('MO', $this->characterEncoding)
        ;
        $this->price->setQuantity($quantity);
        $this->price->setDenomination($denomination);
    }

    /**
     * @param string $priceType
     */
    public function setPriceType($priceType = null)
    {
        $this->priceType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->priceType->setValue($priceType);
    }

    /**
     * @param string $fromValue
     */
    public function setFromValue($fromValue = null)
    {
        $this->fromValue = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->fromValue->setValue($fromValue);
    }

    /**
     * @param string $toValue
     */
    public function setToValue($toValue = null)
    {
        $this->toValue = $this
            ->dataTypeFactory
            ->create('NM', $this->characterEncoding)
        ;
        $this->toValue->setValue($toValue);
    }

    /**
     * @param string $rangeUnitsIdentifier
     * @param string $rangeUnitsText
     * @param string $rangeUnitsNameOfCodingSystem
     * @param string $rangeUnitsAltIdentifier
     * @param string $rangeUnitsAltText
     * @param string $rangeUnitsNameOfAltCodingSystem
     */
    public function setRangeUnits(
        $rangeUnitsIdentifier = null,
        $rangeUnitsText = null,
        $rangeUnitsNameOfCodingSystem = null,
        $rangeUnitsAltIdentifier = null,
        $rangeUnitsAltText = null,
        $rangeUnitsNameOfAltCodingSystem = null
    ) {
        $this->rangeUnits = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->rangeUnits->setIdentifier($rangeUnitsIdentifier);
        $this->rangeUnits->setText($rangeUnitsText);
        $this->rangeUnits->setNameOfCodingSystem($rangeUnitsNameOfCodingSystem);
        $this->rangeUnits->setAltIdentifier($rangeUnitsAltIdentifier);
        $this->rangeUnits->setAltText($rangeUnitsAltText);
        $this->rangeUnits->setNameOfAltCodingSystem($rangeUnitsNameOfAltCodingSystem);
    }


    /**
     * @param string $rangeType
     */
    public function setRangeType($rangeType = null)
    {
        $this->rangeType = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->rangeType->setValue($rangeType);
    }


    /**
     * @return MoDataType
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return IdDataType
     */
    public function getPriceType()
    {
        return $this->priceType;
    }

    /**
     * @return NmDataType
     */
    public function getFromValue()
    {
        return $this->fromValue;
    }

    /**
     * @return NmDataType
     */
    public function getToValue()    {
        return $this->toValue;
    }

    /**
     * @return CeDataType
     */
    public function getRangeUnits()
    {
        return $this->rangeUnits;
    }

    /**
     * @return IdDataType
     */
    public function getRangeType()
    {
        return $this->rangeType;
    }




}
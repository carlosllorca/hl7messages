<?php

namespace Hl7v2\DataType;

/**
 * Family Name (FN).
 */
class FnDataType extends ComponentDataType
{
    const MAX_LEN = 194;

    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $surname;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $ownSurnamePrefix;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $ownSurname;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $surnamePrefixFromPartner;
    /**
     * @var \Hl7v2\DataType\StDataType
     */
    public $surnameFromPartner;

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->surname->setValue($surname);
    }

    /**
     * @param string $ownSurnamePrefix
     */
    public function setOwnSurnamePrefix($ownSurnamePrefix = null)
    {
        $this->ownSurnamePrefix = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->ownSurnamePrefix->setValue($ownSurnamePrefix);
    }

    /**
     * @param string $ownSurname
     */
    public function setOwnSurname($ownSurname = null)
    {
        $this->ownSurname = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->ownSurname->setValue($ownSurname);
    }

    /**
     * @param string $surnamePrefixFromPartner
     */
    public function setSurnamePrefixFromPartner($surnamePrefixFromPartner = null)
    {
        $this->surnamePrefixFromPartner = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->surnamePrefixFromPartner->setValue($surnamePrefixFromPartner);
    }

    /**
     * @param string $surnameFromPartner
     */
    public function setSurnameFromPartner($surnameFromPartner = null)
    {
        $this->surnameFromPartner = $this
            ->dataTypeFactory
            ->create('ST', $this->characterEncoding)
        ;
        $this->surnameFromPartner->setValue($surnameFromPartner);
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOwnSurnamePrefix()
    {
        return $this->ownSurnamePrefix;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getOwnSurname()
    {
        return $this->ownSurname;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSurnamePrefixFromPartner()
    {
        return $this->surnamePrefixFromPartner;
    }

    /**
     * @return \Hl7v2\DataType\StDataType
     */
    public function getSurnameFromPartner()
    {
        return $this->surnameFromPartner;
    }
}

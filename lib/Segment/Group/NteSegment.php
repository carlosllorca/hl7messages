<?php
/**
 * Created by PhpStorm.
 * User: dayni
 * Date: 5/25/2017
 * Time: 1:11 PM
 */

namespace Hl7v2\Segment\Group;


use Hl7v2\Encoding\Codec;
use Hl7v2\Encoding\Datagram;
use Hl7v2\Segment\AbstractSegment;

/**
 * Class NteSegment
 * @package Hl7v2\Segment\Group
 * NTE: Notes and Comments
 */
class NteSegment extends AbstractSegment
{
    /**
     * @var \Hl7v2\DataType\SiDataType
     */
    public $setID_NTE = null;

    /**
     * @var \Hl7v2\DataType\IdDataType
     */
    public $sourceofComment = null;

    /**
     * @var \Hl7v2\DataType\FtDataType[]
     */
    public $comment = [];

    /**
     * @var \Hl7v2\DataType\CeDataType
     */
    public $commentType = null;


    /*** Crea la class dado el mensaje creado en el Datagram y return datagram***/
    public function fromDatagram(Datagram $datagram, Codec $codec)
    {
        // NTE.1
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'PID Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('SetID_NTE', 4, $datagram->getPositionalState());
        $this->setFieldSetID_NTE($codec->extractComponent($datagram));

        //NTE.2
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('SourceofComment', 8, $datagram->getPositionalState());
        $this->setFieldSourceofComment($codec->extractComponent($datagram));

        //NTE.3
        if (false === $codec->advanceToField($datagram)) {
            throw new SegmentError(
                'OBR Segment data contains too few required fields.'
            );
        }
        $this->checkFieldLength('comment', 65536, $datagram->getPositionalState());
        $sequence = [1];
        list(
            $value,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldComment(
            $value
        );

        //NTE.4
        if (false === $codec->advanceToField($datagram)) {
            return false;
        }
        $this->checkFieldLength('CommentType', 250, $datagram->getPositionalState());
        $sequence = [1,1,1,1,1,1];
        list(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem,
            ) = $this->extractComponents($datagram, $codec, $sequence);
        $this->setFieldCommentType(
            $identifier,
            $text,
            $nameOfCodingSystem,
            $altIdentifier,
            $altText,
            $nameOfAltCodingSystem
        );


    }

    /**
     * @param string $value
     */
    public function setFieldSetID_NTE($value)
    {
        $this->setID_NTE = $this
            ->dataTypeFactory
            ->create('SI', $this->characterEncoding)
        ;
        $this->setID_NTE->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldSourceofComment($value)
    {
        $this->sourceofComment = $this
            ->dataTypeFactory
            ->create('ID', $this->characterEncoding)
        ;
        $this->sourceofComment->setValue($value);
    }

    /**
     * @param string $value
     */
    public function setFieldComment($value)
    {
        $comment = $this
            ->dataTypeFactory
            ->create('FT', $this->characterEncoding)
        ;
        $this->comment[] = $comment;
        $comment->setValue($value);
    }

    /**
     * @param string $identifier
     * @param string $text
     * @param string $nameOfCodingSystem
     * @param string $altIdentifier
     * @param string $altText
     * @param string $nameOfAltCodingSystem
     */
    public function setFieldCommentType(
        $identifier = null,
        $text = null,
        $nameOfCodingSystem = null,
        $altIdentifier = null,
        $altText = null,
        $nameOfAltCodingSystem = null
    ) {
        $this->commentType = $this
            ->dataTypeFactory
            ->create('CE', $this->characterEncoding)
        ;
        $this->commentType->setIdentifier($identifier);
        $this->commentType->setText($text);
        $this->commentType->setNameOfCodingSystem($nameOfCodingSystem);
        $this->commentType->setAltIdentifier($altIdentifier);
        $this->commentType->setAltText($altText);
        $this->commentType->setNameOfAltCodingSystem($nameOfAltCodingSystem);
    }

    /**
     * @return \Hl7v2\DataType\SiDataType
     */
    public function getSetIDNTE()
    {
        return $this->setID_NTE;
    }

    /**
     * @return \Hl7v2\DataType\IdDataType
     */
    public function getSourceofComment()
    {
        return $this->sourceofComment;
    }

    /**
     * @return \Hl7v2\DataType\FtDataType[]
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return \Hl7v2\DataType\CeDataType
     */
    public function getCommentType()
    {
        return $this->commentType;
    }


}
<?php

namespace Hl7v2\DataType;

/**
 * Interface of a simple DataTypeInterface.
 */
interface SimpleDataTypeInterface extends DataTypeInterface
{
    /**
     * @return boolean
     */
    public function hasValue();

    /**
     * @return string
     */
    public function getValue($separator=null);

    /**
     * @return string
     */
    public function getCharacterEncoding();
}

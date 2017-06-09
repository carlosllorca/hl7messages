<?php

namespace Hl7v2\DataType;

use Hl7v2\Validation\StringLengthTrait;

abstract class AbstractDataType implements SimpleDataTypeInterface
{
    use StringLengthTrait;

    const MAX_LEN = null;

    public $value;

    public function setValue($value)
    {
        $this->checkOwnLength($value);
        $this->value = $value;
    }

    public function getValue($separator=null)
    {
        return $this->value;
    }

    /**
     * Test for a non-null, non-empty string value.
     *
     * @return bool
     */
    public function hasValue()
    {
        return $this->value !== null && $this->value !== '';
    }

    protected function checkOwnLength($value)
    {
        if (static::MAX_LEN === null) {
            return;
        }
        $this->checkLength(static::MAX_LEN, $value);
    }
}

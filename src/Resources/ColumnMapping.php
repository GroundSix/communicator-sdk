<?php

namespace GroundSix\Communicator\Resources;

use Respect\Validation\Rules\AllOf;
use Respect\Validation\Validator;
use TypeError;

class ColumnMapping
{
    /** @var int */
    public $ColumnId;
    /** @var string */
    public $Value;

    /**
     * @param int            $columnId
     * @param boolean|string $value
     *
     * @throws TypeError if the value cannot be converted to a string
     */
    public function __construct(int $columnId, $value)
    {
        $this->ColumnId = $columnId;

        if (is_bool($value)) {
            $value = $value ? 'true' : 'false';
        }
        try {
            // Casting to a string can raise an error (not \Throwable) even in PHP 7,
            // this forces a TypeError
            $castToString = function (string $v) {
                return $v;
            };
            $this->Value = $castToString($value);
        } catch (TypeError $e) {
            throw new TypeError(
                sprintf('Argument 2 passed to %s must be of the type string, %s given', __METHOD__, gettype($value)),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * Create an array of ColumnMapping's from array key/values
     *
     * @param array $input
     *
     * @return ColumnMapping[]
     */
    public static function map(array $input): array
    {
        $output = [];
        foreach ($input as $columnId => $value) {
            $output[] = new static($columnId, $value);
        }

        return $output;
    }

    public static function rules()
    {
        return new AllOf(
            Validator::attribute('ColumnId', Validator::intType()->notEmpty()),
            Validator::attribute('Value', Validator::stringType())
        );
    }
}

<?php

namespace PayPal\Validation;

/**
 * Class NumericValidator
 *
 * @package PayPal\Validation
 */
class NumericValidator
{

    /**
     * Helper method for validating an argument if it is numeric
     *
     * @param mixed     $argument
     * @param string|null $argumentName
     */
    public static function validate($argument, $argumentName = null): bool
    {
        if (trim($argument) != null && !is_numeric($argument)) {
            throw new \InvalidArgumentException($argumentName . ' is not a valid numeric value');
        }

        return true;
    }
}

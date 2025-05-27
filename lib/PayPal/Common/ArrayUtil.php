<?php

namespace PayPal\Common;

/**
 * Class ArrayUtil
 * Util Class for Arrays
 *
 * @package PayPal\Common
 */
class ArrayUtil
{
    /**
     *
     * @return true if $arr is an associative array
     */
    public static function isAssocArray(array $arr): bool
    {
        foreach (array_keys($arr) as $k) {
            if (is_int($k)) {
                return false;
            }
        }

        return true;
    }
}

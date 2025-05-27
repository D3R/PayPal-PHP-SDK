<?php

namespace PayPal\Common;

use PayPal\Exception\PayPalConfigurationException;

/**
 * Class ReflectionUtil
 *
 * @package PayPal\Common
 */
class ReflectionUtil
{

    /**
     * Reflection Methods
     *
     * @var \ReflectionMethod[]
     */
    private static array $propertiesRefl = [];

    /**
     * Properties Type
     *
     * @var string[]
     */
    private static array $propertiesType = [];


    /**
     * Gets Property Class of the given property.
     * If the class is null, it returns null.
     * If the property is not found, it returns null.
     *
     * @param $class
     * @param $propertyName
     * @throws PayPalConfigurationException
     */
    public static function getPropertyClass($class, $propertyName): ?string
    {
        if ($class == (new PayPalModel())::class) {
            // Make it generic if PayPalModel is used for generating this
            return (new PayPalModel())::class;
        }

        // If the class doesn't exist, or the method doesn't exist, return null.
        if (!class_exists($class) || !method_exists($class, self::getter($class, $propertyName))) {
            return null;
        }

        if (($annotations = self::propertyAnnotations($class, $propertyName)) && isset($annotations['return'])) {
            $param = $annotations['return'];
        }

        if (isset($param)) {
            $anno = preg_split("/[\s\[\]]+/", $param);
            return $anno[0];
        } else {
            throw new PayPalConfigurationException(sprintf("Getter function for '%s' in '%s' class should have a proper return type.", $propertyName, $class));
        }
    }

    /**
     * Checks if the Property is of type array or an object
     *
     * @param $class
     * @param $propertyName
     * @throws PayPalConfigurationException
     */
    public static function isPropertyClassArray($class, $propertyName): ?bool
    {
        // If the class doesn't exist, or the method doesn't exist, return null.
        if (!class_exists($class) || !method_exists($class, self::getter($class, $propertyName))) {
            return null;
        }

        if (($annotations = self::propertyAnnotations($class, $propertyName)) && isset($annotations['return'])) {
            $param = $annotations['return'];
        }

        if (isset($param)) {
            return str_ends_with($param, '[]');
        } else {
            throw new PayPalConfigurationException(sprintf("Getter function for '%s' in '%s' class should have a proper return type.", $propertyName, $class));
        }
    }

    /**
     * Retrieves Annotations of each property
     *
     * @param $class
     * @param $propertyName
     * @throws \RuntimeException
     * @return mixed
     */
    public static function propertyAnnotations($class, $propertyName)
    {
        $class = is_object($class) ? $class::class : $class;
        if (!class_exists('ReflectionProperty')) {
            throw new \RuntimeException("Property type of " . $class . sprintf('::%s cannot be resolved', $propertyName));
        }

        if ($annotations =& self::$propertiesType[$class][$propertyName]) {
            return $annotations;
        }

        if (!($refl =& self::$propertiesRefl[$class][$propertyName])) {
            $getter = self::getter($class, $propertyName);
            $refl = new \ReflectionMethod($class, $getter);
            self::$propertiesRefl[$class][$propertyName] = $refl;
        }

        // todo: smarter regexp
        if (!preg_match_all(
            '~\@([^\s@\(]+)[\t ]*(?:\(?([^\n@]+)\)?)?~i',
            $refl->getDocComment(),
            $annots,
            PREG_PATTERN_ORDER)) {
            return null;
        }

        foreach ($annots[1] as $i => $annot) {
            $annotations[strtolower($annot)] = empty($annots[2][$i]) ? true : rtrim($annots[2][$i], " \t\n\r)");
        }

        return $annotations;
    }

    /**
     * Returns the properly formatted getter function name based on class name and property
     * Formats the property name to a standard getter function
     *
     * @param string $class
     * @param string $propertyName
     * @return string getter function name
     */
    public static function getter($class, $propertyName)
    {
        return method_exists($class, "get" . ucfirst($propertyName)) ?
            "get" . ucfirst($propertyName) :
            "get" . preg_replace_callback("/([_\-\s]?([a-z0-9]+))/", "self::replace_callback", $propertyName);
    }
}

<?php

namespace PayPal\Test\Api;

use PayPal\Api\Measurement;
use PHPUnit\Framework\TestCase;

/**
 * Class Measurement
 *
 * @package PayPal\Test\Api
 */
class MeasurementTest extends TestCase
{
    /**
     * Gets Json String of Object Measurement
     */
    public static function getJson(): string
    {
        return '{"value":"TestSample","unit":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\Measurement
    {
        return new Measurement(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\Measurement
    {
        $obj = new Measurement(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getValue());
        $this->assertNotNull($obj->getUnit());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Measurement $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getValue(), "TestSample");
        $this->assertEquals($obj->getUnit(), "TestSample");
    }
}

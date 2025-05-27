<?php

namespace PayPal\Test\Api;

use PayPal\Api\CountryCode;
use PHPUnit\Framework\TestCase;

/**
 * Class CountryCode
 *
 * @package PayPal\Test\Api
 */
class CountryCodeTest extends TestCase
{
    /**
     * Gets Json String of Object CountryCode
     */
    public static function getJson(): string
    {
        return '{"country_code":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\CountryCode
    {
        return new CountryCode(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\CountryCode
    {
        $obj = new CountryCode(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getCountryCode());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CountryCode $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getCountryCode(), "TestSample");
    }
}

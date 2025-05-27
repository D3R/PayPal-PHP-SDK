<?php

namespace PayPal\Test\Api;

use PayPal\Api\Currency;
use PHPUnit\Framework\TestCase;

/**
 * Class Currency
 *
 * @package PayPal\Test\Api
 */
class CurrencyTest extends TestCase
{
    /**
     * Gets Json String of Object Currency
     */
    public static function getJson(): string
    {
        return '{"currency":"TestSample","value":"12.34"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\Currency
    {
        return new Currency(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\Currency
    {
        $obj = new Currency(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getCurrency());
        $this->assertNotNull($obj->getValue());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Currency $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getCurrency(), "TestSample");
        $this->assertEquals($obj->getValue(), "12.34");
    }
}

<?php

namespace PayPal\Test\Api;

use PayPal\Api\CustomAmount;
use PHPUnit\Framework\TestCase;

/**
 * Class CustomAmount
 *
 * @package PayPal\Test\Api
 */
class CustomAmountTest extends TestCase
{
    /**
     * Gets Json String of Object CustomAmount
     */
    public static function getJson(): string
    {
        return '{"label":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\CustomAmount
    {
        return new CustomAmount(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\CustomAmount
    {
        $obj = new CustomAmount(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getLabel());
        $this->assertNotNull($obj->getAmount());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CustomAmount $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getLabel(), "TestSample");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}

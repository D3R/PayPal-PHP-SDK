<?php

namespace PayPal\Test\Api;

use PayPal\Api\ShippingCost;
use PHPUnit\Framework\TestCase;

/**
 * Class ShippingCost
 *
 * @package PayPal\Test\Api
 */
class ShippingCostTest extends TestCase
{
    /**
     * Gets Json String of Object ShippingCost
     */
    public static function getJson(): string
    {
        return '{"amount":' .CurrencyTest::getJson() . ',"tax":' .TaxTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\ShippingCost
    {
        return new ShippingCost(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\ShippingCost
    {
        $obj = new ShippingCost(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getAmount());
        $this->assertNotNull($obj->getTax());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingCost $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getTax(), TaxTest::getObject());
    }
}

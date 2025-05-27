<?php

namespace PayPal\Test\Api;

use PayPal\Api\ShippingInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class ShippingInfo
 *
 * @package PayPal\Test\Api
 */
class ShippingInfoTest extends TestCase
{
    /**
     * Gets Json String of Object ShippingInfo
     */
    public static function getJson(): string
    {
        return '{"first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","address":' .AddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\ShippingInfo
    {
        return new ShippingInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\ShippingInfo
    {
        $obj = new ShippingInfo(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getBusinessName());
        $this->assertNotNull($obj->getAddress());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingInfo $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getBusinessName(), "TestSample");
        $this->assertEquals($obj->getAddress(), AddressTest::getObject());
    }
}

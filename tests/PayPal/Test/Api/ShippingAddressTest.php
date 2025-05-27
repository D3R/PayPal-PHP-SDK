<?php

namespace PayPal\Test\Api;

use PayPal\Api\ShippingAddress;
use PHPUnit\Framework\TestCase;

/**
 * Class ShippingAddress
 *
 * @package PayPal\Test\Api
 */
class ShippingAddressTest extends TestCase
{
    /**
     * Gets Json String of Object ShippingAddress
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","recipient_name":"TestSample","default_address":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\ShippingAddress
    {
        return new ShippingAddress(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\ShippingAddress
    {
        $obj = new ShippingAddress(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getRecipientName());
        $this->assertNotNull($obj->getDefaultAddress());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ShippingAddress $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getRecipientName(), "TestSample");
        $this->assertEquals($obj->getDefaultAddress(), true);
    }
}

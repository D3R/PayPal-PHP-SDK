<?php

namespace PayPal\Test\Api;

use PayPal\Api\BillingInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class BillingInfo
 *
 * @package PayPal\Test\Api
 */
class BillingInfoTest extends TestCase
{
    /**
     * Gets Json String of Object BillingInfo
     */
    public static function getJson(): string
    {
        return '{"email":"TestSample","first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","address":' .InvoiceAddressTest::getJson() . ',"language":"TestSample","additional_info":"TestSample","notification_channel":"TestSample","phone":' .PhoneTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\BillingInfo
    {
        return new BillingInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\BillingInfo
    {
        $obj = new BillingInfo(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getEmail());
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getBusinessName());
        $this->assertNotNull($obj->getAddress());
        $this->assertNotNull($obj->getLanguage());
        $this->assertNotNull($obj->getAdditionalInfo());
        $this->assertNotNull($obj->getNotificationChannel());
        $this->assertNotNull($obj->getPhone());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BillingInfo $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getEmail(), "TestSample");
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getBusinessName(), "TestSample");
        $this->assertEquals($obj->getAddress(), InvoiceAddressTest::getObject());
        $this->assertEquals($obj->getLanguage(), "TestSample");
        $this->assertEquals($obj->getAdditionalInfo(), "TestSample");
        $this->assertEquals($obj->getNotificationChannel(), "TestSample");
        $this->assertEquals($obj->getPhone(), PhoneTest::getObject());
    }
}

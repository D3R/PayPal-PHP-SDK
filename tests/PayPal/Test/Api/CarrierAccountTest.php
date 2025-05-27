<?php

namespace PayPal\Test\Api;

use PayPal\Api\CarrierAccount;
use PHPUnit\Framework\TestCase;

/**
 * Class CarrierAccount
 *
 * @package PayPal\Test\Api
 */
class CarrierAccountTest extends TestCase
{
    /**
     * Gets Json String of Object CarrierAccount
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","phone_number":"TestSample","external_customer_id":"TestSample","phone_source":"TestSample","country_code":' .CountryCodeTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\CarrierAccount
    {
        return new CarrierAccount(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\CarrierAccount
    {
        $obj = new CarrierAccount(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getPhoneNumber());
        $this->assertNotNull($obj->getExternalCustomerId());
        $this->assertNotNull($obj->getPhoneSource());
        $this->assertNotNull($obj->getCountryCode());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CarrierAccount $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getPhoneNumber(), "TestSample");
        $this->assertEquals($obj->getExternalCustomerId(), "TestSample");
        $this->assertEquals($obj->getPhoneSource(), "TestSample");
        $this->assertEquals($obj->getCountryCode(), CountryCodeTest::getObject());
    }
}

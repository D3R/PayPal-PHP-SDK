<?php

namespace PayPal\Test\Api;

use PayPal\Api\PotentialPayerInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class PotentialPayerInfo
 *
 * @package PayPal\Test\Api
 */
class PotentialPayerInfoTest extends TestCase
{
    /**
     * Gets Json String of Object PotentialPayerInfo
     */
    public static function getJson(): string
    {
        return '{"email":"TestSample","external_remember_me_id":"TestSample","account_number":"TestSample","billing_address":' .AddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\PotentialPayerInfo
    {
        return new PotentialPayerInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\PotentialPayerInfo
    {
        $obj = new PotentialPayerInfo(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getEmail());
        $this->assertNotNull($obj->getExternalRememberMeId());
        $this->assertNotNull($obj->getAccountNumber());
        $this->assertNotNull($obj->getBillingAddress());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PotentialPayerInfo $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getEmail(), "TestSample");
        $this->assertEquals($obj->getExternalRememberMeId(), "TestSample");
        $this->assertEquals($obj->getAccountNumber(), "TestSample");
        $this->assertEquals($obj->getBillingAddress(), AddressTest::getObject());
    }
}

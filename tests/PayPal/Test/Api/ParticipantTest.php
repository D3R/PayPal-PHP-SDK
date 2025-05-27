<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\Participant;
use PHPUnit\Framework\TestCase;

/**
 * Class Participant
 *
 * @package PayPal\Test\Api
 */
class ParticipantTest extends TestCase
{
    /**
     * Gets Json String of Object Participant
     */
    public static function getJson(): string
    {
        return '{"email":"TestSample","first_name":"TestSample","last_name":"TestSample","business_name":"TestSample","phone":' .PhoneTest::getJson() . ',"fax":' .PhoneTest::getJson() . ',"website":"TestSample","additional_info":"TestSample","address":' .AddressTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\Participant
    {
        return new Participant(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\Participant
    {
        $obj = new Participant(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getEmail());
        $this->assertNotNull($obj->getFirstName());
        $this->assertNotNull($obj->getLastName());
        $this->assertNotNull($obj->getBusinessName());
        $this->assertNotNull($obj->getPhone());
        $this->assertNotNull($obj->getFax());
        $this->assertNotNull($obj->getWebsite());
        $this->assertNotNull($obj->getAdditionalInfo());
        $this->assertNotNull($obj->getAddress());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Participant $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getEmail(), "TestSample");
        $this->assertEquals($obj->getFirstName(), "TestSample");
        $this->assertEquals($obj->getLastName(), "TestSample");
        $this->assertEquals($obj->getBusinessName(), "TestSample");
        $this->assertEquals($obj->getPhone(), PhoneTest::getObject());
        $this->assertEquals($obj->getFax(), PhoneTest::getObject());
        $this->assertEquals($obj->getWebsite(), "TestSample");
        $this->assertEquals($obj->getAdditionalInfo(), "TestSample");
        $this->assertEquals($obj->getAddress(), AddressTest::getObject());
    }
}

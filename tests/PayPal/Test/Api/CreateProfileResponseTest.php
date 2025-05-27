<?php

namespace PayPal\Test\Api;

use PayPal\Api\CreateProfileResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class CreateProfileResponse
 *
 * @package PayPal\Test\Api
 */
class CreateProfileResponseTest extends TestCase
{
    /**
     * Gets Json String of Object CreateProfileResponse
     * @return string
     */
    public static function getJson()
    {
        return json_encode(json_decode('{"id":"TestSample"}'));
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\CreateProfileResponse
    {
        return new CreateProfileResponse(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\CreateProfileResponse
    {
        $obj = new CreateProfileResponse(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CreateProfileResponse $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
    }
}

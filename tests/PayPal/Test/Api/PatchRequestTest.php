<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\PatchRequest;
use PHPUnit\Framework\TestCase;

/**
 * Class PatchRequest
 *
 * @package PayPal\Test\Api
 */
class PatchRequestTest extends TestCase
{
    /**
     * Gets Json String of Object PatchRequest
     */
    public static function getJson(): string
    {
        return '{"patches":' .PatchTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\PatchRequest
    {
        return new PatchRequest(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\PatchRequest
    {
        $obj = new PatchRequest(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPatches());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PatchRequest $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getPatches(), PatchTest::getObject());
    }
}

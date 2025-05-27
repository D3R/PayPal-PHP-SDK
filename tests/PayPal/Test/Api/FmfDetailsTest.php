<?php

namespace PayPal\Test\Api;

use PayPal\Api\FmfDetails;
use PHPUnit\Framework\TestCase;

/**
 * Class FmfDetails
 *
 * @package PayPal\Test\Api
 */
class FmfDetailsTest extends TestCase
{
    /**
     * Gets Json String of Object FmfDetails
     */
    public static function getJson(): string
    {
        return '{"filter_type":"TestSample","filter_id":"TestSample","name":"TestSample","description":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\FmfDetails
    {
        return new FmfDetails(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\FmfDetails
    {
        $obj = new FmfDetails(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getFilterType());
        $this->assertNotNull($obj->getFilterId());
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getDescription());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FmfDetails $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getFilterType(), "TestSample");
        $this->assertEquals($obj->getFilterId(), "TestSample");
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getDescription(), "TestSample");
    }
}

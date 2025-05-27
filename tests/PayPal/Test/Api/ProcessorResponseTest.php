<?php

namespace PayPal\Test\Api;

use PayPal\Api\ProcessorResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class ProcessorResponse
 *
 * @package PayPal\Test\Api
 */
class ProcessorResponseTest extends TestCase
{
    /**
     * Gets Json String of Object ProcessorResponse
     */
    public static function getJson(): string
    {
        return '{"response_code":"TestSample","avs_code":"TestSample","cvv_code":"TestSample","advice_code":"TestSample","eci_submitted":"TestSample","vpas":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\ProcessorResponse
    {
        return new ProcessorResponse(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\ProcessorResponse
    {
        $obj = new ProcessorResponse(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getResponseCode());
        $this->assertNotNull($obj->getAvsCode());
        $this->assertNotNull($obj->getCvvCode());
        $this->assertNotNull($obj->getAdviceCode());
        $this->assertNotNull($obj->getEciSubmitted());
        $this->assertNotNull($obj->getVpas());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ProcessorResponse $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getResponseCode(), "TestSample");
        $this->assertEquals($obj->getAvsCode(), "TestSample");
        $this->assertEquals($obj->getCvvCode(), "TestSample");
        $this->assertEquals($obj->getAdviceCode(), "TestSample");
        $this->assertEquals($obj->getEciSubmitted(), "TestSample");
        $this->assertEquals($obj->getVpas(), "TestSample");
    }
}

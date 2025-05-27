<?php

namespace PayPal\Test\Api;

use PayPal\Api\Tax;
use PHPUnit\Framework\TestCase;

/**
 * Class Tax
 *
 * @package PayPal\Test\Api
 */
class TaxTest extends TestCase
{
    /**
     * Gets Json String of Object Tax
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","name":"TestSample","percent":"12.34","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\Tax
    {
        return new Tax(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\Tax
    {
        $obj = new Tax(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getPercent());
        $this->assertNotNull($obj->getAmount());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Tax $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getPercent(), "12.34");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}

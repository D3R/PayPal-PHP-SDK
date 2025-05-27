<?php

namespace PayPal\Test\Api;

use PayPal\Api\ChargeModel;
use PHPUnit\Framework\TestCase;

/**
 * Class ChargeModel
 *
 * @package PayPal\Test\Api
 */
class ChargeModelTest extends TestCase
{
    /**
     * Gets Json String of Object ChargeModels
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","type":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\ChargeModel
    {
        return new ChargeModel(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\ChargeModel
    {
        $obj = new ChargeModel(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getAmount());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ChargeModel $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}

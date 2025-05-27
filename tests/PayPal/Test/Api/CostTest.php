<?php

namespace PayPal\Test\Api;

use PayPal\Api\Cost;
use PHPUnit\Framework\TestCase;

/**
 * Class Cost
 *
 * @package PayPal\Test\Api
 */
class CostTest extends TestCase
{
    /**
     * Gets Json String of Object Cost
     */
    public static function getJson(): string
    {
        return '{"percent":"12.34","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\Cost
    {
        return new Cost(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\Cost
    {
        $obj = new Cost(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPercent());
        $this->assertNotNull($obj->getAmount());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Cost $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getPercent(), "12.34");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}

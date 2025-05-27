<?php

namespace PayPal\Test\Api;

use PayPal\Api\Credit;
use PHPUnit\Framework\TestCase;

/**
 * Class Credit
 *
 * @package PayPal\Test\Api
 */
class CreditTest extends TestCase
{
    /**
     * Gets Json String of Object Credit
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","type":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\Credit
    {
        return new Credit(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\Credit
    {
        $obj = new Credit(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getType());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Credit $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
    }
}

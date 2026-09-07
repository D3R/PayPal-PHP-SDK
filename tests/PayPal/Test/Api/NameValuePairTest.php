<?php

namespace PayPal\Test\Api;

use PayPal\Api\NameValuePair;
use PHPUnit\Framework\TestCase;

/**
 * Class NameValuePair
 *
 * @package PayPal\Test\Api
 */
class NameValuePairTest extends TestCase
{
    /**
     * Gets Json String of Object NameValuePair
     * @return string
     */
    public static function getJson(): string
    {
        return '{"name":"TestSample","value":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return NameValuePair
     */
    public static function getObject(): \PayPal\Api\NameValuePair
    {
        return new NameValuePair(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return NameValuePair
     */
    public function testSerializationDeserialization(): \PayPal\Api\NameValuePair
    {
        $obj = new NameValuePair(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getValue());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param NameValuePair $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getValue(), "TestSample");
    }
}

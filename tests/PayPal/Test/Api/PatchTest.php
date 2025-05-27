<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\Patch;
use PHPUnit\Framework\TestCase;

/**
 * Class Patch
 *
 * @package PayPal\Test\Api
 */
class PatchTest extends TestCase
{
    /**
     * Gets Json String of Object Patch
     * @return string
     */
    public static function getJson(): string
    {
        return '{"op":"TestSample","path":"TestSample","value":"TestSample","from":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Patch
     */
    public static function getObject(): \PayPal\Api\Patch
    {
        return new Patch(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Patch
     */
    public function testSerializationDeserialization(): \PayPal\Api\Patch
    {
        $obj = new Patch(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getOp());
        $this->assertNotNull($obj->getPath());
        $this->assertNotNull($obj->getValue());
        $this->assertNotNull($obj->getFrom());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Patch $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getOp(), "TestSample");
        $this->assertEquals($obj->getPath(), "TestSample");
        $this->assertEquals($obj->getValue(), "TestSample");
        $this->assertEquals($obj->getFrom(), "TestSample");
    }


}

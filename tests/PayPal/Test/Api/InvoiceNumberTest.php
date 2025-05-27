<?php

namespace PayPal\Test\Api;

use PayPal\Api\InvoiceNumber;
use PHPUnit\Framework\TestCase;

/**
 * Class Cost
 *
 * @package PayPal\Test\Api
 */
class InvoiceNumberTest extends TestCase
{
    /**
     * Gets Json String of Object Cost
     */
    public static function getJson(): string
    {
        return '{"number":"1234"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\InvoiceNumber
    {
        return new InvoiceNumber(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\InvoiceNumber
    {
        $obj = new InvoiceNumber(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getNumber());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InvoiceNumber $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getNumber(), "1234");
    }
}

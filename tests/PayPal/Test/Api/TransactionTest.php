<?php

namespace PayPal\Test\Api;

use PayPal\Api\Transaction;
use PHPUnit\Framework\TestCase;

/**
 * Class Transaction
 *
 * @package PayPal\Test\Api
 */
class TransactionTest extends TestCase
{
    /**
     * Gets Json String of Object Transaction
     */
    public static function getJson(): string
    {
        return '{}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\Transaction
    {
        return new Transaction(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\Transaction
    {
        $obj = new Transaction(self::getJson());
        $this->assertNotNull($obj);
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Transaction $obj
     */
    public function testGetters($obj): void
    {
    }
}

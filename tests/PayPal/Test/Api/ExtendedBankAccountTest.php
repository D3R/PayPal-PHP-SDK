<?php

namespace PayPal\Test\Api;

use PayPal\Api\ExtendedBankAccount;
use PHPUnit\Framework\TestCase;

/**
 * Class ExtendedBankAccount
 *
 * @package PayPal\Test\Api
 */
class ExtendedBankAccountTest extends TestCase
{
    /**
     * Gets Json String of Object ExtendedBankAccount
     */
    public static function getJson(): string
    {
        return '{"mandate_reference_number":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\ExtendedBankAccount
    {
        return new ExtendedBankAccount(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\ExtendedBankAccount
    {
        $obj = new ExtendedBankAccount(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getMandateReferenceNumber());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param ExtendedBankAccount $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getMandateReferenceNumber(), "TestSample");
    }
}

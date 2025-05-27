<?php

namespace PayPal\Test\Api;

use PayPal\Api\BankAccountsList;
use PHPUnit\Framework\TestCase;

/**
 * Class BankAccountsList
 *
 * @package PayPal\Test\Api
 */
class BankAccountsListTest extends TestCase
{
    /**
     * Gets Json String of Object BankAccountsList
     */
    public static function getJson(): string
    {
        return '{"bank-accounts":' .BankAccountTest::getJson() . ',"count":123,"next_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\BankAccountsList
    {
        return new BankAccountsList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\BankAccountsList
    {
        $obj = new BankAccountsList(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getBankAccounts());
        $this->assertNotNull($obj->getCount());
        $this->assertNotNull($obj->getNextId());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankAccountsList $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getBankAccounts(), BankAccountTest::getObject());
        $this->assertEquals($obj->getCount(), 123);
        $this->assertEquals($obj->getNextId(), "TestSample");
    }
}

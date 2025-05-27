<?php

namespace PayPal\Test\Api;

use PayPal\Api\BankToken;
use PHPUnit\Framework\TestCase;

/**
 * Class BankToken
 *
 * @package PayPal\Test\Api
 */
class BankTokenTest extends TestCase
{
    /**
     * Gets Json String of Object BankToken
     */
    public static function getJson(): string
    {
        return '{"bank_id":"TestSample","external_customer_id":"TestSample","mandate_reference_number":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\BankToken
    {
        return new BankToken(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\BankToken
    {
        $obj = new BankToken(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getBankId());
        $this->assertNotNull($obj->getExternalCustomerId());
        $this->assertNotNull($obj->getMandateReferenceNumber());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param BankToken $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getBankId(), "TestSample");
        $this->assertEquals($obj->getExternalCustomerId(), "TestSample");
        $this->assertEquals($obj->getMandateReferenceNumber(), "TestSample");
    }
}

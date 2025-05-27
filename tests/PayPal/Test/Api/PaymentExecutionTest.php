<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentExecution;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentExecution
 *
 * @package PayPal\Test\Api
 */
class PaymentExecutionTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentExecution
     * @return string
     */
    public static function getJson(): string
    {
        return '{"payer_id":"TestSample","carrier_account_id":"TestSample","transactions":[' . TransactionTest::getJson() . ']}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentExecution
     */
    public static function getObject(): \PayPal\Api\PaymentExecution
    {
        return new PaymentExecution(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentExecution
     */
    public function testSerializationDeserialization(): \PayPal\Api\PaymentExecution
    {
        $obj = new PaymentExecution(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPayerId());
        $this->assertNotNull($obj->getCarrierAccountId());
        $this->assertNotNull($obj->getTransactions());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentExecution $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getPayerId(), "TestSample");
        $this->assertEquals($obj->getCarrierAccountId(), "TestSample");
        $this->assertEquals($obj->getTransactions(), [TransactionTest::getObject()]);
    }
}

<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentDetail;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentDetail
 *
 * @package PayPal\Test\Api
 */
class PaymentDetailTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentDetail
     * @return string
     */
    public static function getJson(): string
    {
        return '{"type":"TestSample","transaction_id":"TestSample","transaction_type":"TestSample","date":"TestSample","method":"TestSample","note":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentDetail
     */
    public static function getObject(): \PayPal\Api\PaymentDetail
    {
        return new PaymentDetail(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentDetail
     */
    public function testSerializationDeserialization(): \PayPal\Api\PaymentDetail
    {
        $obj = new PaymentDetail(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getTransactionId());
        $this->assertNotNull($obj->getTransactionType());
        $this->assertNotNull($obj->getDate());
        $this->assertNotNull($obj->getMethod());
        $this->assertNotNull($obj->getNote());
        $this->assertNotNull($obj->getAmount());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentDetail $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getTransactionId(), "TestSample");
        $this->assertEquals($obj->getTransactionType(), "TestSample");
        $this->assertEquals($obj->getDate(), "TestSample");
        $this->assertEquals($obj->getMethod(), "TestSample");
        $this->assertEquals($obj->getNote(), "TestSample");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}

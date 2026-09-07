<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentHistory;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentHistory
 *
 * @package PayPal\Test\Api
 */
class PaymentHistoryTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentHistory
     * @return string
     */
    public static function getJson(): string
    {
        return '{"payments":' . PaymentTest::getJson() . ',"count":123,"next_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return PaymentHistory
     */
    public static function getObject(): \PayPal\Api\PaymentHistory
    {
        return new PaymentHistory(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return PaymentHistory
     */
    public function testSerializationDeserialization(): \PayPal\Api\PaymentHistory
    {
        $obj = new PaymentHistory(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPayments());
        $this->assertNotNull($obj->getCount());
        $this->assertNotNull($obj->getNextId());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentHistory $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getPayments(), PaymentTest::getObject());
        $this->assertEquals($obj->getCount(), 123);
        $this->assertEquals($obj->getNextId(), "TestSample");
    }
}

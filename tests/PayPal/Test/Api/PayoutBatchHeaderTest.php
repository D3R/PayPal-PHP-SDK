<?php

namespace PayPal\Test\Api;

use PayPal\Api\PayoutBatchHeader;
use PHPUnit\Framework\TestCase;

/**
 * Class PayoutBatchHeader
 *
 * @package PayPal\Test\Api
 */
class PayoutBatchHeaderTest extends TestCase
{
    /**
     * Gets Json String of Object PayoutBatchHeader
     */
    public static function getJson(): string
    {
        return '{"payout_batch_id":"TestSample","batch_status":"TestSample","time_created":"TestSample","time_completed":"TestSample","sender_batch_header":' .PayoutSenderBatchHeaderTest::getJson() . ',"amount":' .CurrencyTest::getJson() . ',"fees":' .CurrencyTest::getJson() . ',"errors":' .ErrorTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\PayoutBatchHeader
    {
        return new PayoutBatchHeader(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\PayoutBatchHeader
    {
        $obj = new PayoutBatchHeader(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getPayoutBatchId());
        $this->assertNotNull($obj->getBatchStatus());
        $this->assertNotNull($obj->getTimeCreated());
        $this->assertNotNull($obj->getTimeCompleted());
        $this->assertNotNull($obj->getSenderBatchHeader());
        $this->assertNotNull($obj->getAmount());
        $this->assertNotNull($obj->getFees());
        $this->assertNotNull($obj->getErrors());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutBatchHeader $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getPayoutBatchId(), "TestSample");
        $this->assertEquals($obj->getBatchStatus(), "TestSample");
        $this->assertEquals($obj->getTimeCreated(), "TestSample");
        $this->assertEquals($obj->getTimeCompleted(), "TestSample");
        $this->assertEquals($obj->getSenderBatchHeader(), PayoutSenderBatchHeaderTest::getObject());
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getFees(), CurrencyTest::getObject());
        $this->assertEquals($obj->getErrors(), ErrorTest::getObject());
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}

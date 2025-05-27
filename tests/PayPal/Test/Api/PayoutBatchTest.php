<?php

namespace PayPal\Test\Api;

use PayPal\Api\PayoutBatch;
use PHPUnit\Framework\TestCase;

/**
 * Class PayoutBatch
 *
 * @package PayPal\Test\Api
 */
class PayoutBatchTest extends TestCase
{
    /**
     * Gets Json String of Object PayoutBatch
     */
    public static function getJson(): string
    {
        return '{"batch_header":' .PayoutBatchHeaderTest::getJson() . ',"items":' .PayoutItemDetailsTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\PayoutBatch
    {
        return new PayoutBatch(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\PayoutBatch
    {
        $obj = new PayoutBatch(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getBatchHeader());
        $this->assertNotNull($obj->getItems());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PayoutBatch $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getBatchHeader(), PayoutBatchHeaderTest::getObject());
        $this->assertEquals($obj->getItems(), PayoutItemDetailsTest::getObject());
    }
}

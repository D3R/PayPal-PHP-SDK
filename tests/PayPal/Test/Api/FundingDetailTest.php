<?php

namespace PayPal\Test\Api;

use PayPal\Api\FundingDetail;
use PHPUnit\Framework\TestCase;

/**
 * Class FundingDetail
 *
 * @package PayPal\Test\Api
 */
class FundingDetailTest extends TestCase
{
    /**
     * Gets Json String of Object FundingDetail
     * @return string
     */
    public static function getJson(): string
    {
        return '{"clearing_time":"TestSample","payment_hold_date":"TestSample","payment_debit_date":"TestSample","processing_type":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FundingDetail
     */
    public static function getObject(): \PayPal\Api\FundingDetail
    {
        return new FundingDetail(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FundingDetail
     */
    public function testSerializationDeserialization(): \PayPal\Api\FundingDetail
    {
        $obj = new FundingDetail(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getClearingTime());
        $this->assertNotNull($obj->getPaymentHoldDate());
        $this->assertNotNull($obj->getPaymentDebitDate());
        $this->assertNotNull($obj->getProcessingType());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingDetail $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getClearingTime(), "TestSample");
        $this->assertEquals($obj->getPaymentHoldDate(), "TestSample");
        $this->assertEquals($obj->getPaymentDebitDate(), "TestSample");
        $this->assertEquals($obj->getProcessingType(), "TestSample");
    }
}

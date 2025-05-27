<?php

namespace PayPal\Test\Api;

use PayPal\Api\AlternatePayment;
use PHPUnit\Framework\TestCase;

/**
 * Class AlternatePayment
 *
 * @package PayPal\Test\Api
 */
class AlternatePaymentTest extends TestCase
{
    /**
     * Gets Json String of Object AlternatePayment
     */
    public static function getJson(): string
    {
        return '{"alternate_payment_account_id":"TestSample","external_customer_id":"TestSample","alternate_payment_provider_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\AlternatePayment
    {
        return new AlternatePayment(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\AlternatePayment
    {
        $obj = new AlternatePayment(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getAlternatePaymentAccountId());
        $this->assertNotNull($obj->getExternalCustomerId());
        $this->assertNotNull($obj->getAlternatePaymentProviderId());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param AlternatePayment $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getAlternatePaymentAccountId(), "TestSample");
        $this->assertEquals($obj->getExternalCustomerId(), "TestSample");
        $this->assertEquals($obj->getAlternatePaymentProviderId(), "TestSample");
    }
}

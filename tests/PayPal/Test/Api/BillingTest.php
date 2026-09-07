<?php

namespace PayPal\Test\Api;

use PayPal\Api\Billing;
use PHPUnit\Framework\TestCase;

/**
 * Class Billing
 *
 * @package PayPal\Test\Api
 */
class BillingTest extends TestCase
{
    /**
     * Gets Json String of Object Billing
     * @return string
     */
    public static function getJson(): string
    {
        return '{"billing_agreement_id":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Billing
     */
    public static function getObject(): \PayPal\Api\Billing
    {
        return new Billing(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Billing
     */
    public function testSerializationDeserialization(): \PayPal\Api\Billing
    {
        $obj = new Billing(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getBillingAgreementId());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Billing $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getBillingAgreementId(), "TestSample");
    }
}

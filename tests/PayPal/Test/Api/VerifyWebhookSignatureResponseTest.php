<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\VerifyWebhookSignatureResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class VerifyWebhookSignatureResponse
 *
 * @package PayPal\Test\Api
 */
class VerifyWebhookSignatureResponseTest extends TestCase
{
    /**
     * Gets Json String of Object VerifyWebhookSignatureResponse
     */
    public static function getJson(): string
    {
        return '{"verification_status":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\VerifyWebhookSignatureResponse
    {
        return new VerifyWebhookSignatureResponse(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\VerifyWebhookSignatureResponse
    {
        $obj = new VerifyWebhookSignatureResponse(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getVerificationStatus());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param VerifyWebhookSignatureResponse $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getVerificationStatus(), "TestSample");
    }

}

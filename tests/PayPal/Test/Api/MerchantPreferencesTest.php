<?php

namespace PayPal\Test\Api;

use PayPal\Api\MerchantPreferences;
use PHPUnit\Framework\TestCase;

/**
 * Class MerchantPreferences
 *
 * @package PayPal\Test\Api
 */
class MerchantPreferencesTest extends TestCase
{
    /**
     * Gets Json String of Object MerchantPreferences
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","setup_fee":' .CurrencyTest::getJson() . ',"cancel_url":"http://www.google.com","return_url":"http://www.google.com","notify_url":"http://www.google.com","max_fail_attempts":"TestSample","auto_bill_amount":"TestSample","initial_fail_amount_action":"TestSample","accepted_payment_type":"TestSample","char_set":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\MerchantPreferences
    {
        return new MerchantPreferences(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\MerchantPreferences
    {
        $obj = new MerchantPreferences(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getSetupFee());
        $this->assertNotNull($obj->getCancelUrl());
        $this->assertNotNull($obj->getReturnUrl());
        $this->assertNotNull($obj->getNotifyUrl());
        $this->assertNotNull($obj->getMaxFailAttempts());
        $this->assertNotNull($obj->getAutoBillAmount());
        $this->assertNotNull($obj->getInitialFailAmountAction());
        $this->assertNotNull($obj->getAcceptedPaymentType());
        $this->assertNotNull($obj->getCharSet());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param MerchantPreferences $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getSetupFee(), CurrencyTest::getObject());
        $this->assertEquals($obj->getCancelUrl(), "http://www.google.com");
        $this->assertEquals($obj->getReturnUrl(), "http://www.google.com");
        $this->assertEquals($obj->getNotifyUrl(), "http://www.google.com");
        $this->assertEquals($obj->getMaxFailAttempts(), "TestSample");
        $this->assertEquals($obj->getAutoBillAmount(), "TestSample");
        $this->assertEquals($obj->getInitialFailAmountAction(), "TestSample");
        $this->assertEquals($obj->getAcceptedPaymentType(), "TestSample");
        $this->assertEquals($obj->getCharSet(), "TestSample");
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage CancelUrl is not a fully qualified URL
     */
    public function testUrlValidationForCancelUrl(): void
    {
        $obj = new MerchantPreferences();
        $obj->setCancelUrl(null);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ReturnUrl is not a fully qualified URL
     */
    public function testUrlValidationForReturnUrl(): void
    {
        $obj = new MerchantPreferences();
        $obj->setReturnUrl(null);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage NotifyUrl is not a fully qualified URL
     */
    public function testUrlValidationForNotifyUrl(): void
    {
        $obj = new MerchantPreferences();
        $obj->setNotifyUrl(null);
    }

    public function testUrlValidationForCancelUrlDeprecated(): void
    {
        $obj = new MerchantPreferences();
        $obj->setCancelUrl(null);
        $this->assertNull($obj->getCancelUrl());
    }

    public function testUrlValidationForReturnUrlDeprecated(): void
    {
        $obj = new MerchantPreferences();
        $obj->setReturnUrl(null);
        $this->assertNull($obj->getReturnUrl());
    }

    public function testUrlValidationForNotifyUrlDeprecated(): void
    {
        $obj = new MerchantPreferences();
        $obj->setNotifyUrl(null);
        $this->assertNull($obj->getNotifyUrl());
    }
}

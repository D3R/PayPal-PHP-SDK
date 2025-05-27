<?php

namespace PayPal\Test\Api;

use PayPal\Api\TemplateData;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateData
 *
 * @package PayPal\Test\Api
 */
class TemplateDataTest extends TestCase
{
    /**
     * Gets Json String of Object TemplateData
     */
    public static function getJson(): string
    {
        return '{"merchant_info":' .MerchantInfoTest::getJson() . ',"billing_info":' .BillingInfoTest::getJson() . ',"shipping_info":' .ShippingInfoTest::getJson() . ',"items":' .InvoiceItemTest::getJson() . ',"payment_term":' .PaymentTermTest::getJson() . ',"reference":"TestSample","discount":' .CostTest::getJson() . ',"shipping_cost":' .ShippingCostTest::getJson() . ',"custom":' .CustomAmountTest::getJson() . ',"allow_partial_payment":true,"minimum_amount_due":' .CurrencyTest::getJson() . ',"tax_calculated_after_discount":true,"tax_inclusive":true,"terms":"TestSample","note":"TestSample","merchant_memo":"TestSample","logo_url":"http://www.google.com","total_amount":' .CurrencyTest::getJson() . ',"attachments":' .FileAttachmentTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\TemplateData
    {
        return new TemplateData(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\TemplateData
    {
        $obj = new TemplateData(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getMerchantInfo());
        $this->assertNotNull($obj->getBillingInfo());
        $this->assertNotNull($obj->getShippingInfo());
        $this->assertNotNull($obj->getItems());
        $this->assertNotNull($obj->getPaymentTerm());
        $this->assertNotNull($obj->getReference());
        $this->assertNotNull($obj->getDiscount());
        $this->assertNotNull($obj->getShippingCost());
        $this->assertNotNull($obj->getCustom());
        $this->assertNotNull($obj->getAllowPartialPayment());
        $this->assertNotNull($obj->getMinimumAmountDue());
        $this->assertNotNull($obj->getTaxCalculatedAfterDiscount());
        $this->assertNotNull($obj->getTaxInclusive());
        $this->assertNotNull($obj->getTerms());
        $this->assertNotNull($obj->getNote());
        $this->assertNotNull($obj->getMerchantMemo());
        $this->assertNotNull($obj->getLogoUrl());
        $this->assertNotNull($obj->getTotalAmount());
        $this->assertNotNull($obj->getAttachments());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param TemplateData $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getMerchantInfo(), MerchantInfoTest::getObject());
        $this->assertEquals($obj->getBillingInfo(), BillingInfoTest::getObject());
        $this->assertEquals($obj->getShippingInfo(), ShippingInfoTest::getObject());
        $this->assertEquals($obj->getItems(), InvoiceItemTest::getObject());
        $this->assertEquals($obj->getPaymentTerm(), PaymentTermTest::getObject());
        $this->assertEquals($obj->getReference(), "TestSample");
        $this->assertEquals($obj->getDiscount(), CostTest::getObject());
        $this->assertEquals($obj->getShippingCost(), ShippingCostTest::getObject());
        $this->assertEquals($obj->getCustom(), CustomAmountTest::getObject());
        $this->assertEquals($obj->getAllowPartialPayment(), true);
        $this->assertEquals($obj->getMinimumAmountDue(), CurrencyTest::getObject());
        $this->assertEquals($obj->getTaxCalculatedAfterDiscount(), true);
        $this->assertEquals($obj->getTaxInclusive(), true);
        $this->assertEquals($obj->getTerms(), "TestSample");
        $this->assertEquals($obj->getNote(), "TestSample");
        $this->assertEquals($obj->getMerchantMemo(), "TestSample");
        $this->assertEquals($obj->getLogoUrl(), "http://www.google.com");
        $this->assertEquals($obj->getTotalAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getAttachments(), FileAttachmentTest::getObject());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage LogoUrl is not a fully qualified URL
     */
    public function testUrlValidationForLogoUrl(): void
    {
        $obj = new TemplateData();
        $obj->setLogoUrl(null);
    }
}

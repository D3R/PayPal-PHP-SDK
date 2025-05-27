<?php

namespace PayPal\Test\Api;

use PayPal\Api\FundingOption;
use PHPUnit\Framework\TestCase;

/**
 * Class FundingOption
 *
 * @package PayPal\Test\Api
 */
class FundingOptionTest extends TestCase
{
    /**
     * Gets Json String of Object FundingOption
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","funding_sources":' . FundingSourceTest::getJson() . ',"backup_funding_instrument":' . FundingInstrumentTest::getJson() . ',"currency_conversion":' . CurrencyConversionTest::getJson() . ',"installment_info":' . InstallmentInfoTest::getJson() . ',"links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return FundingOption
     */
    public static function getObject(): \PayPal\Api\FundingOption
    {
        return new FundingOption(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return FundingOption
     */
    public function testSerializationDeserialization(): \PayPal\Api\FundingOption
    {
        $obj = new FundingOption(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getFundingSources());
        $this->assertNotNull($obj->getBackupFundingInstrument());
        $this->assertNotNull($obj->getCurrencyConversion());
        $this->assertNotNull($obj->getInstallmentInfo());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param FundingOption $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getFundingSources(), FundingSourceTest::getObject());
        $this->assertEquals($obj->getBackupFundingInstrument(), FundingInstrumentTest::getObject());
        $this->assertEquals($obj->getCurrencyConversion(), CurrencyConversionTest::getObject());
        $this->assertEquals($obj->getInstallmentInfo(), InstallmentInfoTest::getObject());
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }
}

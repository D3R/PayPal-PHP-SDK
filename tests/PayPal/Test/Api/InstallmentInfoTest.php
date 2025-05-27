<?php

namespace PayPal\Test\Api;

use PayPal\Api\InstallmentInfo;
use PHPUnit\Framework\TestCase;

/**
 * Class InstallmentInfo
 *
 * @package PayPal\Test\Api
 */
class InstallmentInfoTest extends TestCase
{
    /**
     * Gets Json String of Object InstallmentInfo
     */
    public static function getJson(): string
    {
        return '{"installment_id":"TestSample","network":"TestSample","issuer":"TestSample","installment_options":' . InstallmentOptionTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\InstallmentInfo
    {
        return new InstallmentInfo(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\InstallmentInfo
    {
        $obj = new InstallmentInfo(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getInstallmentId());
        $this->assertNotNull($obj->getNetwork());
        $this->assertNotNull($obj->getIssuer());
        $this->assertNotNull($obj->getInstallmentOptions());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InstallmentInfo $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getInstallmentId(), "TestSample");
        $this->assertEquals($obj->getNetwork(), "TestSample");
        $this->assertEquals($obj->getIssuer(), "TestSample");
        $this->assertEquals($obj->getInstallmentOptions(), InstallmentOptionTest::getObject());
    }
}

<?php

namespace PayPal\Test\Api;

use PayPal\Api\AgreementStateDescriptor;
use PHPUnit\Framework\TestCase;

/**
 * Class AgreementStateDescriptor
 *
 * @package PayPal\Test\Api
 */
class AgreementStateDescriptorTest extends TestCase
{
    /**
     * Gets Json String of Object AgreementStateDescriptor
     */
    public static function getJson(): string
    {
        return '{"note":"TestSample","amount":' .CurrencyTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\AgreementStateDescriptor
    {
        return new AgreementStateDescriptor(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\AgreementStateDescriptor
    {
        $obj = new AgreementStateDescriptor(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getNote());
        $this->assertNotNull($obj->getAmount());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param AgreementStateDescriptor $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getNote(), "TestSample");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
    }
}

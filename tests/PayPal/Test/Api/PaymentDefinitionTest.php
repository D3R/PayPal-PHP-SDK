<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentDefinition;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentDefinition
 *
 * @package PayPal\Test\Api
 */
class PaymentDefinitionTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentDefinition
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","name":"TestSample","type":"TestSample","frequency_interval":"TestSample","frequency":"TestSample","cycles":"TestSample","amount":' .CurrencyTest::getJson() . ',"charge_models":' .ChargeModelTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\PaymentDefinition
    {
        return new PaymentDefinition(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\PaymentDefinition
    {
        $obj = new PaymentDefinition(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getFrequencyInterval());
        $this->assertNotNull($obj->getFrequency());
        $this->assertNotNull($obj->getCycles());
        $this->assertNotNull($obj->getAmount());
        $this->assertNotNull($obj->getChargeModels());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentDefinition $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getFrequencyInterval(), "TestSample");
        $this->assertEquals($obj->getFrequency(), "TestSample");
        $this->assertEquals($obj->getCycles(), "TestSample");
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getChargeModels(), ChargeModelTest::getObject());
    }
}

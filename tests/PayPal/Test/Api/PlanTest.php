<?php

namespace PayPal\Test\Api;

use PayPal\Api\Plan;
use PHPUnit\Framework\TestCase;

/**
 * Class Plan
 *
 * @package PayPal\Test\Api
 */
class PlanTest extends TestCase
{
    /**
     * Gets Json String of Object Plan
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","name":"TestSample","description":"TestSample","type":"TestSample","state":"TestSample","create_time":"TestSample","update_time":"TestSample","payment_definitions":' .PaymentDefinitionTest::getJson() . ',"terms":' .TermsTest::getJson() . ',"merchant_preferences":' .MerchantPreferencesTest::getJson() . ',"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\Plan
    {
        return new Plan(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\Plan
    {
        $obj = new Plan(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getDescription());
        $this->assertNotNull($obj->getType());
        $this->assertNotNull($obj->getState());
        $this->assertNotNull($obj->getCreateTime());
        $this->assertNotNull($obj->getUpdateTime());
        $this->assertNotNull($obj->getPaymentDefinitions());
        $this->assertNotNull($obj->getTerms());
        $this->assertNotNull($obj->getMerchantPreferences());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Plan $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getDescription(), "TestSample");
        $this->assertEquals($obj->getType(), "TestSample");
        $this->assertEquals($obj->getState(), "TestSample");
        $this->assertEquals($obj->getCreateTime(), "TestSample");
        $this->assertEquals($obj->getUpdateTime(), "TestSample");
        $this->assertEquals($obj->getPaymentDefinitions(), PaymentDefinitionTest::getObject());
        $this->assertEquals($obj->getTerms(), TermsTest::getObject());
        $this->assertEquals($obj->getMerchantPreferences(), MerchantPreferencesTest::getObject());
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     */
    public function testGet(\PayPal\Api\Plan $obj, ?\PHPUnit_Framework_MockObject_MockObject $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    PlanTest::getJson()
            ));

        $result = $obj->get("planId", $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     */
    public function testCreate(\PayPal\Api\Plan $obj, ?\PHPUnit_Framework_MockObject_MockObject $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     */
    public function testUpdate(\PayPal\Api\Plan $obj, ?\PHPUnit_Framework_MockObject_MockObject $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     */
    public function testList(\PayPal\Api\Plan $obj, ?\PHPUnit_Framework_MockObject_MockObject $mockApiContext): void
    {
        $mockPayPalRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    PlanListTest::getJson()
            ));
        $params = ParamsTest::getObject();

        $result = $obj->all($params, $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }

    public function mockProvider(): array
    {
        $obj = self::getObject();
        $mockApiContext = $this->getMockBuilder('ApiContext')
                    ->disableOriginalConstructor()
                    ->getMock();
        return [
            [$obj, $mockApiContext],
            [$obj, null]
        ];
    }
}

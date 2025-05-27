<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\WebhookEventTypeList;
use PayPal\Rest\ApiContext;
use PayPal\Api\WebhookEventType;
use PHPUnit\Framework\TestCase;

/**
 * Class WebhookEventType
 *
 * @package PayPal\Test\Api
 */
class WebhookEventTypeTest extends TestCase
{
    /**
     * Gets Json String of Object WebhookEventType
     */
    public static function getJson(): string
    {
        return '{"name":"TestSample","description":"TestSample","status":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\WebhookEventType
    {
        return new WebhookEventType(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\WebhookEventType
    {
        $obj = new WebhookEventType(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getDescription());
        $this->assertNotNull($obj->getStatus());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventType $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getDescription(), "TestSample");
        $this->assertEquals($obj->getStatus(), "TestSample");
    }

    /**
     * @dataProvider mockProvider
     */
    public function testSubscribedEventTypes(\PayPal\Api\WebhookEventType $obj, ?\PHPUnit_Framework_MockObject_MockObject $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    WebhookEventTypeListTest::getJson()
            ));

        $result = $obj->subscribedEventTypes("webhookId", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }

    /**
     * @dataProvider mockProvider
     */
    public function testAvailableEventTypes(\PayPal\Api\WebhookEventType $obj, ?\PHPUnit_Framework_MockObject_MockObject $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    WebhookEventTypeListTest::getJson()
            ));

        $result = $obj->availableEventTypes($mockApiContext, $mockPPRestCall);
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

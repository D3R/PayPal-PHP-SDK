<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\WebhookEventList;
use PHPUnit\Framework\TestCase;

/**
 * Class WebhookEventList
 *
 * @package PayPal\Test\Api
 */
class WebhookEventListTest extends TestCase
{
    /**
     * Gets Json String of Object WebhookEventList
     */
    public static function getJson(): string
    {
        return '{"events":' .WebhookEventTest::getJson() . ',"count":123,"links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\WebhookEventList
    {
        return new WebhookEventList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\WebhookEventList
    {
        $obj = new WebhookEventList(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getEvents());
        $this->assertNotNull($obj->getCount());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookEventList $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getEvents(), WebhookEventTest::getObject());
        $this->assertEquals($obj->getCount(), 123);
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }


}

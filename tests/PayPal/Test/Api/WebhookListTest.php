<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\WebhookList;
use PHPUnit\Framework\TestCase;

/**
 * Class WebhookList
 *
 * @package PayPal\Test\Api
 */
class WebhookListTest extends TestCase
{
    /**
     * Gets Json String of Object WebhookList
     */
    public static function getJson(): string
    {
        return '{"webhooks":' .WebhookTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\WebhookList
    {
        return new WebhookList(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\WebhookList
    {
        $obj = new WebhookList(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getWebhooks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param WebhookList $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getWebhooks(), WebhookTest::getObject());
    }


}

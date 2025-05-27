<?php

namespace PayPal\Test\Api;

use PayPal\Api\CancelNotification;
use PHPUnit\Framework\TestCase;

/**
 * Class CancelNotification
 *
 * @package PayPal\Test\Api
 */
class CancelNotificationTest extends TestCase
{
    /**
     * Gets Json String of Object CancelNotification
     */
    public static function getJson(): string
    {
        return '{"subject":"TestSample","note":"TestSample","send_to_merchant":true,"send_to_payer":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\CancelNotification
    {
        return new CancelNotification(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\CancelNotification
    {
        $obj = new CancelNotification(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getSubject());
        $this->assertNotNull($obj->getNote());
        $this->assertNotNull($obj->getSendToMerchant());
        $this->assertNotNull($obj->getSendToPayer());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param CancelNotification $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getSubject(), "TestSample");
        $this->assertEquals($obj->getNote(), "TestSample");
        $this->assertEquals($obj->getSendToMerchant(), true);
        $this->assertEquals($obj->getSendToPayer(), true);
    }
}

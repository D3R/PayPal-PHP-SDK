<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\TemplateSettingsMetadata;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateSettingsMetadata
 *
 * @package PayPal\Test\Api
 */
class TemplateSettingsMetadataTest extends TestCase
{
    /**
     * Gets Json String of Object TemplateSettingsMetadata
     */
    public static function getJson(): string
    {
        return '{"hidden":true}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\TemplateSettingsMetadata
    {
        return new TemplateSettingsMetadata(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\TemplateSettingsMetadata
    {
        $obj = new TemplateSettingsMetadata(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getHidden());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param TemplateSettingsMetadata $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getHidden(), true);
    }
}

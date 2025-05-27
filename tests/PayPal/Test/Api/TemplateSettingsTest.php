<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalModel;
use PayPal\Api\TemplateSettings;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateSettings
 *
 * @package PayPal\Test\Api
 */
class TemplateSettingsTest extends TestCase
{
    /**
     * Gets Json String of Object TemplateSettings
     */
    public static function getJson(): string
    {
        return '{"field_name":"TestSample","display_preference":' .TemplateSettingsMetadataTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\TemplateSettings
    {
        return new TemplateSettings(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\TemplateSettings
    {
        $obj = new TemplateSettings(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getFieldName());
        $this->assertNotNull($obj->getDisplayPreference());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param TemplateSettings $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getFieldName(), "TestSample");
        $this->assertEquals($obj->getDisplayPreference(), TemplateSettingsMetadataTest::getObject());
    }
}

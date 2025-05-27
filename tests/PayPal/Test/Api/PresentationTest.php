<?php

namespace PayPal\Test\Api;

use PayPal\Api\Presentation;
use PHPUnit\Framework\TestCase;

/**
 * Class Presentation
 *
 * @package PayPal\Test\Api
 */
class PresentationTest extends TestCase
{
    /**
     * Gets Json String of Object Presentation
     */
    public static function getJson(): string
    {
        return '{"brand_name":"TestSample","logo_image":"TestSample","locale_code":"TestSample","return_url_label":"TestSample","note_to_seller_label":"TestSample"}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\Presentation
    {
        return new Presentation(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\Presentation
    {
        $obj = new Presentation(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getBrandName());
        $this->assertNotNull($obj->getLogoImage());
        $this->assertNotNull($obj->getLocaleCode());
        $this->assertNotNull($obj->getReturnUrlLabel());
        $this->assertNotNull($obj->getNoteToSellerLabel());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Presentation $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getBrandName(), "TestSample");
        $this->assertEquals($obj->getLogoImage(), "TestSample");
        $this->assertEquals($obj->getLocaleCode(), "TestSample");
        $this->assertEquals($obj->getReturnUrlLabel(), "TestSample");
        $this->assertEquals($obj->getNoteToSellerLabel(), "TestSample");
    }


}

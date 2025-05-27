<?php

namespace PayPal\Test\Api;

use PayPal\Api\InputFields;
use PHPUnit\Framework\TestCase;

/**
 * Class InputFields
 *
 * @package PayPal\Test\Api
 */
class InputFieldsTest extends TestCase
{
    /**
     * Gets Json String of Object InputFields
     */
    public static function getJson(): string
    {
        return '{"allow_note":true,"no_shipping":123,"address_override":123}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\InputFields
    {
        return new InputFields(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\InputFields
    {
        $obj = new InputFields(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getAllowNote());
        $this->assertNotNull($obj->getNoShipping());
        $this->assertNotNull($obj->getAddressOverride());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param InputFields $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getAllowNote(), true);
        $this->assertEquals($obj->getNoShipping(), 123);
        $this->assertEquals($obj->getAddressOverride(), 123);
    }


}

<?php
namespace PayPal\Test\Common;

use PayPal\Api\Payment;
use PayPal\Common\PayPalModel;
use PayPal\Core\PayPalConfigManager;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{

    public function testSimpleClassConversion(): void
    {
        $o = new SimpleClass();
        $o->setName("test");
        $o->setDescription("description");

        $this->assertEquals("test", $o->getName());
        $this->assertEquals("description", $o->getDescription());

        $json = $o->toJSON();
        $this->assertEquals('{"name":"test","description":"description"}', $json);

        $newO = new SimpleClass();
        $newO->fromJson($json);
        $this->assertEquals($o, $newO);
    }

    public function testConstructorJSON(): void
    {
        $obj = new SimpleClass('{"name":"test","description":"description"}');
        $this->assertEquals($obj->getName(), "test");
        $this->assertEquals($obj->getDescription(), "description");
    }

    public function testConstructorArray(): void
    {
        $arr = ['name' => 'test', 'description' => 'description'];
        $obj = new SimpleClass($arr);
        $this->assertEquals($obj->getName(), "test");
        $this->assertEquals($obj->getDescription(), "description");
    }

    public function testConstructorNull(): void
    {
        $obj = new SimpleClass(null);
        $this->assertNotEquals($obj->getName(), "test");
        $this->assertNotEquals($obj->getDescription(), "description");
        $this->assertNull($obj->getName());
        $this->assertNull($obj->getDescription());
    }

    /**
     * @expectedException        \InvalidArgumentException
     * @expectedExceptionMessage Invalid JSON String
     */
    public function testConstructorInvalidInput(): void
    {
        new SimpleClass("Something that is not even correct");
    }

    public function testSimpleClassObjectConversion(): void
    {
        $json = '{"name":"test","description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        $this->assertEquals("test", $obj->getName());
        $this->assertEquals("description", $obj->getDescription());
    }

    public function testSimpleClassObjectInvalidConversion(): void
    {
        try {
            $json = '{"name":"test","description":"description","invalid":"value"}';

            $obj = new SimpleClass();
            $obj->fromJson($json);

            $this->assertEquals("test", $obj->getName());
            $this->assertEquals("description", $obj->getDescription());
        } catch (\PHPUnit_Framework_Error_Notice) {
            // No need to do anything
        }
    }

    /**
     * Test Case to determine if the unknown object is returned, it would not add that object to the model.
     */
    public function testUnknownObjectConversion(): void
    {
        PayPalConfigManager::getInstance()->addConfigs(['validation.level' => 'disabled']);
        $json = '{"name":"test","unknown":{ "id" : "123", "object": "456"},"description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        $this->assertEquals("test", $obj->getName());
        $this->assertEquals("description", $obj->getDescription());
        $resultJson = $obj->toJSON();
        $this->assertContains("unknown", $resultJson);
        $this->assertContains("id", $resultJson);
        $this->assertContains("object", $resultJson);
        $this->assertContains("123", $resultJson);
        $this->assertContains("456", $resultJson);
        PayPalConfigManager::getInstance()->addConfigs(['validation.level' => 'strict']);
    }

    /**
     * Test Case to determine if the unknown object is returned, it would not add that object to the model.
     */
    public function testUnknownArrayConversion(): void
    {
        PayPalConfigManager::getInstance()->addConfigs(['validation.level' => 'disabled']);
        $json = '{"name":"test","unknown":[{"object": { "id" : "123", "object": "456"}}, {"more": { "id" : "123", "object": "456"}}],"description":"description"}';

        $obj = new SimpleClass();
        $obj->fromJson($json);

        $this->assertEquals("test", $obj->getName());
        $this->assertEquals("description", $obj->getDescription());
        $resultJson = $obj->toJSON();
        $this->assertContains("unknown", $resultJson);
        $this->assertContains("id", $resultJson);
        $this->assertContains("object", $resultJson);
        $this->assertContains("123", $resultJson);
        $this->assertContains("456", $resultJson);
        PayPalConfigManager::getInstance()->addConfigs(['validation.level' => 'strict']);
    }

    public function testEmptyArrayConversion(): void
    {
        $json = '{"id":"PAY-5DW86196ER176274EKT3AEYA","transactions":[{"related_resources":[]}]}';
        $payment = new Payment($json);
        $result = $payment->toJSON();
        $this->assertContains('"related_resources":[]', $result);
        $this->assertNotNull($result);
    }

    public function testMultipleEmptyArrayConversion(): void
    {
        $json = '{"id":"PAY-5DW86196ER176274EKT3AEYA","transactions":[{"related_resources":[{},{}]}]}';
        $payment = new Payment($json);
        $result = $payment->toJSON();
        $this->assertContains('"related_resources":[{},{}]', $result);
        $this->assertNotNull($result);
    }

    public function testSetterMagicMethod(): void
    {
        $obj = new PayPalModel();
        $obj->something = "other";
        $obj->else = [];
        $obj->there = null;
        $obj->obj = '{}';
        $obj->objs = ['{}'];
        $this->assertEquals("other", $obj->something);
        $this->assertInternalType('array', $obj->else);
        $this->assertNull($obj->there);
        $this->assertEquals('{}', $obj->obj);
        $this->assertInternalType('array', $obj->objs);
        $this->assertEquals('{}', $obj->objs[0]);
    }

    public function testInvalidMagicMethodWithDisabledValidation(): void
    {
        PayPalConfigManager::getInstance()->addConfigs(['validation.level' => 'disabled']);
        $obj = new SimpleClass();
        try {
            $obj->invalid = "value2";
            $this->assertEquals($obj->invalid, "value2");
        } catch (\PHPUnit_Framework_Error_Notice) {
            $this->fail("It should not have thrown a Notice Error as it is disabled.");
        }
        PayPalConfigManager::getInstance()->addConfigs(['validation.level' => 'strict']);
    }

    public function testInvalidMagicMethodWithValidationLevel(): void
    {
        PayPalConfigManager::getInstance()->addConfigs(['validation.level' => 'log']);
        $obj = new SimpleClass();
        $obj->invalid2 = "value2";
        $this->assertEquals($obj->invalid2, "value2");
        PayPalConfigManager::getInstance()->addConfigs(['validation.level' => 'strict']);
    }

    public function testArrayClassConversion(): void
    {
        $o = new ArrayClass();
        $o->setName("test");
        $o->setDescription("description");
        $o->setTags(['payment', 'info', 'test']);

        $this->assertEquals("test", $o->getName());
        $this->assertEquals("description", $o->getDescription());
        $this->assertEquals(['payment', 'info', 'test'], $o->getTags());

        $json = $o->toJSON();
        $this->assertEquals('{"name":"test","description":"description","tags":["payment","info","test"]}', $json);

        $newO = new ArrayClass();
        $newO->fromJson($json);
        $this->assertEquals($o, $newO);
    }

    public function testNestedClassConversion(): void
    {
        $n = new ArrayClass();
        $n->setName("test");
        $n->setDescription("description");
        $o = new NestedClass();
        $o->setId('123');
        $o->setInfo($n);

        $this->assertEquals("123", $o->getId());
        $this->assertEquals("test", $o->getInfo()->getName());

        $json = $o->toJSON();
        $this->assertEquals('{"id":"123","info":{"name":"test","description":"description"}}', $json);

        $newO = new NestedClass();
        $newO->fromJson($json);
        $this->assertEquals($o, $newO);
    }
}

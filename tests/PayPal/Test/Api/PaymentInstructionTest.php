<?php

namespace PayPal\Test\Api;

use PayPal\Api\PaymentInstruction;
use PayPal\Transport\PPRestCall;
use PHPUnit\Framework\TestCase;

/**
 * Class PaymentInstruction
 *
 * @package PayPal\Test\Api
 */
class PaymentInstructionTest extends TestCase
{
    /**
     * Gets Json String of Object PaymentInstruction
     */
    public static function getJson(): string
    {
        return '{"reference_number":"TestSample","instruction_type":"TestSample","recipient_banking_instruction":' .RecipientBankingInstructionTest::getJson() . ',"amount":' .CurrencyTest::getJson() . ',"payment_due_date":"TestSample","note":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\PaymentInstruction
    {
        return new PaymentInstruction(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\PaymentInstruction
    {
        $obj = new PaymentInstruction(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getReferenceNumber());
        $this->assertNotNull($obj->getInstructionType());
        $this->assertNotNull($obj->getRecipientBankingInstruction());
        $this->assertNotNull($obj->getAmount());
        $this->assertNotNull($obj->getPaymentDueDate());
        $this->assertNotNull($obj->getNote());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param PaymentInstruction $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getReferenceNumber(), "TestSample");
        $this->assertEquals($obj->getInstructionType(), "TestSample");
        $this->assertEquals($obj->getRecipientBankingInstruction(), RecipientBankingInstructionTest::getObject());
        $this->assertEquals($obj->getAmount(), CurrencyTest::getObject());
        $this->assertEquals($obj->getPaymentDueDate(), "TestSample");
        $this->assertEquals($obj->getNote(), "TestSample");
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     */
    public function testGet(\PayPal\Api\PaymentInstruction $obj, ?\PHPUnit_Framework_MockObject_MockObject $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    PaymentInstructionTest::getJson()
            ));

        $result = $obj->get("paymentId", $mockApiContext, $mockPPRestCall);
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

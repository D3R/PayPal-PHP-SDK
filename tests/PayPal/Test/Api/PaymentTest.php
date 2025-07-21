<?php

namespace PayPal\Test\Api;

use PayPal\Api\Payment;
use PHPUnit\Framework\TestCase;

/**
 * Class Payment
 *
 * @package PayPal\Test\Api
 */
class PaymentTest extends TestCase
{
    /**
     * Gets Json String of Object Payment
     * @return string
     */
    public static function getJson(): string
    {
        return '{"id":"TestSample","intent":"TestSample","payer":' . PayerTest::getJson() . ',"potential_payer_info":' . PotentialPayerInfoTest::getJson() . ',"payee":' . PayeeTest::getJson() . ',"cart":"TestSample","transactions":[' . TransactionTest::getJson() . '],"failed_transactions":' . ErrorTest::getJson() . ',"billing_agreement_tokens":["TestSample"],"credit_financing_offered":' . CreditFinancingOfferedTest::getJson() . ',"payment_instruction":' . PaymentInstructionTest::getJson() . ',"state":"TestSample","experience_profile_id":"TestSample","note_to_payer":"TestSample","redirect_urls":' . RedirectUrlsTest::getJson() . ',"failure_reason":"TestSample","create_time":"TestSample","update_time":"TestSample","links":' . LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Payment
     */
    public static function getObject(): \PayPal\Api\Payment
    {
        return new Payment(self::getJson());
    }

    public function testGetToken_returnsNullIfApprovalLinkNull(): void
    {
        $payment = new Payment();
        $token = $payment->getToken();
        $this->assertNull($token);
    }

    public function testGetToken_returnsNullIfApprovalLinkDoesNotHaveToken(): void
    {
        $payment = new Payment('{"links": [ { "href": "https://api.sandbox.paypal.com/v1/payments//cgi-bin/webscr?cmd=_express-checkout", "rel": "approval_url", "method": "REDIRECT" } ]}');
        $token = $payment->getToken();
        $this->assertNull($token);
    }

    public function testGetToken_returnsNullIfApprovalLinkHasAToken(): void
    {
        $payment = new Payment('{"links": [ { "href": "https://api.sandbox.paypal.com/v1/payments//cgi-bin/webscr?cmd=_express-checkout&token=EC-60385559L1062554J", "rel": "approval_url", "method": "REDIRECT" } ]}');
        $token = $payment->getToken();
        $this->assertNotNull($token);
        $this->assertEquals($token, 'EC-60385559L1062554J');
    }

    /**
     * Tests for Serialization and Deserialization Issues
     * @return Payment
     */
    public function testSerializationDeserialization(): \PayPal\Api\Payment
    {
        $obj = new Payment(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getIntent());
        $this->assertNotNull($obj->getPayer());
        $this->assertNotNull($obj->getPotentialPayerInfo());
        $this->assertNotNull($obj->getPayee());
        $this->assertNotNull($obj->getCart());
        $this->assertNotNull($obj->getTransactions());
        $this->assertNotNull($obj->getFailedTransactions());
        $this->assertNotNull($obj->getBillingAgreementTokens());
        $this->assertNotNull($obj->getCreditFinancingOffered());
        $this->assertNotNull($obj->getPaymentInstruction());
        $this->assertNotNull($obj->getState());
        $this->assertNotNull($obj->getExperienceProfileId());
        $this->assertNotNull($obj->getNoteToPayer());
        $this->assertNotNull($obj->getRedirectUrls());
        $this->assertNotNull($obj->getFailureReason());
        $this->assertNotNull($obj->getCreateTime());
        $this->assertNotNull($obj->getUpdateTime());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Payment $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getIntent(), "TestSample");
        $this->assertEquals($obj->getPayer(), PayerTest::getObject());
        $this->assertEquals($obj->getPotentialPayerInfo(), PotentialPayerInfoTest::getObject());
        $this->assertEquals($obj->getPayee(), PayeeTest::getObject());
        $this->assertEquals($obj->getCart(), "TestSample");
        $this->assertEquals($obj->getTransactions(), [TransactionTest::getObject()]);
        $this->assertEquals($obj->getFailedTransactions(), ErrorTest::getObject());
        $this->assertEquals($obj->getBillingAgreementTokens(), ["TestSample"]);
        $this->assertEquals($obj->getCreditFinancingOffered(), CreditFinancingOfferedTest::getObject());
        $this->assertEquals($obj->getPaymentInstruction(), PaymentInstructionTest::getObject());
        $this->assertEquals($obj->getState(), "TestSample");
        $this->assertEquals($obj->getExperienceProfileId(), "TestSample");
        $this->assertEquals($obj->getNoteToPayer(), "TestSample");
        $this->assertEquals($obj->getRedirectUrls(), RedirectUrlsTest::getObject());
        $this->assertEquals($obj->getFailureReason(), "TestSample");
        $this->assertEquals($obj->getCreateTime(), "TestSample");
        $this->assertEquals($obj->getUpdateTime(), "TestSample");
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testCreate(\PayPal\Api\Payment $obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testGet(\PayPal\Api\Payment $obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    PaymentTest::getJson()
            ));

        $result = $obj->get("paymentId", $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testUpdate(\PayPal\Api\Payment $obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testExecute(\PayPal\Api\Payment $obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));
        $paymentExecution = PaymentExecutionTest::getObject();

        $result = $obj->execute($paymentExecution, $mockApiContext, $mockPPRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Payment $obj
     */
    public function testList(\PayPal\Api\Payment $obj, $mockApiContext): void
    {
        $mockPPRestCall = $this->getMockBuilder(\PayPal\Transport\PayPalRestCall::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockPPRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    PaymentHistoryTest::getJson()
            ));
        $params = [];

        $result = $obj->all($params, $mockApiContext, $mockPPRestCall);
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

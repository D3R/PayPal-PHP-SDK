<?php

namespace PayPal\Test\Api;

use PayPal\Api\AgreementTransactions;
use PHPUnit\Framework\TestCase;

/**
 * Class AgreementTransactions
 *
 * @package PayPal\Test\Api
 */
class AgreementTransactionsTest extends TestCase
{
    /**
     * Gets Json String of Object AgreementTransactions
     */
    public static function getJson(): string
    {
        return '{"agreement_transaction_list":' .AgreementTransactionTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     */
    public static function getObject(): \PayPal\Api\AgreementTransactions
    {
        return new AgreementTransactions(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     */
    public function testSerializationDeserialization(): \PayPal\Api\AgreementTransactions
    {
        $obj = new AgreementTransactions(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getAgreementTransactionList());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param AgreementTransactions $obj
     */
    public function testGetters($obj): void
    {
        $this->assertEquals($obj->getAgreementTransactionList(), AgreementTransactionTest::getObject());
    }
}

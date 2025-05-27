<?php
namespace PayPal\Test\Common;

use PayPal\Api\Amount;
use PayPal\Api\Currency;
use PayPal\Api\Details;
use PayPal\Api\InvoiceItem;
use PayPal\Api\Item;
use PayPal\Api\Tax;
use PayPal\Common\PayPalModel;
use PayPal\Converter\FormatConverter;
use PayPal\Test\Validation\NumericValidatorTest;
use PHPUnit\Framework\TestCase;

class FormatConverterTest extends TestCase
{

    public static function classMethodListProvider(): array
    {
        return [
            [new Item(), 'Price'],
            [new Item(), 'Tax'],
            [new Amount(), 'Total'],
            [new Currency(), 'Value'],
            [new Details(), 'Shipping'],
            [new Details(), 'SubTotal'],
            [new Details(), 'Tax'],
            [new Details(), 'Fee'],
            [new Details(), 'ShippingDiscount'],
            [new Details(), 'Insurance'],
            [new Details(), 'HandlingFee'],
            [new Details(), 'GiftWrap'],
            [new InvoiceItem(), 'Quantity'],
            [new Tax(), 'Percent']
        ];
    }

    public static function CurrencyListWithNoDecimalsProvider(): array
    {
        return [
            ['JPY'],
            ['TWD'],
            ['HUF']
        ];
    }

    /**
     * @return list<array>
     */
    public static function apiModelSettersProvider(): array
    {
        $provider = [];
        foreach (NumericValidatorTest::positiveProvider() as $value) {
            foreach (self::classMethodListProvider() as $method) {
                $provider[] = array_merge($method, [$value]);
            }
        }

        return $provider;
    }

    /**
     * @return list<array>
     */
    public static function apiModelSettersInvalidProvider(): array
    {
        $provider = [];
        foreach (NumericValidatorTest::invalidProvider() as $value) {
            foreach (self::classMethodListProvider() as $method) {
                $provider[] = array_merge($method, [$value]);
            }
        }

        return $provider;
    }

    /**
     *
     * @dataProvider \PayPal\Test\Validation\NumericValidatorTest::positiveProvider
     */
    public function testFormatToTwoDecimalPlaces($input, $expected): void
    {
        $result = FormatConverter::formatToNumber($input);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider CurrencyListWithNoDecimalsProvider
     */
    public function testPriceWithNoDecimalCurrencyInvalid(string $input): void
    {
        try {
            FormatConverter::formatToPrice("1.234", $input);
        } catch (\InvalidArgumentException $invalidArgumentException) {
            $this->assertContains("value cannot have decimals for", $invalidArgumentException->getMessage());
        }
    }

    /**
     * @dataProvider CurrencyListWithNoDecimalsProvider
     */
    public function testPriceWithNoDecimalCurrencyValid(string $input): void
    {
        $result = FormatConverter::formatToPrice("1.0000000", $input);
        $this->assertEquals("1", $result);
    }

    /**
     *
     * @dataProvider \PayPal\Test\Validation\NumericValidatorTest::positiveProvider
     */
    public function testFormatToNumber($input, $expected): void
    {
        $result = FormatConverter::formatToNumber($input);
        $this->assertEquals($expected, $result);
    }

    public function testFormatToNumberDecimals(): void
    {
        $result = FormatConverter::formatToNumber("0.0", 4);
        $this->assertEquals("0.0000", $result);
    }


    public function testFormat(): void
    {
        $result = FormatConverter::format("12.0123", "%0.2f");
        $this->assertEquals("12.01", $result);
    }

    /**
     * @dataProvider apiModelSettersProvider
     *
     * @param PayPalModel $class Class Object
     * @param string $method Method Name where the format is being applied
     * @param array $values array of ['input', 'expectedResponse'] is provided
     */
    public function testSettersOfKnownApiModel($class, string $method, array $values): void
    {
        $obj = new $class();
        $setter = "set" . $method;
        $getter = "get" . $method;
        $result = $obj->$setter($values[0]);
        $this->assertEquals($values[1], $result->$getter());
    }

    /**
     * @dataProvider apiModelSettersInvalidProvider
     * @expectedException \InvalidArgumentException
     */
    public function testSettersOfKnownApiModelInvalid($class, string $methodName, $values): void
    {
        $obj = new $class();
        $setter = "set" . $methodName;
        $obj->$setter($values[0]);
    }
}

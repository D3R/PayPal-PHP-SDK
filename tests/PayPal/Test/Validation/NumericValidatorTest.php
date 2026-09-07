<?php
namespace PayPal\Test\Validation;

use PayPal\Validation\NumericValidator;
use PHPUnit\Framework\TestCase;

class NumericValidatorTest extends TestCase
{

    public static function positiveProvider(): array
    {
        return [
            [".5", "0.50"],
            [".55", "0.55"],
            ["0", "0.00"],
            [null, null],
            ["01", "1.00"],
            ["01.1", "1.10"],
            ["10.0", "10.00"],
            ["0.0", "0.00"],
            ["00.00", "0.00"],
            ["000.111", "0.11"],
            ["000.0001", "0.00"],
            ["-0.001", "0.00"],
            ["-0", "0.00"],
            ["-00.00", "0.00"],
            ["-10.00", "-10.00"],
            ["", null],
            ["  ", null],
            [1.20, "1.20"]
        ];
    }

    public static function invalidProvider(): array
    {
        return [
            ["01.j"],
            ["j.10"],
            ["empty"],
            ["null"]
        ];
    }

    /**
     *
     * @dataProvider positiveProvider
     */
    public function testValidate(string|float|null $input): void
    {
        $this->assertTrue(NumericValidator::validate($input, "Test Value"));
    }

    /**
     *
     * @dataProvider invalidProvider
     * @expectedException \InvalidArgumentException
     */
    public function testValidateException(string $input): void
    {
        NumericValidator::validate($input, "Test Value");
    }
}

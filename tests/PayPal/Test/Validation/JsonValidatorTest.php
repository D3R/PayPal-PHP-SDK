<?php
namespace PayPal\Test\Validation;

use PayPal\Validation\JsonValidator;
use PHPUnit\Framework\TestCase;

class JsonValidatorTest extends TestCase
{

    public static function positiveProvider(): array
    {
        return [
            [null],
            [''],
            ["{}"],
            ['{"json":"value", "bool":false, "int":1, "float": 0.123, "array": [{"json":"value", "bool":false, "int":1, "float": 0.123},{"json":"value", "bool":false, "int":1, "float": 0.123} ]}']
        ];
    }

    public static function invalidProvider(): array
    {
        return [
            ['{'],
            ['}'],
            ['     '],
            [['1' => '23']],
            ['{"json":"value, "bool":false, "int":1, "float": 0.123, "array": [{"json":"value, "bool":false, "int":1, "float": 0.123}"json":"value, "bool":false, "int":1, "float": 0.123} ]}']
        ];
    }

    /**
     *
     * @dataProvider positiveProvider
     */
    public function testValidate(?string $input): void
    {
        $this->assertTrue(JsonValidator::validate($input));
    }

    /**
     *
     * @dataProvider invalidProvider
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidJson(string|array $input): void
    {
        JsonValidator::validate($input);
    }

    /**
     *
     * @dataProvider invalidProvider
     */
    public function testInvalidJsonSilent(string|array $input): void
    {
        $this->assertFalse(JsonValidator::validate($input, true));
    }
}

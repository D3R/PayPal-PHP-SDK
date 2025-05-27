<?php
namespace PayPal\Test\Validation;

use PayPal\Validation\UrlValidator;
use PHPUnit\Framework\TestCase;

class UrlValidatorTest extends TestCase
{

    public static function positiveProvider()
    {
        return [
            ["https://www.paypal.com"],
            ["http://www.paypal.com"],
            ["https://paypal.com"],
            ["https://www.paypal.com/directory/file"],
            ["https://www.paypal.com/directory/file?something=1&other=true"],
            ["https://www.paypal.com?value="],
            ["https://www.paypal.com/123123"],
            ["https://www.subdomain.paypal.com"],
            ["https://www.sub-domain-with-dash.paypal-website.com"],
            ["https://www.paypal.com?value=space%20separated%20value"],
            ["https://www.special@character.com"],
        ];
    }

    public static function invalidProvider()
    {
        return [
            ["www.paypal.com"],
            [""],
            [null],
            ["https://www.sub_domain_with_underscore.paypal.com"],
        ];
    }

    /**
     *
     * @dataProvider positiveProvider
     */
    public function testValidate($input)
    {
        UrlValidator::validate($input, "Test Value");
    }

    /**
     *
     * @dataProvider invalidProvider
     * @expectedException \InvalidArgumentException
     */
    public function testValidateException($input)
    {
        UrlValidator::validate($input, "Test Value");
    }
}

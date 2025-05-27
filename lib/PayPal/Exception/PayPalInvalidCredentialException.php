<?php

namespace PayPal\Exception;

/**
 * Class PayPalInvalidCredentialException
 *
 * @package PayPal\Exception
 */
class PayPalInvalidCredentialException extends \Exception
{

    /**
     * Default Constructor
     *
     * @param string|null $message
     * @param int  $code
     */
    public function __construct($message = null, $code = 0)
    {
        parent::__construct($message, $code);
    }

    /**
     * prints error message
     */
    public function errorMessage(): string
    {
        return 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
            . ': <b>' . $this->getMessage() . '</b>';
    }
}

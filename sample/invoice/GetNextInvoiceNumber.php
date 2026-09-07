<?php

// # Get Next Invoice Number Sample
// This sample code demonstrate how you can retrieve
// the next invoice number.

require __DIR__ . '/../bootstrap.php';
use PayPal\Api\Invoice;

// ### Get Next Invoice Number
// To generate the successive invoice number for the merchant, use below code.
// (See bootstrap.php for more on `ApiContext`)
try {
    $number = Invoice::generateNumber($apiContext);
} catch (Exception $exception) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Get Next Invoice Number", "InvoiceNumber", null, null, $exception);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
 ResultPrinter::printResult("Get Next Invoice Number", "InvoiceNumber", null, $number, $number);

return $number;

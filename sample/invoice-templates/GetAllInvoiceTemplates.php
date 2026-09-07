<?php

use PayPal\Api\Templates;

require __DIR__ . '/CreateInvoiceTemplate.php';

try {
    $templates = Templates::getAll(["fields" => "all"], $apiContext);
}  catch (Exception $exception) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Get all Templates", "Templates", null, null, $exception);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
ResultPrinter::printResult("Get all Templates", "Templates", null, null, $templates);

return $templates;

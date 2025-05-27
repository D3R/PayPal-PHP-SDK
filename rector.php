<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/lib',
        __DIR__ . '/sample',
        __DIR__ . '/tests',
    ])
    ->withPhpSets(
        php84: true
    )
    ->withComposerBased(
        phpunit: true
    )
     ->withPreparedSets(
        typeDeclarations: true,
    )
    ;

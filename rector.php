<?php

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/app/Controllers',
        __DIR__ . '/app/Filters',
        __DIR__ . '/tests',
    ])
    ->withRootFiles()
    ->withPreparedSets(naming: true)
    ->withPhpSets(php82: true)
    ->withComposerBased(phpunit: true)
    ->withImportNames();
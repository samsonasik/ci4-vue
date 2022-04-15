<?php

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([
        SetList::NAMING,
        LevelSetList::UP_TO_PHP_73,
    ]);

    $rectorConfig->paths([
        __DIR__ . '/app/Controllers',
        __DIR__ . '/app/Filters',
        __DIR__ . '/tests',
        __DIR__ . '/rector.php',
    ]);
    $rectorConfig->importNames();
};

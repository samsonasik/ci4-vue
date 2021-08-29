<?php

use CodeIgniter\CodingStandard\CodeIgniter4;
use Nexus\CsConfig\Factory;
use PhpCsFixer\Finder;

$finder = Finder::create()
    ->files()
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/data',
        __DIR__ . '/public',
    ])
    ->exclude(['Views']);

$options = [
    'finder' => $finder,
];

return Factory::create(new CodeIgniter4(), [], $options)->forProjects();
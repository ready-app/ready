<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('storage')
    ->exclude('config')
    ->exclude('routes')
    ->exclude('lang')
    ->exclude('bootstrap')
    ->in(__DIR__);

$config = new PhpCsFixer\Config();

return $config->setRules([
    '@PSR12' => true,
    'braces' => [
        'position_after_functions_and_oop_constructs' => 'same',
        'position_after_control_structures' => 'same'
    ],
    'single_trait_insert_per_statement' => false,
    'array_syntax' => [
        'syntax' => 'short'
    ],
    'no_blank_lines_after_class_opening' => false
])->setFinder($finder);

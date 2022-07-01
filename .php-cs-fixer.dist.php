<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('storage')
    ->exclude('config')
    ->exclude('routes')
    ->exclude('lang')
    ->exclude('bootstrap')
    ->exclude('node_modules')
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
    'no_blank_lines_after_class_opening' => false,
    'new_with_braces' => [
        'anonymous_class' => false
    ]
])->setFinder($finder);

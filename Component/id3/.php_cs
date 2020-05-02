<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ .DIRECTORY_SEPARATOR.'src');

$pcf = PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        '@Symfony' => true,
        'ordered_imports' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => [
            'operators' => [
                '=>' => 'align_single_space_minimal'
            ],
        ],
        'linebreak_after_opening_tag' => true,
        'no_superfluous_phpdoc_tags' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'phpdoc_order' => true,
        'semicolon_after_instruction' => true,
    ])
    ->setFinder($finder)
;

return $pcf;
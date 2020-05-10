<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude(__DIR__.'/vendor')
//    ->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        '@PHP73Migration' => true,
        '@PHP71Migration:risky' => true,
        'binary_operator_spaces' => [
            'operators' => ['=' => 'align_single_space_minimal']
        ],
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder($finder)
    ;
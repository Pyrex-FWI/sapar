<?php
#https://mlocati.github.io/php-cs-fixer-configurator

$finder = PhpCsFixer\Finder::create()
    ->exclude(__DIR__.'/vendor')
//    ->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHP73Migration' => true,
        '@PHP71Migration:risky' => true,
        'binary_operator_spaces' => [
            'operators' => [
                '=' => 'align_single_space_minimal',
                '=>' => 'align_single_space_minimal'
            ]
        ],
        'header_comment' => [
            'commentType' => 'PHPDoc',
            'header' => 'This file is part of the Sapar project.
@author Christophe Pyree <pyrex-fwi[at]gmail.com>'
        ],
        'no_useless_else' => true,
        'no_useless_return' => true,
        'phpdoc_order' => true,
        'semicolon_after_instruction' => true,

    ])
    ->setFinder($finder)
    ;
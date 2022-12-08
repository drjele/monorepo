<?php

$header = 'Copyright (c) Adrian Jeledintan';

$finder = (new PhpCsFixer\Finder())
    ->in(
        [
            __DIR__ . '/libraries/*/src/',
            __DIR__ . '/projects/*/bin/',
            __DIR__ . '/projects/*/config/',
            __DIR__ . '/projects/*/migrations/',
            __DIR__ . '/projects/*/public/',
            __DIR__ . '/projects/*/src/',
            __DIR__ . '/projects/*/tests/',
        ]
    );

return (new PhpCsFixer\Config())
    ->setRules(
        [
            '@Symfony' => true,
            '@Symfony:risky' => true,
            'header_comment' => ['header' => $header],
            'concat_space' => ['spacing' => 'one'],
            'global_namespace_import' => ['import_classes' => true],
            'native_constant_invocation' => ['include' => ['@all'], 'strict' => true],
            'native_function_invocation' => ['include' => ['@all'], 'strict' => true],
            'single_line_throw' => false,
            'cast_spaces' => ['space' => 'none'],
            'declare_strict_types' => true,
            'strict_comparison' => true,
            'strict_param' => true,
        ]
    )
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setFinder($finder);

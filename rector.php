<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;

$rectorConfig = RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withPhpSets(true)
    ->withSets([
        SetList::PHP_80,
        SetList::PHP_81,
        SetList::PHP_82,
        SetList::PHP_83,
        SetList::DEAD_CODE,
        SetList::CODE_QUALITY,
        SetList::TYPE_DECLARATION,
    ])
    ->withImportNames(removeUnusedImports: true)
    ->withPreparedSets(
        $deadCode = true,
        $codeQuality = true,
        $codingStyle = false,
        $typeDeclarations = true,
    );

    return $rectorConfig;

<?php

$finder = (new PhpCsFixer\Finder())->in(__DIR__)
    ->exclude(['vendor']);

$config = require_once "../../../../dev/shared/.php-cs-fixer.config.php";

return $config->setFinder($finder);

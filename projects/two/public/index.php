<?php

declare(strict_types=1);

/*
 * Copyright (c) Adrian Jeledintan
 */

use Monorepo\Two\Kernel;

require_once \dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool)$context['APP_DEBUG']);
};

<?php

$file = __DIR__ . '/../vendor/autoload.php';
echo $file;
if (!file_exists($file)) {
    throw new RuntimeException('Install dependencies to run test suite. "composer install"');
}
require_once $file;

<?php
$file = __DIR__ . '../src/vendor/autoload.php';
if (!file_exists($file)) {
    throw new RuntimeException('Install dependencies to run test suite. "composer install --dev"');
}
require_once $file;

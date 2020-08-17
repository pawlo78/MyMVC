<?php
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/helpers.php';

$dotenv = Dotenv::create(__DIR__ . '/../');
$dotenv->load();
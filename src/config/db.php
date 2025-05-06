<?php
require 'vendor/autoload.php';

use Medoo\Medoo;

$database = new Medoo([
    'type' => 'mysql',
    'host' => getenv('DB_HOST'),
    'database' => getenv('DB_NAME'),
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASS'),
]);
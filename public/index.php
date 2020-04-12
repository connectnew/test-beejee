<?php

require_once __DIR__ . '/../vendor/autoload.php';

$config = require(__DIR__ . '/../config/web.php');

session_start();

(new App\Main\Core($config, __DIR__ . '/../'))->run();
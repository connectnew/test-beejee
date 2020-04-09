<?php

require_once __DIR__ . '/../vendor/autoload.php';

$config = require(__DIR__ . '/../config/web.php');

session_start();

// new App\Main\Database();

//use Illuminate\Database\Capsule\Manager as Capsule;
//
//$capsule = new Capsule;
//$capsule->addConnection([
//    'driver' => 'mysql',
//    'host' => '172.20.0.2',
//    'port' => '3306',
//    'database' => 'beejee',
//    'username' => 'root',
//    'password' => 1234567,
//    'charset' => 'utf8',
//    'collation' => 'utf8_unicode_ci',
//    'prefix' => '',
//]);
//
//use Illuminate\Events\Dispatcher;
//use Illuminate\Container\Container;
//$capsule->setEventDispatcher(new Dispatcher(new Container));
//
//$capsule->setAsGlobal();
//$capsule->bootEloquent();
//
//$users = Capsule::table('user')->get();
//
//var_dump($users); exit();

(new App\Main\Core($config, __DIR__ . '/../'))->run();

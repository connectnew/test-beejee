<?php

namespace App\Main;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database
{
    protected static $capsule;

    public function __construct() {}

    public static function connect(): void
    {
        $db = Param::get('db');

        $capsule = new Capsule();
        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => $db['mysql']['host'],
            'port' => $db['mysql']['port'],
            'database' => $db['mysql']['dbname'],
            'username' => $db['mysql']['username'],
            'password' => $db['mysql']['password'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        self::setCapsule($capsule);
    }

    public static function setCapsule(Capsule $capsule): void
    {
        self::$capsule = $capsule;
    }

    public static function getCapsule(): Capsule
    {
        return self::$capsule;
    }
}

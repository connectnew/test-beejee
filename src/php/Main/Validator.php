<?php

namespace App\Main;

use Illuminate\Validation;
use Illuminate\Translation;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Validation\DatabasePresenceVerifier;
use Exception;

class Validator
{
    private $factory;

    public function __construct()
    {
        $dbCapsule = Database::getCapsule();
        $dbManage = $dbCapsule->getDatabaseManager();
        $dbVerifier = new DatabasePresenceVerifier($dbManage);

        $this->factory = new Validation\Factory(
            $this->loadTranslator()
        );
        $this->factory->setPresenceVerifier($dbVerifier);
    }

    protected function loadTranslator()
    {
        $config = Param::get('config');
        $baseDir = Param::get('baseDir');
        $path = $baseDir . $config['lang'];
        $locale = 'ru';

        if (!is_dir($path)) {
            throw new Exception("Validator: folder $path not exist!");
        }

        $filesystem = new Filesystem();
        $loader = new Translation\FileLoader($filesystem, $path);

        $loader->addNamespace('lang', dirname(dirname(__FILE__)) . '/../lang');
        $loader->load($locale, 'validation', 'lang');

        return new Translation\Translator($loader, $locale);
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this->factory, $method], $args);
    }
}

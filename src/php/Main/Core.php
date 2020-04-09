<?php

namespace App\Main;

use Illuminate\Http\Request;

class Core
{
    protected static $config;
    protected static $baseDir;

    public function __construct($config, $baseDir)
    {
        self::$config = $config;
        self::$baseDir = $baseDir;

        self::setParam();
        Database::connect();
    }

    public function run(): void
    {
        $baseDir = self::$baseDir;
        $modules = self::$config['modules'];
        $route = Param::get('route');

        $uri = $this->getValidUri();
        if (isset($route[$uri])) {
            $route = $route[$uri];
            $routeArr = explode("/", $route['path']);
        } else {
            $routeArr = explode("/", $uri);
        }

        if (count($routeArr) > 2) {
            $route = [];
            $route['module'] = $routeArr[0];
            $route['moduleClass'] = ucfirst($route['module']);
            $route['controller'] = ucfirst($routeArr[1]) . "Controller";
            $route['action'] = $routeArr[2];

            $controllerPath = "{$baseDir}{$modules}/{$route['moduleClass']}/Controllers/{$route['controller']}.php";
            $controllerClass = "\App\Modules\\{$route['moduleClass']}\Controllers\\{$route['controller']}";

            if (is_file($controllerPath)) {
                require_once $controllerPath;

                $controller = new $controllerClass;
                if ($controller instanceof Controller) {
                    $action = $route['action'];
                    if (method_exists($controller, $action)) {
                        $controller->$action(new Request($_REQUEST));
                    }
                }
            }
        }
    }

    protected function getValidUri(): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uriCount = strlen($uri);
        $isParam = strpos($uri, "?");

        if ($uri[0] == "/" && $uriCount > 1) {
            $uri = substr($uri, 1, $uriCount);
        }

        if ($isParam !== false) {
            $uri = substr($uri, 0, $isParam - 1);
            if ($uri === '') {
                $uri = '/';
            }
        }

        return $uri;
    }

    protected static function setParam(): void
    {
        Param::set('baseDir', self::$baseDir);
        Param::set('config', self::$config);

        if (self::$config['file']) {
            foreach(self::$config['file'] as $key => $file) {
                $path = self::$baseDir . $file;
                if (is_file($path)) {
                    Param::set($key, require_once $path);
                }
            }
        }
    }
}
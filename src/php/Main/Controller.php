<?php

namespace App\Main;

use Jenssegers\Blade\Blade;

class Controller
{
    protected $blade;

    public function __construct()
    {
        $this->setBlade();
    }

    protected function setBlade(): void
    {
        $config = Param::get('config');
        $baseDir = Param::get('baseDir');

        $views = $baseDir . $config['blade']['views'];
        $cache = $baseDir . $config['blade']['cache'];

        $this->blade = new Blade($views, $cache);
    }

    public function validator()
    {
        $validator = new Validator();

        return $validator;
    }

    public function render($view, $param)
    {
        return $this->blade->render($view, $param);
    }
}
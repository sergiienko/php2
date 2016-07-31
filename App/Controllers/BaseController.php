<?php

namespace App\Controllers;

use App\View;

abstract class BaseController
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($name)
    {
        $methodName = 'action' . $name;

        return $this->$methodName();
    }
}
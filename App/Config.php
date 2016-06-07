<?php

namespace App;


class Config
{
    use Singleton;

    public $data;
    
    protected function __construct() {
        $this->data = require(APP_ROOT . '/config.php');
    }
}
<?php

namespace App;

trait Accessor
{
    protected $data = [];

    /**
     * Sets inaccessible properties.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }


    /**
     * Returns property from data array.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
}

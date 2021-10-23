<?php

namespace App;

class Figure
{
    private $name;
    private $base = 0;
    private $height = 0;
    private $area = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function get($key)
    {
        return $this->$key;
    }

    public function set($key, $value)
    {
        $this->{$key} = $value;
    }

    public function jsonSerialize()
    {
        $objectArray = [];
        foreach ($this as $key => $value) {
            $objectArray[$key] = $value;
        }

        return json_encode($objectArray);
    }

    public function __destruct()
    {
    }
}

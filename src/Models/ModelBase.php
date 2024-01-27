<?php
namespace App\Models;

Trait ModelBase {

    private $property = [];
    function __construct()
    {
        $this->table = str_replace('Model', '', str_replace(__NAMESPACE__.'\\','',__CLASS__));
    }

    public function __get(string $name):mixed
    {
        if (array_key_exists($name, $this->property))
            return $this->property[$name];
        else return "undefined";
    }

    public function __set(string $name, mixed $value):void
    {
        $this->property[$name] = $value;
    }
}
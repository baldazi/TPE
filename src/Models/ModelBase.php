<?php
namespace App\Models;

Trait ModelBase {
    function __construct()
    {
        $this->table = str_replace('Model', '', str_replace(__NAMESPACE__.'\\','',__CLASS__));
    }
}
<?php
namespace App\Core;

require_once(ROOT.'/src/Core/libs/Smarty.class.php');

use Smarty;

class SmartySingleton extends Smarty{
    static private $instance;

    function __construct(){
        
        parent::__construct();
        $this->setTemplateDir(ROOT.'/src/templates/');
        $this->setCompileDir(ROOT.'/src/templates_c/');
        $this->setConfigDir(ROOT.'/src/configs/');
        $this->setCacheDir(ROOT.'/src/cache/');
    }

    static function getInstance(){
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
}
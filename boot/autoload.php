<?php

spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadClass");

function autoloadModel($className) {
    if (file_exists(ROOT.DS.'core'.DS.strtolower($className).'.class.php')) {
        require_once ROOT.DS.'core'.DS.strtolower($className).'.class.php';
    }
}

function autoloadController($className) {
    if (file_exists(ROOT.DS.'app'.DS.'controllers'.DS.strtolower($className).'.php')) {
        require_once ROOT.DS.'app'.DS.'controllers'.DS.strtolower($className).'.php';
    }
}

function autoloadClass($className) {
if (file_exists(ROOT.DS.'app'.DS.'models'.DS.strtolower($className).'.php')) {
        require_once ROOT.DS.'app'.DS.'models'.DS.strtolower($className).'.php';
    }
}

require ROOT.DS.'vendor'.DS.'autoload.php';
//require './../vendor/autoload.php';
use HelloWorld\SayHello;

echo SayHello::world();

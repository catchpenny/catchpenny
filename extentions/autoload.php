<?php

spl_autoload_register("autoloadExtentions");

function autoloadExtentions($className) {
if (file_exists(ROOT.DS.'Extentions'.DS.$className.DS.$className.'.Extention.php')) {
        require_once ROOT.DS.'Extentions'.DS.$className.DS.$className.'.Extention.php';
    }
}

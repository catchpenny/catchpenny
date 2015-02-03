<?php

spl_autoload_register("autoloadExtentions");

function autoloadExtentions($className) {
if (file_exists(ROOT.DS.'Extentions'.DS.ucwords($className).DS.ucwords($className).'.Extention.php')) {
        require_once ROOT.DS.'Extentions'.DS.ucwords($className).DS.ucwords($className).'.Extention.php';
    }
}

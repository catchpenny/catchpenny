<?php
/*
 * Index page
 *
 * Todo:
 * Url defination to be moved and without the use of /kitchen/ or str_replace
 *
 */

//Define Directory Separator
define('DS', DIRECTORY_SEPARATOR);

//Define Root Directory Path
define('ROOT', dirname(dirname(__FILE__)));

//Define Install Folder
define('INSTALL_FOLDER', '/catchpenny/');

//Call Bootstrap
require_once ROOT.DS.'boot'.DS.'bootstrap.php';

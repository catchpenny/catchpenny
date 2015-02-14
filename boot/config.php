<?php
 /*
  * Configuration Setting File
  * for the website
  */

//Development Enviourment Setting
define('DEVELOPMENT_ENVIRONMENT', true);

//Sql Database Setting
define('DB_NAME'    , 'catchpenny');
define('DB_USER'    , 'root');
define('DB_PASSWORD', 'toor');
define('DB_HOST'    , 'localhost');
define('DB_PREFIX'  , 'BV');
//paginate limit
define('PAGINATE_LIMIT', '5');



//Define Install Folder leave blank eg '', if in www folder
define('INSTALL_FOLDER', '/catchpenny');
//define Default theme
define('THEME'         , 'sentient');
//view eg: www/app/view
define('VIEW'          , ROOT.DS.'app'.DS.'views');
//BASE PATH eg: http://example.com/
define('BASE_PATH'     , "http://".$_SERVER['HTTP_HOST'].INSTALL_FOLDER.'/');
//Extension Path eg: www/extension
define('EXT_PATH'      , ROOT.DS.'extensions');


//Define Url
$url = str_ireplace(INSTALL_FOLDER, "", $_SERVER["REQUEST_URI"]);
$url = ltrim($url,'/');
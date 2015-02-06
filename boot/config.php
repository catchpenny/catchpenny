<?php
 /*
  * Configuration Setting File
  *
  * Todo:
  * support for redis database
  *
  */

//Development Enviourment Setting
define('DEVELOPMENT_ENVIRONMENT', true);

//Sql Database Setting
define('DB_NAME', 'catchpenny');
define('DB_USER', 'root');
define('DB_PASSWORD', 'toor');
define('DB_HOST', 'localhost');
define('DB_PREFIX', 'BV');
//paginate limit
define('PAGINATE_LIMIT', '5');

//Define Url
$url = str_ireplace(INSTALL_FOLDER, "", $_SERVER["REQUEST_URI"]);

//Define Paths
//define Default theme
define('THEME', 'sentient');
//BASE PATH
define('BASE_PATH', "http://".$_SERVER['SERVER_NAME'].INSTALL_FOLDER);
//Extension Path
define('EXT_PATH', ROOT.DS.'extensions');

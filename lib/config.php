<?php

// PHP Grid database connection settings
// define("PHPGRID_DBTYPE","mysqli"); // or mysqli
// define("PHPGRID_DBHOST","www.medicavial.net");
// define("PHPGRID_DBUSER","medica_weburs");
// define("PHPGRID_DBPASS","tosnav50");
// define("PHPGRID_DBNAME","medica_registromv");

// define("PHPGRID_AUTOCONNECT",0);

// define("PHPGRID_LIBPATH",dirname(__FILE__).DIRECTORY_SEPARATOR."lib".DIRECTORY_SEPARATOR);

$db_conf = array();
$db_conf["type"] = "mysqli";
$db_conf["server"] = "localhost"; // or your mysql ip
$db_conf["user"] = "medica_weburs"; // username
$db_conf["password"] = "tosnav50"; // password
$db_conf["database"] = "medica_registromv"; // database
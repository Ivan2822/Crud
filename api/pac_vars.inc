<?php
$host	="localhost";
$user	="root";
$pwd	="";
$db	="eventos";
$conn=mysql_connect($host,$user,$pwd) or die('Error al conectar: ' . mysql_error());
mysql_select_db($db,$conn);


date_default_timezone_set('America/Mexico_City');

?>
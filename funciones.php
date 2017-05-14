<?php
$ruta = "Location: http://localhost/eluniversalexamen-master/";
function conectarBD()
{
	$dbhost = 'localhost';
	$dbuser = "root";
	$dbpass = ""  ;	
	error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Ocurrio un error al conectarse al servidor mysql');
	
	$dbname = "examen_el_universal";
	//$dbname = "examenA";
	mysql_select_db($dbname,$conn);
}

?>
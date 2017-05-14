<?php
include("funciones.php");
if(!isset($_REQUEST['idN']) || $_REQUEST['idN']=="")
	header($ruta . "index.php");
	
	conectarBD();
	$qry = "delete from nota where idnota=". $_REQUEST['idN'];
	mysql_query($qry) or die("No fue posible eliminar el archivo");
	mysql_close();
	header($ruta . "index.php");

?>

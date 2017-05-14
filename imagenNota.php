<?php
include("funciones.php");

conectarBD();
$qry = "Select * from nota where idnota=" . $_REQUEST['idN'];
$rs = mysql_query($qry) or 
	die("No fue posible recueprar el archivo. Error: " . mysql_error());
$archivo = mysql_fetch_object($rs);

header("Content-type:" . $archivo->tipo);
//header("Content-Disposition: attachment; filename=\"" . $archivo->nombreArchivo . "\"");
echo $archivo->imagen;

mysql_close();

?>
<?php
if(sizeof($_FILES)==0) 
{
	echo "No fue posible cargar el archivo al servidor";
	exit();
}
include("funciones.php");
$archivo = $_FILES['imagenSeleccionada']['tmp_name'];
$tamanio = $_FILES['imagenSeleccionada']['size'];
$tipo = $_FILES['imagenSeleccionada']['type'];
$nombre_archivo = $_FILES['imagenSeleccionada']['name'];
extract($_POST); 
if($archivo!="none")
{
	$fp = fopen($archivo, "rb");
	$contenido = fread($fp, $tamanio);
	$contenido = addslashes($contenido);
	fclose($fp);
	/*$qry = "insert into nota (titulo, imagen, nombreImagen, tipo, tamanio, seccion, fecha,resumen,cuerpo,video) 
			values ('txtTitulo','$contenido','$nombre_archivo', '$tipo', '$tamanio', '$txtSeccion', '$txtFecha','$txtResumen','$txtCuerpo','$txtUrl')";*/
	$qry = "insert into nota (titulo, imagen, seccion, fechaDePublicacion,resumen,body,video) 
			values ('$txtTitulo','$contenido', '$txtSeccion', '$txtFecha','$txtResumen','$txtCuerpo','$txtUrl')";
	conectarBD();
	mysql_query($qry) or
		die("No fue posible guardar el archivo en la BD. Error:" . mysql_error());
	mysql_close();
	header($ruta ."index.php");	
}
?>
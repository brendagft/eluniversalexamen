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
$nombreImagen = $_FILES['imagenSeleccionada']['name'];
echo "PRUEBA: ".$_POST['idN'];
extract($_POST); 
echo "PRUEBA: ".$_POST['idN'];
if($archivo!="none")
{
	$fp = fopen($archivo, "rb");
	$contenido = fread($fp, $tamanio);
	$contenido = addslashes($contenido);
	fclose($fp);
	
	$qry = "update nota set titulo = '$txtTitulo',imagen = '$contenido',nombreImagen = '$nombreImagen', tipo = '$tipo', tamanio = '$tamanio', seccion = '$txtSeccion', fecha = '$txtFecha', resumen = '$txtResumen', cuerpo = '$txtCuerpo', video = '$txtUrl' where idnota = ".$idN;
	
	conectarBD();
	mysql_query($qry) or
		die("No fue posible guardar el archivo en la BD. Error:" . mysql_error());
	mysql_close();
	header($ruta ."index.php");	
}
?>	

<? php
if(sizeof($_FILES)==0) 
{
	echo "No fue posible cargar el archivo al servidor";
	exit();
}
include("funciones.php");

			conectarBD();
			mysql_query($qry) or
				die("No fue posible guardar el archivo en la BD. Error:" . mysql_error());
			mysql_close();
			header($ruta ."index.php");	
			if ($tipoOperacion == 0){
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
					$qry = "UPDATE nota SET titulo = '$txtTitulo', imagen = '$contenido',seccion = '$txtSeccion', fechaDePublicacion = '$txtFecha',resumen = '$txtResumen',cuerpo = '$txtCuerpo',video = '$txtUrl') WHERE ID ='$param_id'";
				}
		}
		else {
			$sql = "DELETE FROM nota WHERE id='$param_id'";
		}
?>

<!DOCTYPE html>
<?php
include("funciones.php");
?>

<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>

</head>

<body>
	<form class="form"  onsubmit="javascript:return;"  action="editarNota.php?'<?php $_REQUEST['idN'] ?>'" method="post" enctype="multipart/form-data">
		<p>Titulo de la nota</p>
		<input class="titulo" name="txtTitulo" type="text">
		
		<p>Imagen</p>
		<input type="file" name="imagenSeleccionada" />
			
		<p>Sección</p>
		<select class="seccion" name="txtSeccion">
			<option>Nación</option>
			<option>Mundo</option>
			<option>De10</option>
			<option>Wow</option>
			<option>Tecnología</option>
		</select>
		
		<p>Fecha</p>
		<input class="fecha" name="txtFecha" type="date">
	
		<p>Resumen de la Nota</p>
		<textarea class="resumen" name="txtResumen"> </textarea>

		<p>Cuerpo de la Nota</p>
		<textarea class="nota" name="txtCuerpo"> </textarea>
		
		<p>Notas Relacionadas</p>
		<select>
			<?php
			conectarBD();
			$qry = "select * from nota";
			$rs = mysql_query($qry) or die("NO fue posible recuperar la informacion");
			
			if(mysql_num_rows($rs)>0)
			{
				while($datos = mysql_fetch_array($rs))
				{
					echo "<option value=".$datos['idnota'].">".$datos['idnota']."</option>";						
				}
		  
				mysql_close();
			}
			else
			{	
				echo "No hay archivos cargados en la BD";
			}
		?>
	
		</select>
		<br><br>
		
		<p>video relacionado</p>
		<input class="url_video" name="txtUrl" type="url">
		<br><br>
		<?php echo "prueba: ". $_REQUEST['idN'] ?>
		<input type="hidden" name="idN" value="<?php echo $_REQUEST['idN'];?>"/>
		<input type="submit" value="Modifica Nota"/>
		
	</form >
	

</body>

</html>	
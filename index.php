<!DOCTYPE html>
<?php
include("funciones.php");
?>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>

<style type="text/css">
.imagen
	{
		width:200px;
		height:150px;
		margin:0px auto;
		margin-left:10px;
		margin-top:10px;
	
	}
	.cajaNotas
	{
		background-image:url('fondoSlider.jpg');
		width:220px;
		height:170px;
		margin-top:20px;
		margin-right:20px;
		float:left;
	}
	
	.imagenEnlaces{
		width:20px;
		height:20px;
		margin-right:10px;
	}


</style>
</head>

<body style="background-image:url('img/fondoPagina.jpg')">
	<a href="visualiza_creaNota.php">Carga Nota</a>
	
	<form class="form"  onsubmit="javascript:return;"  action="default.php" method="post" enctype="multipart/form-data">
		<br>
	<select name="nota">
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

	<input type="submit" value="Muestra Nota Seleccionada"/>
	</form>
	<form class="form"  onsubmit="javascript:return;"  action="visualiza_edita_eliminaNota.php" method="post" enctype="multipart/form-data">
		<h1>Notas Relacionadas</h1>
			<?php
				conectarBD();
				$qry = "select docs.* from nota as docs";		
				$rs = mysql_query($qry) or die("NO fue posible recuperar informacion de los productos");
				if(mysql_num_rows($rs)>0)
				{
					//echo '<script language="javascript">alert("entro");</script>'; 	
				//si se encontraron archivos
					$posY=0;
					while($datos = mysql_fetch_array($rs))
					{
						echo "<div style='width:100%; height:170px'>";
						echo "<div class = 'cajaNotas'> <img class = 'imagen' src='imagenNota.php?idN=" .$datos['idnota'] . "' alt=''/>";
						
						echo "<a href='eliminarNota.php?idN=" .$datos['idnota'] . "'><img class='imagenEnlaces'  src='imgElimnar.png' alt=''/></a>";
						echo "<a href='visualiza_editarNota.php?idN=" .$datos['idnota'] . "'><img class='imagenEnlaces' src='imgModifica.png' alt=''/></a>";
			
						echo "</div>";
						echo "<h1>Titulo de la Nota</h1>";
						echo "<h2>".$datos['titulo']."</h2>";
						//echo "<p>".$datos['cuerpo']."</p>";
						echo "</div>";
						$posY = $posY + 30;	
					}
					mysql_close();
				}
				else
				{	
					echo "No hay archivos cargados en la BD";
				}

			?>		
	</form >
</body>

</html>

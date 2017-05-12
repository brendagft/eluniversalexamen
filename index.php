<!DOCTYPE html>
<?php
include("funciones.php");
?>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>

</head>

<body style="background-image:url('img/fondoPagina.jpg')">
	<form class="form"  onsubmit="javascript:return;"  action="visualiza_edita_eliminaNota.php" method="post" enctype="multipart/form-data">
		<p>Notas Relacionadas</p>
		<select name="selectID">
				<?php
				conectarBD();
				$qry = "select * from nota";
				$rs = mysql_query($qry) or die("NO fue posible recuperar la informacion");
				
				if(mysql_num_rows($rs)>0)
				{
					while($datos = mysql_fetch_array($rs))
					{
						echo "<option value=".$datos['ID'].">".$datos['ID']."</option>";						
					}
			  
					mysql_close();
				}
				else
				{	
					echo "No hay archivos cargados en la BD";
				}
			?>
		
			</select>
		<a href="visualiza_creaNota.php">Crea Nota</a>
		</tb>
		<a href="visualiza_edita_eliminaNota.php?tipoOperacion=0">Edita Nota</a>
		<a href="visualiza_edita_eliminaNota.php?tipoOperacion=1">Elimina Nota</a>
	<input type="submit">
	</form >
</body>

</html>

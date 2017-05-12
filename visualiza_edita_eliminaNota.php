<!DOCTYPE html>
<?php
include("funciones.php");
extract($_POST); 
?>

<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>
<style type="text/css">
body{
	overflow:visible
}
</style>
</head>
<body >
	<form class="form" onsubmit="javascript:return;"  action="creaEliminaNota.php" method="post" enctype="multipart/form-data">

		<p>Titulo de la Nota</p>
		<input type="text" name="txtTitulo" value="<?php 
			conectarBD();
			$qry = "SELECT * FROM nota WHERE ID = '$selectID'";
			$rs = mysql_query($qry) or die("NO fue posible recuperar la informacion");	


		echo $rs['titulo'];?>">



		<?php
			if ($tipoOperacion == 0):
		?>
		<input name="submit" type="submit" value="Editar Nota">

		<?php
		else :
		?>
			<input name="submit" type="submit" value="Eliminar Nota">
		<?php
			endif
		?>
	</form >
	

</body>

</html>		

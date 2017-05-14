<!DOCTYPE html>
<?php
include("funciones.php");
?>

<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>

<style type="text/css">
	#notaPrincipal
	{
		text-align:center;
	}
	#imgNotaPrincipal
	{
		width:441px;
		height:267px;
	
	}
	#tituloNota
	{
		color:#000;
		font-family:41px bold;
		line-height:35px;
		margin-bottom:15px;
		margin-top:15px;
	}
	
	#seccion
	{
		list-style:none;
		margin:0px;
		padding:0px;
		margin-right:170px;
	}
	#seccion > li
	{
		float: left;	
		left:41%;
		margin:0 auto;
		margin-right:3px;
 		padding:0;
 		position:relative;
 	}
	#seccion :first-child
	{
		font-size:13px;
		color:#005383
	}
	#seccion > li > a 
	{
		color: #000;
		text-decoration: none;
		font-size:11px;
		font-family:Verdana;
		text-align:center;
	}

	#contenido
	{
		width:80%;
		text-align:center;
		margin-top:50px;
		margin-left:12%;
			
	}

.auto-style1 {
	font-family: "Arial Black";
}

	#contenedorNotas
	{
		width:50%;
		text-align:center;
		margin-top:15px;
		margin-left:30%;
	}
	#contenedorNotas img
	{
		width:132px;
		height:89px;
	}
	
	#izquierda {
	   width:33%; 
	   float: left; 
	} 
	#derecha { 
		width:33%;
	   float: right; 
	}
	#centro { 
	width:33%;
	   margin-left: 33%;
	}
	#contenedorNotas > h1
	{
		color:#000;
		line-height:16px;
	}
</style>

</head>

<body style="background-image:url('img/fondoPagina.jpg')">
	<div id="encabezado">
		<img src="img/encabezado.jpg">
	</div>
	<div id="notaPrincipal">
		<!--<img id="imgNotaPrincipal" src="img/img1.png">
		
			<h1 id="tituloNota">
			<span class="auto-style1">Con impuesto o </span> 
			<br class="auto-style1"><span class="auto-style1">reembolsos, pero 
			</span> <br class="auto-style1"><span class="auto-style1">México pagará muro:</span><br class="auto-style1">
			<span class="auto-style1">Trump
		</span>
		</h1>-->
		
		<?php 
			extract($_POST); 
			conectarBD();
			$qry = "select * from nota where idnota=".$nota;
			$rs = mysql_query($qry) or die("NO fue posible recuperar la informacion");
			$datos = mysql_fetch_array($rs);
			
			echo "<img class = 'imgNotaPrincipal' src='imagenNota.php?idN=" .$datos['idnota'] . "' alt=''/>";
			echo "<h1>".$datos['titulo']."</h1>";

		?>
		
		<ul id="seccion">
			<li ><?php echo $datos['seccion']; ?></li>
			<li >|</li>
			<li><img src="img/reloj.jpg">11:19</li>		
		</ul>
		
	</div>
	<div id="contenido">
		<p >
			<?php 
			echo $datos['cuerpo'];
			?>
		</p>
	</div>
	
	<div id="contenedorNotas">
		<div id="izquierda">
			<img src="img/img3.jpg">
			<h1 style="font-size:15px">Trump pndrá sus <br>bienes en<br>fideicomiso para<br>evitar conflictos de<br>interés</h1>
		</div >
		
		<div id="derecha">
			<img src="img/img4.jpg">
			<h1 style="font-size:15px">Trump:"Seré el <br>mayor productor de<br>empleos que Dios ha<br>creado nunca"</h1>
		</div>
		
		<div  id="centro">
			<img src="img/putin.jpg">
			<h1 style="font-size:15px">Rusia rechaza tener<br>datos<br>comprometedores<br>sobre Trump</h1>
		</div>
	</div>
		
</body>

</html>

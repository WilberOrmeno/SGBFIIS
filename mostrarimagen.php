<?php


  session_start();
		include ("bloqueDeSeguridad.php");
		include ("Cabecera.php");
		include("conexion.php");
		$con=conectar();
		

		
$nom=$_REQUEST["txtnom"];
$foto=$_FILES["foto"]["name"];
$ruta=$_FILES["foto"]["tmp_name"];
$destino="fotos/".$foto;
copy($ruta,$destino);
mysqli_query($con,"insert into imagephp (nombre,foto) values('$nom','$destino')");
header("Location: agregarimagen.php");
?>

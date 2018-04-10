<!DOCTYPE html>
<html lang="es">
<?php
session_start();
include ("bloqueDeSeguridad.php");
include ("Cabecera.php");
include("conexion.php");

$con = conectar();

$ID = $_POST["IdReserva"];
$IDUS = $_SESSION["idUsuario"];
//echo '<script> alert( "Tipo: '.$TIPO.'"); </script>';
$sSQL = null;
$result = null;
$extraido = null;
$tabla= "";

$SQL0 = "SELECT `Documento_Tipo` FROM `documentos` WHERE `Documento_id` = $ID";
$res0 = mysqli_query($con, $SQL0);
while($ext=mysqli_fetch_array($res0)){
	$TIPO= $ext['Documento_Tipo'];
}

switch ($TIPO) {
	case "1": //Libro
		$sSQL = "SELECT Documento_Nombre, Documento_Descripcion, Documento_Autor, Documento_Fecha_publicacion, Documento_Edicion, Documento_Materia, Documento_Imagen FROM documentos WHERE Documento_id = $ID";
		$result = mysqli_query($con, $sSQL) or die(mysqli_error($con));
		$extraido = mysqli_fetch_array($result);

		$tabla .= '<table class="table table-bordered" style="background-color: white;">';
		$tabla .= '<tr><td width="40%"><h4>Libro</h4></td>';
		$tabla .= '<td><h4><b>' . $extraido['Documento_Nombre'] . '</b></h4></td></tr>';
		$tabla .= '<tr><td>Descripción</td>';
		$tabla .= '<td><button type="button" class="btn-sm " data-toggle="collapse" data-target="#demo">Leer descripión</button>';
		$tabla .= '<div id="demo" class="collapse">' . $extraido['Documento_Descripcion'] . '</div></td></tr>';
		$tabla .= '<tr><td>Autor</td><td>' . $extraido['Documento_Autor'] . '</td></tr>';
		$tabla .= '<tr><td>Fecha de publicación</td><td>' . $extraido['Documento_Fecha_publicacion'] . '</td></tr>';
		$tabla .= '<tr><td>Edición</td><td>' . $extraido['Documento_Edicion'] . '</td></tr>';
		$tabla .= '<tr><td>Materia</td><td>' . $extraido['Documento_Materia'] . '</td></tr>';
		$tabla .= '</table>';

		break;
	case "2": //Tesis
		$sSQL = "SELECT Documento_Nombre, Documento_Descripcion, Documento_Autor, Documento_Asesor, Documento_Imagen FROM documentos WHERE Documento_id = $ID";
		$result = mysqli_query($con, $sSQL) or die(mysqli_error($con));
		$extraido = mysqli_fetch_array($result);

		$tabla .= '<table class="table table-bordered" style="background-color: white;">';
		$tabla .= '<tr><td width="40%"><h4>Tesis</h4></td>';
		$tabla .= '<td><h4><b>' . $extraido['Documento_Nombre'] . '</b></h4></td></tr>';
		$tabla .= '<tr><td>Descripción</td>';
		$tabla .= '<td><button type="button" class="btn-sm " data-toggle="collapse" data-target="#demo">Leer descripión</button>';
		$tabla .= '<div id="demo" class="collapse">' . $extraido['Documento_Descripcion'] . '</div></td></tr>';
		$tabla .= '<tr><td>Autor</td><td>' . $extraido['Documento_Autor'] . '</td></tr>';
		$tabla .= '<tr><td>Asesor</td><td>' . $extraido['Documento_Asesor'] . '</td></tr>';
		$tabla .= '</table>';

		break;
	case "3": //Material Multimedia
		$sSQL = "SELECT Documento_Nombre, Documento_Descripcion, Documento_Autor, Documento_Tipo_MM,Documento_Materia ,Documento_Imagen FROM documentos WHERE Documento_id = $ID";
		$result=mysqli_query($con,$sSQL) or die(mysqli_error($con));
		$extraido = mysqli_fetch_array($result);
		$tabla.= '<table class="table table-bordered" style="background-color: white;">';
		$tabla.='<tr><td width="40%"><h4>Material Multimedia</h4></td>';
		$tabla.='<td><h4><b>'.$extraido['Documento_Nombre'].'</b></h4></td></tr>';
		$tabla.='<tr><td>Descripción</td>';
		$tabla.='<td><button type="button" class="btn-sm " data-toggle="collapse" data-target="#demo">Leer descripión</button>';
		$tabla.='<div id="demo" class="collapse">'.$extraido['Documento_Descripcion'].'</div></td></tr>';
		$tabla.='<tr><td>Autor</td><td>'.$extraido['Documento_Autor'].'</td></tr>';
		$tabla.='<tr><td>Tipo</td><td>'.$extraido['Documento_Tipo_MM'].'</td></tr>';
		$tabla.='<tr><td>Materia</td><td>'.$extraido['Documento_Materia'].'</td></tr>';
		$tabla.= '</table>';

		break;
}

?>

<body style="background-image: url(images/libros.jpg)">

<div class="container">
		<div class="row" style="top: -20px;">
			<h1 style="color: white;">Detalles de reservación</h1>
			<br>
		</div>
		<div class="row">
			<div class="col-md-5">
				<img src="<?php echo $extraido['Documento_Imagen']?>" class="img-thumbnail">
			</div>

			<div class="col-md-7" style="color: black; ">
				<div class="row">
					<?php echo $tabla; ?>
				</div>
				<div class="row">
					<form action="Reserva.php" method="POST">
						<input type=text name="idUsuario" style="display: none" value="<?php echo $IDUS ?>"/>
						<input type=text name="tipoMaterial" style="display: none" value="<?php echo $TIPO ?>"/>
						<input type=text name="idMaterial" style="display: none" value="<?php echo $ID ?>"/>
						<center><input type="submit" id="butRes" class="btn info" value="Reservar"/></center>
					</form>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<h3>Comentarios</h3>
				<table class="table ">
					<tr class="success">
						<td width="20%">Diego Trujillo</td>
						<td>¡Excelente Libro, de inicio a fin! =)</td>
					</tr>
					<tr class="success">
						<td>Javier Ormeño</td>
						<td>Uno de los mejores libros de la historia. ¡La recomiendo!</td>
					</tr>
					<tr class="success">
						<td>Angello Bravo</td>
						<td>Es una obra maestra de la literatura, me encanta como Dante hace énfasis en cada uno de los abismos o mundos asignados para los personajes, como el cielo, el purgatorio y el infierno</td>
					</tr>
				</table>
			</div>
			<div class="col-md-1"></div>	
		</div>
		
	</div>	

	
	<br>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

<head>
	<meta charset="UTF-8">
	<title>Texto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<style>
		.navbar-default .navbar-nav > li > a {
			color:white ;
		}
		.navbar-default .navbar-nav > li > a:hover {
			color:gold ;
		}
		.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
			color:white;
		}
		.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
			background: red;
		}
		#btn {
		    border: none; /* Remove borders */
		    color: white; /* Add a text color */
		    padding: 20px 32px;
			font-size: 28px;
		    cursor: pointer; /* Add a pointer cursor on mouse-over */
		}
		.info {background-color: #2196F3;} /* Blue */
		.info:hover {background: #0b7dda;}

		table tr td:first-child{
			font-weight: bold;
		}
	</style>
</head>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<title>Contáctenos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		html{overflow: auto;}
	</style> 	
</head>
<?php
if(isset($_GET['t'])){
	$valor=($_GET['t']);
	session_start();
}
include("Cabecera.php");


?>
<body style="background-image: url(images/libros.jpg); min-width: 800px;">
	<div class="container solid" style="color: white;">
		<div class="col-md-12">
			<h3><strong>CENTRO DE INFORMACION FIIS (CIFIIS)</strong></h3>
			<p>Teléfono: 481 1070 Anexo 470&nbsp;<br>Correo:&nbsp;cinfor-fiis@uni.edu.pe<br></p>

			<h1>Contáctenos&nbsp;</h1>
			<p><strong>Teléfonos (conmutador): (01) 345 765 78</strong></p>
			<p>Si presenta problemas en la reserva de libros o en la creación o acceso a su cuenta, puede comunicarse con nosotros enviando un mensaje al correo:&nbsp;sistembibliotecas@gmail.com<br></p>

			<h3><strong>EQUIPO DE DESARROLLADORES</strong></h3>
			<table>
				<tr>
					<td style="border: 2px solid; width: 32%; text-align: center">
						<h4><strong>ANGELLO JOEL BRAVO CONCHA</strong></h4>
						<p>Teléfono: 992443523 <br>Correo:&nbsp;angello.bravo@gmail.com<br></p>
					</td>
					<td style="width: 2%"></td>
					<td style="border: 2px solid; width: 32%;  text-align: center">
						<h4><strong>WILBER JAVIER ORMEÑO VERA</strong></h4>
						<p>Teléfono: 994318344 <br>Correo: wilber.ormeno@uni.pe<br></p>
					</td>
					<td style="width: 2%"></td>
					<td style="border: 2px solid; width: 32%; text-align: center">
						<h4><strong>DIEGO MANUEL TRUJILLO PECEROS</strong></h4>
						<p>Teléfono: 996772192 <br>Correo: dmtPeceros@gmail.com<br></p>
					</td>
				</tr>
			</table>
		</div>
	</div>
</body>
</html>
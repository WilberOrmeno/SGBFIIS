<html>
<?php
session_start();
include ("bloqueDeSeguridad.php");
include ("Cabecera.php");
?>
<head>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>


    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body style="background-image: url(images/libros.jpg)">

</body>

<div ><br><br><br><br><br>
	<center>
		<br><br>
        <div class="well well-lg col-sm-offset-1 col-sm-4 container" style="height: 230px;">
        <center>
            <h3><strong>BÚSQUEDA</strong></h3> <BR><BR>
            <a href="BuscarMaterial.php?t=1" type="button" class="btn btn-Warning">Busqueda de Material</a>
        </center>
        </div>
        <div class="well well-lg col-sm-offset-2 col-sm-4 container" style="height: 230px;">
            <center>
                <h3><strong>HISTORIAL</strong></h3> <BR><BR>
                <a href="HistorialAlumno.php" type="button" class="btn btn-Warning">Historial de Préstamos</a>
            </center>
        </div>
		
	</center> 
   </div>

<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/fRegistro.js"></script>
</body>
</html>
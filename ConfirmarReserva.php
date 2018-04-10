<!DOCTYPE html>
<html>
<?php
session_start();
include ("bloqueDeSeguridad.php");
include ("Cabecera.php");
include("conexion.php");
$con=conectar();

$hoy = date("Y-m-d");


$sSQL32="Call Combo_Usuario_Estudiante";
$result111=mysqli_query($con,$sSQL32);
$comboUsuarioEstudiante="";
while($res2 = mysqli_fetch_array($result111))
{	$comboUsuarioEstudiante.='<option value="'.$res2[0].'">'.$res2[1].'</option>';
}


mysqli_free_result($result111);
 mysqli_close($con);
 
 $con=conectar();



?>
<head>
<link rel="stylesheet" type="text/css" href="calendar/tcal.css" />
<script type="text/javascript" src="calendar/tcal.js"></script>
    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/sRegistro.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>

</head>
<body style="background-image: url(images/libros.jpg)">
  <form id="msform" action="PrestamoRealizadoConfirmado.php" method="POST">
        <fieldset style="margin-top: 0px; background-color: #E0E0E0">
            <h2 class="fs-title">Confirmar Reserva</h2>
            <div align="left">
            <label >Estudiante:</label>
			<select name="txtUsuarioAlumno" class="form-control"  style="width:100%"><?php echo $comboUsuarioEstudiante;?></select>
</div>
            <br>
			<div align="left">
			<label >Fecha de prestamo:</label>
			  <input type="text"   class="form-control" name="txtFecha"  class="tcal" style="background-color:#FFFFFF" readonly value=<?php echo $hoy;?>>
			</div>
			<div align="left">
			<label >Fecha de Devolucion:</label>
			  <input type="text"   class="form-control" name="txtFechaDev"  class="tcal" style="background-color:#FFFFFF" readonly value=<?php echo date("Y-m-d",strtotime('+3 day'))?>>
			</div>
			<input id="nextButton" type="submit" name="next" class="action-button" value="Registrar" />
        </fieldset>
    </form>


<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/fRegistro.js"></script>
</body>
</html>
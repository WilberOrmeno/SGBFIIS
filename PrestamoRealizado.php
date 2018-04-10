<?php 
session_start();
include ("bloqueDeSeguridad.php");
include ("Cabecera.php");
include("conexion.php");
$con=conectar();

$UsuarioAlu = $_POST['txtUsuarioAlumno'];
$Docuento = $_POST['txtDocumento'];
$Fecha = $_POST['txtFecha'];
$FechaDev = $_POST['txtFechaDev'];


$insertado2 = "INSERT INTO `biblioteca`.`prestamo` (`Prestamo_Documento_Id`, `Prestamo_Usuario_Id`, `Prestamo_Fecha`, `Prestamo_Estado`, 
`Prestamo_Fecha_Dev`) VALUES ('$Docuento ', '$UsuarioAlu ', '$Fecha', '1','$FechaDev')"; 
$stmt = mysqli_query($con,$insertado2);



$disminucion= "Update `biblioteca`.`Documentos` set Documento_Cantidad=Documento_Cantidad-1 where Documento_id='$Docuento '";
$stmt2 = mysqli_query($con,$disminucion);

$sql1= "Update `biblioteca`.`Documentos` set Documento_Estado_Stock = '1' where Documento_id='$Docuento '";
$res2 = mysqli_query($con,$sql1);

$sql3 = "UPDATE `usuarios` SET `prestamo_reserva` = '2' WHERE `usuarios`.`UsuarioID` = $UsuarioAlu";
$res3 = mysqli_query($con, $sql3);


?>

<html>
<body style="background-image: url(images/libros.jpg); color: white; font">
<br><br><br><br><br>

<center><h2 style="color: white;">////////Prestamo Realizado//////////</h2></center><br><br><br>
<center><form action="PantallaDeMuestra.php" method="POST"	>
    <button class="btn-lg btn-danger" type="submit" value=""> Regresar </button>
</form></center>
</body>
</html>

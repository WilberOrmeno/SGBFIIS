<?php 
session_start();
include ("bloqueDeSeguridad.php");
include ("Cabecera.php");
include("conexion.php");
$con=conectar();

$UsuarioAlu = $_POST['txtUsuarioAlumno'];
$Fecha = $_POST['txtFecha'];
$FechaDev = $_POST['txtFechaDev'];

$busquedaReserva ="SELECT * FROM `reservas` WHERE Usuario_Id=$UsuarioAlu";

$stmt2 = mysqli_query($con,$busquedaReserva);
while($ext=mysqli_fetch_array($stmt2)){
    $Docuento = $ext['Documento_Id'];
}

$insertado2 = "INSERT INTO `biblioteca`.`prestamo` (`Prestamo_Documento_Id`, `Prestamo_Usuario_Id`, `Prestamo_Fecha`, `Prestamo_Estado`, 
`Prestamo_Fecha_Dev`) VALUES ('$Docuento ', '$UsuarioAlu ', '$Fecha', '1','$FechaDev')";
$stmt = mysqli_query($con,$insertado2);

$sql3 = "UPDATE `usuarios` SET `prestamo_reserva` = '2' WHERE `usuarios`.`UsuarioID` = $UsuarioAlu";
$res3 = mysqli_query($con, $sql3);

$sql3 = "UPDATE `usuarios` SET `prestamo_reserva` = '2' WHERE `usuarios`.`UsuarioID` = $UsuarioAlu";
$res3 = mysqli_query($con, $sql3);
$sql2 = "delete from `reservas` WHERE `Documento_Id` = $Docuento";
$res2 = mysqli_query($con, $sql2);
$sql8 = "select * from `Documentos` WHERE `Documento_Id` = $Docuento";
$res8 = mysqli_query($con, $sql8);

while($ext=mysqli_fetch_array($res8)){
    $nombreDoc = $ext['Documento_Nombre'];
}


?>

<html>
<body style="background-image: url(images/libros.jpg); color: white; font">
<br><br><br><br><br>

<center><h2 style="color: white;">////////Prestamo Realizado//////////</h2></center><br><br><br>
<?php
global $nombreDoc;
echo '<center><h1 style="color: white">Documento prestado :'.$nombreDoc.'</h1></center>';
?>
<center><form action="PantallaDeMuestra.php" method="POST"	>
    <button class="btn-lg btn-danger" type="submit" value=""> Regresar </button>
</form></center>
</body>
</html>

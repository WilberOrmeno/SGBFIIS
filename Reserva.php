<?php

session_start();
include("conexion.php");

$con = conectar();

$idUsuario =  $_POST["idUsuario"];
$idMaterial = $_POST["idMaterial"];
$horaReserva = date("Y-m-d h:i:s");



$sql2 = "Select prestamo_reserva from `usuarios` WHERE `UsuarioID` = $idUsuario ";
$res2 = mysqli_query($con, $sql2);

while($ex=mysqli_fetch_array($res2)){
    $pr=$ex['prestamo_reserva'];
}
if ($pr=='0') {
    $sql1 = "INSERT INTO `reservas` (`Usuario_Id`, `Documento_Id`, `Reserva_Hora`, `Reserva_Estado`) VALUES ('".$idUsuario."', '".$idMaterial."', '".$horaReserva."', '1');";
    $res1 = mysqli_query($con, $sql1);
    $sql3 = "UPDATE `usuarios` SET `prestamo_reserva` = '1' WHERE `usuarios`.`UsuarioID` = $idUsuario";
    $res3 = mysqli_query($con, $sql3);
    $sql5 = "UPDATE `documentos` SET `Documento_Estado` = '1' WHERE `documentos`.`Documento_id` = ".$idMaterial;
    $res5 = mysqli_query($con, $sql5);

	echo '<script>';
	echo 'document.location.href="BuscarMaterial.php?t=1";';
	echo 'alert("Reserva realizada");';
	echo '</script>';
}
else {
    echo '<script>';
    echo 'document.location.href="BuscarMaterial.php?t=1";';
    echo 'alert("Reserva NO realizada. Usted tiene pendientes");';
    echo '</script>';
}

?>
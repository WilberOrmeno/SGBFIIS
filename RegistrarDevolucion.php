<?php

session_start();
include("conexion.php");

$con = conectar();

$idPrestamo =  $_POST["IDPrestamo"];
$sql1 = "select * from `prestamo` WHERE `Prestamo_Id` = $idPrestamo ";
$res1 = mysqli_query($con, $sql1);
while($ext=mysqli_fetch_array($res1)){
    $idUsuario = $ext['Prestamo_Usuario_Id'];
    $iddoc = $ext['Prestamo_Documento_Id'];

}

$sql2 = "delete from `prestamo` WHERE `Prestamo_Id` = $idPrestamo ";
$res2 = mysqli_query($con, $sql2);
$sql3 = "UPDATE `usuarios` SET `prestamo_reserva` = '0' WHERE `usuarios`.`UsuarioID` = $idUsuario";
$res3 = mysqli_query($con, $sql3);
$sql5 = "UPDATE `documentos` SET `Documento_Estado` = '1' WHERE `documentos`.`Documento_id` =$iddoc ";
$res5 = mysqli_query($con, $sql5);
$aumento= "Update `biblioteca`.`Documentos` set Documento_Cantidad=Documento_Cantidad+1 where Documento_id='$iddoc'";
$res5 = mysqli_query($con, $aumento);
echo '<script>';
echo 'document.location.href="Devolucion.php";';
echo 'alert("Devolucion registrada");';
echo '</script>';

?>
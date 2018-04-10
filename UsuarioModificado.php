<?php 
session_start();
include ("Cabecera.php");
include ("bloqueDeSeguridad.php");
include("conexion.php");
$con=conectar();

$ID=$_POST['txtID'];
$Nivel = $_POST['txtTipoUsuario'];
$Login = $_POST['txtLogin'];
$Password = $_POST['txtPassword'];
$Estado = $_POST['txtEstado'];
$Nombre = $_POST['txtNombre'];

$insertado = "UPDATE `biblioteca`.`usuarios` SET `UsuarioLogin`='$Login', `UsuarioNombre`='$Nombre ', `UsuarioPassword`='$Password', `UsuarioNivel`='$Nivel', `UsuarioEstado`='$Estado'
 WHERE `UsuarioID`='$ID'"; 
$stmt = mysqli_query($con,$insertado);

	
?>

<html><br><br><br><br><br>
<center><div class="container" style="color: white;">
       <center><h1 id="htit"><kbd>USUARIO MODIFICADO</kbd></h1></center>
	   <br>
    </div></center><br>
<center><form action="BuscarUsuarios.php" method="POST"	>
        <button class="btn-lg btn-danger" type="submit" value=""> Regresar </button>
</form></center>
</html>

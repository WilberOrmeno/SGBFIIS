<!DOCTYPE html>
<html lang="es">
 <link rel="stylesheet" href="css/bootstrap.css">
<?php
include("Conexion.php");
$con=conectar();

$Nombres = $_POST['txtNombres'];
$Login = $_POST['txtLogin'];
if(isset($_POST['txtTipoUsuario'])==true){
  $TipoUsuario = $_POST['txtTipoUsuario'];
    $sSQL="Select a.UsuarioId as 'UsuarioID',a.UsuarioLogin,a.UsuarioNombre,a.UsuarioPassword,c.nivel_usuario_nombre,a.UsuarioFecha,b.Estado_descripcion
 from Usuarios a left join Estado b on a.UsuarioEstado=b.Estado_ID left join nivel_usuario c on a.UsuarioNivel=c.nivel_usuario_id where a.UsuarioNombre like '%$Nombres%'   
 and a.UsuarioLogin like '%$Login%' and 	a.UsuarioNivel like '%$TipoUsuario%'" ;
}else{
    $sSQL="Select a.UsuarioId as 'UsuarioID',a.UsuarioLogin,a.UsuarioNombre,a.UsuarioPassword,c.nivel_usuario_nombre,a.UsuarioFecha,b.Estado_descripcion
 from Usuarios a left join Estado b on a.UsuarioEstado=b.Estado_ID left join nivel_usuario c on a.UsuarioNivel=c.nivel_usuario_id where a.UsuarioNombre like '%$Nombres%'   
 and a.UsuarioLogin like '%$Login%'" ;
}



$result=mysqli_query($con,$sSQL) or die(mysqli_error($sSQL));

$tabla="";
$tabla.='<table id="muestratabla" class="table table-bordered table-hover" style="background-color: GRAY" >';
$tabla.= '<thead><tr>';
$tabla.= '<th bgcolor="yellow"  id="UsuarioID"><font color="black">ID</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioLogin"><font color="black">Login</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioNombre"><font color="black">Nombre</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioPassword"><font color="black">Contraseña</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioNivel"><font color="black">Nivel</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioFecha"><font color="black">Fecha</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioEstado"><font color="black">Estado</th>';
$tabla.= '<th bgcolor="yellow" id="IDModif"><font color="black">Modificar</th>';
$tabla.= '</tr></thead>';
while($extraido = mysqli_fetch_array($result) )
{
    $tabla.= '<tr>';
    $tabla.= '<td>'.$extraido['UsuarioID'].'</td>';
    $tabla.= '<td>'.$extraido['UsuarioLogin'].'</td>';
    $tabla.= '<td>'.$extraido['UsuarioNombre'].'</td>';
    $tabla.= '<td>'.$extraido['UsuarioPassword'].'</td>';
    $tabla.= '<td>'.$extraido['nivel_usuario_nombre'].'</td>';
    $tabla.= '<td>'.$extraido['UsuarioFecha'].'</td>';
    $tabla.= '<td>'.$extraido['Estado_descripcion'].'</td>';
    $tabla.= '<td><form id="formmodif" name="formmodif" action="ModificarUsuarios.php" METHOD="post">
<center><input type="text" id="IDModificar" name="IdDeModificacion" placeholder="ID" style="display: none" value="'.$extraido['UsuarioID'].'"/>
<input id="ButModifi" type="submit" name="next" class="action-button" value="Modificar" style="color: black" />
<span id="resultado"></span>
</form></td>';
    $tabla.= '</tr>';
}
echo $tabla;

?>

<script>
$(document).ready(function() {
    $('#muestratabla').DataTable({
		"order": []
	});
} );
</script>


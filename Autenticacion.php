<?php
include("conexion.php");
$con=conectar();
//vemos si el usuario y contraseña son válidos
$usuar = $_POST["user"];
$contra = $_POST["pass"];

$sql="SELECT * FROM Usuarios WHERE UsuarioLogin='$usuar' and UsuarioPassword='$contra'";
$result=mysqli_query($con,$sql);
$count=mysqli_num_rows($result);

$permiso="SELECT UsuarioNivel from Usuarios where UsuarioLogin='$usuar' and UsuarioPassword='$contra'";
$permiso2=mysqli_query($con,$permiso);
$permiso3=mysqli_fetch_array($permiso2);



$estado1="SELECT UsuarioEstado from Usuarios where UsuarioLogin='$usuar' and UsuarioPassword='$contra'";
$estado2=mysqli_query($con,$estado1);
$estado3=mysqli_fetch_array($estado2);

$nombre="SELECT UsuarioNombre from Usuarios where UsuarioLogin='$usuar' and UsuarioPassword='$contra'";
$nombre2=mysqli_query($con,$nombre);
$nombre3=mysqli_fetch_array($nombre2);

$id="SELECT UsuarioID from Usuarios where UsuarioLogin='$usuar' and UsuarioPassword='$contra'";
$id2=mysqli_query($con,$id);
$id3=mysqli_fetch_array($id2);

//AÑADIDO IDUSUARIO A SESSION
if($count==1 and $estado3[0]==1)

{if($permiso3[0]==1)
{session_start();
    $_SESSION["autenticado"]= "SI";
    $_SESSION["nombreusuario"]= $nombre3[0];
    $_SESSION["nivelUsuario"]= $permiso3[0];
    $_SESSION["idUsuario"]= $id3[0];

    header("location:PantallaADM.php");
}
    if($permiso3[0]==2)
    {session_start();
        $_SESSION["autenticado"]= "SI";
        $_SESSION["nombreusuario"]= $nombre3[0];
        $_SESSION["nivelUsuario"]= $permiso3[0];
        $_SESSION["idUsuario"]= $id3[0];

        header("location:PantallaBIBLIOTECARIO.php");
    }

    if($permiso3[0]==3)
    {session_start();
        $_SESSION["autenticado"]= "SI";
        $_SESSION["nombreusuario"]= $nombre3[0];
        $_SESSION["nivelUsuario"]= $permiso3[0];
        $_SESSION["idUsuario"]= $id3[0];

        header("location:PantallaESTUDIANTE.php");
    }

}


else {
    header ('location:IngresoUsuario.php');
}
?>
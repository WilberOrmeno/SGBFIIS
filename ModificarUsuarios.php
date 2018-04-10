<!DOCTYPE html>
<html>
<?php
session_start();
include ("bloqueDeSeguridad.php");
include("conexion.php");
include ("Cabecera.php");
$con=conectar();

$ID=$_POST['IdDeModificacion'];

$UsuarioEncontradoLogin="Select UsuarioLogin from Usuarios where UsuarioID='$ID'";
$query = mysqli_query($con,$UsuarioEncontradoLogin);
$Login=mysqli_fetch_array($query);

$UsuarioEncontradoNombre="Select UsuarioNombre from Usuarios where UsuarioID='$ID'";
$query2 = mysqli_query($con,$UsuarioEncontradoNombre);
$Nombre=mysqli_fetch_array($query2);

$UsuarioEncontradoPassword="Select UsuarioPassword from Usuarios where UsuarioID='$ID'";
$query3 = mysqli_query($con,$UsuarioEncontradoPassword);
$Password=mysqli_fetch_array($query3);

$UsuarioEncontradoEstado="Select UsuarioEstado from Usuarios where UsuarioID='$ID'";
$query4 = mysqli_query($con,$UsuarioEncontradoEstado);
$Estado=mysqli_fetch_array($query4);

$UsuarioEncontradoNivel="Select UsuarioNivel from Usuarios where UsuarioID='$ID'";
$query5 = mysqli_query($con,$UsuarioEncontradoNivel);
$Nivel=mysqli_fetch_array($query5);


$sSQL="Call Combo_usuarios";
$result1=mysqli_query($con,$sSQL); 


$comboUsuario="";
while($res = mysqli_fetch_array($result1))
{	$comboUsuario.='<option value="'.$res[0].'">'.$res[1].'</option>';
};


mysqli_free_result($result1);
 mysqli_close($con);
 
 
 $con=conectar();
 

$Mysql="Call Combo_Estado";
$result3=mysqli_query($con,$Mysql);

$comboEstado="";
while($res2 = mysqli_fetch_array($result3))
{	$comboEstado.='<option value="'.$res2[0].'">'.$res2[1].'</option>';
}

?>


<head>
    <title>Modificar Cuenta</title>
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






<form id="msform" action="UsuarioModificado.php" method="POST">
    <fieldset style="margin-top: 0px; background-color: #E0E0E0">
        <h2 class="fs-title">Modificar cuenta</h2>

		i class="fa fa-user"></i>
		<div align="left"><input  type="text"  maxlength="9" name="txtID" readonly value="<?php echo $_POST['IdDeModificacion']?>">
            <
            <label >Tipo de usuario</label>
            <select name="txtTipoUsuario" class="form-control"  style="width:100%"><?php echo $comboUsuario;?></select>
        </div>
		<br>
        <input  type="text"  maxlength="9" name="txtLogin" placeholder="Login:                  <?php echo $Login[0] ?>" />
        <i class="fa fa-user"></i>
        <input  type="text"  name="txtNombre" placeholder="Nombre:              <?php echo $Nombre[0] ?>" />
        <i class="fa fa-user"></i>
        <input  type="text"  name="txtPassword" placeholder="Contraseña:        <?php echo $Password[0] ?>" />
        <i class="fa fa-user"></i>
       <select name="txtEstado" class="form-control"  style="width:100%"><?php echo $comboEstado;?></select>
        <i class="fa fa-user"></i>
		<br>
        <input id="ButModifi" type="submit" id="next" class="action-button" value="Modificar" />




    </fieldset>
</form>


<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/fRegistro.js">



</script>
</body>
</html>
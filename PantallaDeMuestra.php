
<?php
session_start();
include ("bloqueDeSeguridad.php");

/* echo $_SESSION["nombreusuario"];
echo '<br>';
echo $_SESSION["nivelUsuario"];
echo '<br>';
echo  "javier";
*/
switch ($_SESSION["nivelUsuario"]){
	case "1":
		header("Location: PantallaADM.php");
		break;
	case "2":
		header("Location: PantallaBIBLIOTECARIO.php");
		break;
	case "3":
		header("Location: PantallaESTUDIANTE.php");
		break;
}

?>
	
	
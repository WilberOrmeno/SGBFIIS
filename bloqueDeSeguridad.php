<?php
//Inicio la sesión
//COMPRUEBA QUE EL USUARIO ESTA AUTENTICADO
if ($_SESSION["autenticado"] != "SI") {	
//si no existe, va a la página de autenticacion
header("Location: ingresousuario.php");
//salimos de este script
exit();
}
?>
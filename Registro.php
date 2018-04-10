<?php

    //Conexxion con la base de datos y el servidor
    $link = mysqli_connect("localhost","root","") or die ("<h2>No se encuentra el servidor</h2>");
    $db = mysqli_select_db($link,'sgbfiis') or die ("<h2>Error en la conexión</h2>");

    //Obtenemos los valores del formulario
    $codigo = $_POST['codigoUNI'];
    $email = $_POST['correoElectronico'];
    $pass = $_POST['password'];
    $rpass = $_POST['password2'];

    //Obtiene la longitud de un string
    $req = (strlen($codigo)*strlen($email)*strlen($pass)*strlen($rpass)) or die ("No se han llenado todos los campos");

    //COnfirmacion de la contraseña
    if($pass != $rpass){
        die('Las contraseñas no coinciden <a href=AgregarUsuario.html">Volver</a>');
    }

    //Se encripta la contraseña
$contraseñaUsuario =  md5($pass);

//Ingresar la informacion a la tabla de datos
    mysqli_query($link,"INSERT INTO myguests VALUES ('$codigo','$email','$pass')") or die ('<h2>Error de envío de datos</h2>');
echo '<h2>Registro completo</h2>
         <a href="Login.html">Logearse</a> ';

?>
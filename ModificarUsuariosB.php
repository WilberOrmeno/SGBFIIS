<!DOCTYPE html>
<html>
<?php
session_start();
include ("bloqueDeSeguridad.php");
include ("Cabecera.php")
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

<form id="msform" action="Registro.php" method="POST">
    <fieldset style="margin-top: 0px; background-color: #E0E0E0">
        <h2 class="fs-title">Modificar cuenta</h2>
        <div align="left">
            <label >Tipo de usuario</label>
            <select align="left" class="form-control" name="Tipo de usuario" style="left: -400px;">
                <option value="alumno">Alumno</option>
                <option value="bibliotecario">Bibliotecario</option>
            </select>
        </div>
        <br>
        <input  type="text" id="nombres" maxlength="9" name="nombres" placeholder="Wilber Javier" autofocus required/>
        <i class="fa fa-user"></i>
        <input  type="text" id="apellidos" name="apellidos" placeholder="Ormeño Vera" required/>
        <i class="fa fa-user"></i>
        <input  type="text" id="codigoUNI" name="codigoUNI" placeholder="20140143C" required/>
        <i class="fa fa-user"></i>
        <input type="email" id="correoElectronico" name="correoElectronico" placeholder="wilber.ormeno@uni.pe" required/>
        <i class="fa fa-at"></i>
        <input  type="text" id="telefono" maxlength="9" name="telefono" placeholder="994318344"/>
        <i class="fa fa-mobile"></i>
        <input type="password" name="password" id="myPassword" placeholder="***********" required/>
        <i class="fa fa-key"></i>
        <i onmouseover="mouseoverPass1();" onmouseout="mouseoutPass1();" style="opacity: .8; font-size: 20px; position: absolute; margin-top: -45px; margin-left: 175px;" class="fa fa-eye"></i>
        <div align="left">
                        <label >Estado del usuario</label>
                        <select align="left" class="selectpicker" name="Tipo de usuario" style="left: -400px;">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
		<br>
        <input id="nextButton" type="submit" name="next" class="action-button" value="Guardar" />
        <input id="onextButtn" type="submit" name="next" class="action-button" value="Cancelar" />
    </fieldset>
</form>


<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/fRegistro.js"></script>
</body>
</html>
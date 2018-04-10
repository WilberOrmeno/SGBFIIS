<!DOCTYPE html>
<html lang="es">
<?php
session_start();
include ("bloqueDeSeguridad.php");
include("Cabecera.php");
include("Conexion.php");
$con=conectar();

$sSQL="Call Combo_usuarios";
$result1=mysqli_query($con,$sSQL);
$comboUsuario="";
if($_SESSION["nivelUsuario"]=="1"){
    while($res = mysqli_fetch_array($result1)){
        $comboUsuario.='<option value="'.$res[0].'">'.$res[1].'</option>';
	    }

}else{
    while($res = mysqli_fetch_array($result1)){
        if($res[0]!="1"){
            $comboUsuario.='<option value="'.$res[0].'">'.$res[1].'</option>';
        }
    }
}

?>
<head>
    <meta charset="UTF-8">    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script></script>

</head>

<body style="background-image: url(images/libros.jpg); color: white;">
<div class="container">
    <div class="container" style="color: white;">
        <h1 id="htit"><kbd>Búsqueda de usuarios</kbd></h1>
    </div>

    <form id="myForm" name="myForm"  method="post" class="form-horizontal"  style="color: white;">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup">Nombres</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="txtNombres" placeholder="Nombres">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="formGroup">Login</label>
            <div class="col-sm-4">
                <input class="form-control" type="text" name="txtLogin" placeholder="Código UNI">
            </div>
        </div>

        <div class="form-group">
            <label for="sel3" class="col-sm-2 control-label">Tipo de Usuario:</label>
            <div class="col-sm-4">
                	<select name="txtTipoUsuario" class="form-control"  style="width:100%">
                        <option selected disabled>Seleccionar... (Todos)</option>
                        <?php echo $comboUsuario;?>
                    </select>
            </div>
        </div>
        <br>
        <div class="container">
				<div class="col-sm-1"></div>
				<input type="button" class="btn btn-primary col-sm-2" id="ButBuscar" value="Buscar">
				<div class="col-sm-1"></div>
				<button type="button" onclick="formReset()" value="Reset" class="btn btn-primary col-sm-2" >Limpiar Campos</button>
			</div><br><br>
			<span id="resultado"></span>
	</form>
</div>
<script src="js/jquery-1.11.3.min.js"></script>
<script>
    $(document).on('ready',function(){
        $('#ButBuscar').click(function(){
            var url = "UsuarioBuscado.php";
            $.ajax({
                type: "POST",
                url: url,
                data: $("#myForm").serialize(),
                success: function(data)
                {
                    $('#resultado').html(data);
                }
            });

        });
    });
    function formReset() {
        document.getElementById("myForm").reset();
    }
</script>
</body>
</html>
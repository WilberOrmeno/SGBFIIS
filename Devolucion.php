<!DOCTYPE html>
<html lang="es" style=" min-width: 800px;">
<?php
session_start();
include ("conexion.php");
include ("Cabecera.php");
$con=conectar();

$sSQL32="Call Combo_Usuario_Estudiante";
$result111=mysqli_query($con,$sSQL32);
$comboUsuarioEstudiante="";
while($res2 = mysqli_fetch_array($result111))
{	$comboUsuarioEstudiante.='<option value="'.$res2[0].'">'.$res2[1].'</option>';
}
mysqli_free_result($result111);
mysqli_close($con);

$con=conectar();


$Mysql="Call Combo_Total_Documentos";
$result112=mysqli_query($con,$Mysql);
$comboDocumentos="";
while($res2 = mysqli_fetch_array($result112)) {
    $comboDocumentos.='<option value="'.$res2[0].'">'.$res2[1].'</option>';
}

?>
<head>
	<meta charset="UTF-8">
	<title>Busqueda General</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/dataTable/jquery.dataTables.min.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #htit{
            color:#005454;
            font-size:300%;
            font-family:Calibri;
        }
    </style>
    <script type="text/javascript">
        function formReset(){
            document.getElementById("FormDevolucion").reset();
        }
        function showResults() {
            document.getElementById("resultados").style.display = "block";
        }
    </script>
</head>
<body style="background-image: url(images/libros.jpg); color: white; font">
<div class="container">

    <div class="container" style="color: white;">
        <h1 id="htit"><kbd>Registrar devolución</kbd></h1>
    </div>

    <form id="myForm" name="myForm"  method="post" class="form-horizontal"  style="color: white;">
            <label class="col-sm-2 control-label">Estudiante</label>
            <div class="form-group">
                <div class="col-sm-4" >
                    <select name="txtUsuarioAlumno" class="form-control"  style="width:100%">
                        <option disabled selected>Seleccionar...</option>
                        <?php echo $comboUsuarioEstudiante;?></select>
                </div>
            </div>

                <input type="text" name="btnres" style="display: none;" value="<?php global $btnre; echo $btnre; ;?>">
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
            var url = "DevolucionRealizada.php";
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

</script>

<br>

</body>
</html>
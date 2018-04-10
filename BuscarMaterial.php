<!DOCTYPE html>
<html lang="es">

<script>
    function submitForm(id, num){
        document.getElementById('IdModificar').value = id;
        document.getElementById("TipoModificar").value = num;
        document.getElementById('formRes').submit();
        //alert (document.getElementById('IdModificar').value);
        //alert (document.getElementById("TipoModificar").value);
    }
</script>

<?php
if(isset($_GET['t'])){
    $valor=($_GET['t']);
    session_start();
}
include("Cabecera.php");


include("conexion.php");
$con=conectar();

if(isset($_SESSION['nivelUsuario'])){
    $btnre=$_SESSION['nivelUsuario'];
}
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <title>Búsqueda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <style>
        #tel{
            margin-right:16px;
        }
        #htit{
            color:#005454;
            font-size:300%;
            font-family:Calibri;
        }
        #hdesc{
            font-size:175%;
            font-style:italic;
        }
    </style>
    <script>
        function tipoOnChange(sel) {
            if(sel.value=="0"){
                document.getElementById("libro").style.display = "none";
                document.getElementById("tesis").style.display = "none";
                document.getElementById("materialMultimedia").style.display = "none";
                $noSeleccionado="1";
            }
            if (sel.value=="1"){
                document.getElementById("libro").style.display = "";
                document.getElementById("tesis").style.display = "none";
                document.getElementById("materialMultimedia").style.display = "none";
                //document.getElementById("revista").style.display = "none";

                //alert (document.getElementById("TipoModificar").value);
            }
            if(sel.value=="2"){
                document.getElementById("libro").style.display = "none";
                document.getElementById("tesis").style.display = "";
                document.getElementById("materialMultimedia").style.display = "none";
                //document.getElementById("TipoModificar").value = "2";
                //alert (document.getElementById("TipoModificar").value);
            }
            if(sel.value=="3"){
                document.getElementById("libro").style.display = "none";
                document.getElementById("tesis").style.display = "none";
                document.getElementById("materialMultimedia").style.display = "";
                //document.getElementById("TipoModificar").value = "3";
                //alert (document.getElementById("TipoModificar").value);
            }

        }


    </script>

    <script type="text/javascript">
        function formReset(){
            document.getElementById("FormMaterial").reset();
        }
    </script>

</head>


<?php
$sSQL="Call Combo_Documento";
$result1=mysqli_query($con,$sSQL);
$comboDocumento="";
while($res = mysqli_fetch_array($result1)){
    $comboDocumento.='<option value="'.$res[0].'">'.$res[1].'</option>';
}
mysqli_free_result($result1);
mysqli_close($con);


$con=conectar();

$sSQL2="Call combo_mm";
$result2=mysqli_query($con,$sSQL2);

$comboMM="";
while($res2 = mysqli_fetch_array($result2)) {
    $comboMM.='<option value="'.$res2[0].'">'.$res2[1].'</option>';
}
?>
<body style="background-image: url(images/libros.jpg); color: white; font">
<div class="container">

    <div class="container" style="color: white;">
        <h1 id="htit"><kbd>Búsqueda de Documentos</kbd></h1>
    </div>

    <form id="myForm" name="myForm"  method="post" class="form-horizontal"  style="color: white;">
        <label class="col-sm-2 control-label">Tipo de Material Bibliográfico:</label>
        <div class="form-group">
            <div class="col-sm-4" >
                <select class="form-control" id="tipoList" name="tipoMaterial" onChange="tipoOnChange(this)">
                    <option value="todoo" selected>Seleccionar... (Todo)</option>
                    <?php echo $comboDocumento;?>
                </select>
            </div>
        </div>
        <div id="libro" style="display:none;">
            <label class="col-sm-2 control-label">Nombre</label>
            <div class="form-group">
                <div class="col-sm-4" >
                    <input class="form-control" type="text" name="nombreL" placeholder="Nombre">
                </div>
            </div>

            <label class="col-sm-2 control-label">Autor</label>
            <div class="form-group">
                <div class="col-sm-4" >
                    <input class="form-control" type="text" name="autorL" placeholder="Autor">
                </div>
            </div>

        </div>
        <div id="tesis" style="display:none;">
            <label class="col-sm-2 control-label">Nombre</label>
            <div class="form-group">
                <div class="col-sm-4" >
                    <input class="form-control" type="text" name="nombreT" placeholder="Nombre">
                </div>
            </div>
            <label class="col-sm-2 control-label">Autor</label>
            <div class="form-group">
                <div class="col-sm-4" >
                    <input class="form-control" type="text" name="autorT" placeholder="Autor">
                </div>
            </div>
            <label class="col-sm-2 control-label">Asesor</label>
            <div class="form-group">
                <div class="col-sm-4" >
                    <input class="form-control" type="text" name="asesorT" placeholder="Asesor">
                </div>
            </div>
        </div>

        <div id="materialMultimedia" style="display:none;">
            <label class="col-sm-2 control-label">Nombre</label>
            <div class="form-group">
                <div class="col-sm-4" >
                    <input class="form-control" type="text" name="nombreM" placeholder="Nombre">
                </div>
            </div>
            <label class="col-sm-2 control-label">Autor</label>
            <div class="form-group">
                <div class="col-sm-4" >
                    <input class="form-control" type="text" name="autorM" placeholder="Autor">
                </div>
            </div>
            <label class="col-sm-2 control-label">Tipo de material multimedia</label>
            <div class="form-group">
                <div class="col-sm-4">
                    <select class="form-control" name="tipoMM">
                        <option value="todo" selected>Seleccionar.. (Todos)</option>
                        <?php echo $comboMM;?>
                    </select>
                </div>
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
            var url = "MaterialBuscado.php";
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

<br>

</body>
</html>
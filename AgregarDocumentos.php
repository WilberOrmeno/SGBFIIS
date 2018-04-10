<html>
<?php
session_start();
include ("bloqueDeSeguridad.php");
include ("Cabecera.php");
include("conexion.php");
$con=conectar();

$sSQL="Call combo_Documento	";
$result1=mysqli_query($con,$sSQL);

$comboDocumento="";
while($res = mysqli_fetch_array($result1)) {
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


<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
    function tipoOnChange(sel) {
        if (sel.value=="1"){
            document.getElementById("libro").style.display = "";
            document.getElementById("tesis").style.display = "none";
            document.getElementById("materialMultimedia").style.display = "none";
        }
        if(sel.value=="2"){
            document.getElementById("libro").style.display = "none";
            document.getElementById("tesis").style.display = "";
            document.getElementById("materialMultimedia").style.display = "none";
        }
        if(sel.value=="3"){
            document.getElementById("libro").style.display = "none";
            document.getElementById("tesis").style.display = "none";
            document.getElementById("materialMultimedia").style.display = "";
        }
    }
    function showResults(){
        document.getElementById("resultados").style.display = "block";
    }
</script>
</head>
<body style="background-image: url(images/libros.jpg)">
    <form id="msform" action="DocumentoAgregado.php" method="POST" enctype="multipart/form-data">
        <fieldset style="margin-top: 0px; background-color: #E0E0E0">
            <h2 class="fs-title">Registrar nuevo documento</h2>
            <br>
                <label>Tipo de Documento</label>
                <select class="form-control" name="tipoMaterial" onChange="tipoOnChange(this)"><?php echo $comboDocumento;?></select>
            <div style="height: 10px;"></div>
            <!-- Libro -->
           <div id="libro" style="display:block;">
                <input type="text" name="nombLibro" placeholder="Nombre del libro" autofocus>
                <i class="fa fa-user"></i>
                <input type="text" name="autorLibro" value="" placeholder="Autor del libro">
                <i class="fa fa-user"></i>
               <input type="text" name="fechaLibro" placeholder="Fecha de publicación">
                <i class="fa fa-calendar"></i>
                <input type="text" name="edicLibro" value="" placeholder="Edición del libro">
                <i class="fa fa-calendar"></i>
                <input type="text" name="materiaLibro" value="" placeholder="Materia">
                <i class="fa fa-calendar"></i>
				<input type="text" name="cantLibro" value="" placeholder="Cantidad">
                <i class="fa fa-calendar"></i>
                <label for="">Descripción</label>
                <textarea class="" rows="3" name="descLibro"></textarea>
            </div>
      <!-- Tesis -->
            <div id="tesis" style="display:none;">
                <input type="text" name="nombTesis" placeholder="Nombre de la tesis" autofocus>
                <i class="fa fa-user"></i>
                <input type="text" name="autorTesis" value="" placeholder="Autor de la tesis">
                <i class="fa fa-user"></i>
                <input type="text" name="asesorTesis" placeholder="Asesor de la tesis">
                <i class="fa fa-calendar"></i>
                     <textarea class="" rows="3" name="descTesis"></textarea>
            </div>
            <!-- Material multimedia -->
            <div id="materialMultimedia" style="display:none;" align="left">
                <input type="text" name="nombMM" placeholder="Nombre del material multimedia" autofocus>
                <i class="fa fa-user"></i>
                <input type="text" name="autorMM" value="" placeholder="Autor del material multimedia">
                <i class="fa fa-user"></i>
                <label>Tipo</label>
                <select class="form-control" name="tipoMM" ><?php echo $comboMM;?></select>
                <div style="height: 10px;"></div>
                <input type="text" name="materMM" value="" placeholder="Materia">
                <i class="fa fa-calendar"></i>
				<input type="text" name="cantlibro" value="" placeholder="Cantidad">
                <i class="fa fa-calendar"></i>
                <label for="">Descripción</label>
                <textarea class="" rows="3" name="descMM"></textarea>
            </div>

          <!--  <button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#imagen">Agregar imagen</button>

           <div class="collapse fluid-container col-lg-offset-2 col-lg-8 col-lg-offset-2" style="padding-bottom: 20px; top: 20px;" align="center">
                <div id="dropzone" name="imgDoc" style="width: 200px;">
                    <div  action="/upload" class="dropzone needsclick" style="border-radius: 10px;">
                        <div class="dz-message needsclick">
                            Arrastra aquí tus archivos o haz click para seleccionar
                        </div>
                    </div>
                </div>
            </div> --><center>
                <td bgcolor="skyblue"><strong>Foto:</strong></td>
                <td><input type="file" name="foto" id="foto" value="Agregar imagen"></td>
                </center>
                <br>
                <input id="nextButton" type="submit" name="next" class="action-button" value="Registrar" />
        </fieldset>
    </form>




 <script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/fRegistro.js"></script>
</body>
</html>
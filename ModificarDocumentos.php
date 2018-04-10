<html>
<?php
session_start();
include ("bloqueDeSeguridad.php");
include("conexion.php");
include ("Cabecera.php");
$con=conectar();

$ID=$_POST['IdDeModificacion'];

$sql12="SELECT Documento_Tipo FROM Documentos WHERE Documento_id=$ID";
$result65=mysqli_query($con,$sql12);
$tipodoc=mysqli_fetch_array($result65);
  
  /*
 echo $ID; 
echo $tipodoc[0];
*/
mysqli_free_result($result65);
 mysqli_close($con); 
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



$sSQL22="Call combo_mm";
$result22=mysqli_query($con,$sSQL22);

$comboMM="";
while($res2 = mysqli_fetch_array($result22)) {
    $comboMM.='<option value="'.$res2[0].'">'.$res2[1].'</option>';
}

mysqli_free_result($result22);
 mysqli_close($con); 
 $con=conectar(); 


$DocNombre="Select Documento_Nombre from Documentos where Documento_id='$ID'";
$query2 = mysqli_query($con,$DocNombre);
$Nombre=mysqli_fetch_array($query2);


$DocAutor="Select Documento_Autor from Documentos where Documento_id='$ID'";
$query3 = mysqli_query($con,$DocAutor);
$Autor=mysqli_fetch_array($query3);

$DocFecha="Select Documento_Fecha_publicacion from Documentos where Documento_id='$ID'";
$query3 = mysqli_query($con,$DocFecha);
$Fecha=mysqli_fetch_array($query3);

$DocEdicion="Select Documento_Edicion from Documentos where Documento_id='$ID'";
$query4 = mysqli_query($con,$DocEdicion);
$Edicion=mysqli_fetch_array($query4);

$DocMateria="Select Documento_Materia from Documentos where Documento_id='$ID'";
$query5 = mysqli_query($con,$DocMateria);
$Materia=mysqli_fetch_array($query5);

$DocAsesor="Select Documento_Asesor from Documentos where Documento_id='$ID'";
$query6 = mysqli_query($con,$DocAsesor);
$Asesor=mysqli_fetch_array($query6);

$DocTipoMM="Select Documento_Tipo_MM from Documentos where Documento_id='$ID'";
$query7 = mysqli_query($con,$DocTipoMM);
$TipoMM=mysqli_fetch_array($query7);

$DocEstado="Select Documento_Estado from Documentos where Documento_id='$ID'";
$query8 = mysqli_query($con,$DocEstado);
$Estado=mysqli_fetch_array($query8);






?>
<head>
    <title>Modificar Material Bibliográfico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>


    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body style="background-image: url(images/libros.jpg)">



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
    <form id="msform" action="DocumentoModificado.php" method="POST" enctype="multipart/form-data">
        <fieldset style="margin-top: 0px; background-color: #E0E0E0">
            <h2 class="fs-title">Modificar Documento</h2>
            <br>
                <label>Tipo de Documento</label>
                 <select class="form-control" name="txtTipoMaterial" onChange="tipoOnChange(this)" ><?php echo $comboDocumento;?></select>
            <div style="height: 10px;"></div>
            <!-- Libro -->
           <div id="libro" style="display:block;">
		   <input  type="text"  maxlength="9" name="txtID" readonly value="<?php echo $_POST['IdDeModificacion']?>">
                <input type="text" name="txtNombreL"  placeholder="Nombre:             <?php echo $Nombre[0] ?>" autofocus>
                <i class="fa fa-user"></i>
                <input type="text" name="txtAutorL" value="" placeholder="Autor:                  <?php echo $Autor[0] ?>">
                <i class="fa fa-user"></i>
               <input type="text" name="txtFechaL" placeholder="Fecha:                  <?php echo $Fecha[0] ?>">
                <i class="fa fa-calendar"></i>
                <input type="text" name="txtEdicionL" value="" placeholder="Edicion:                  <?php echo $Edicion[0] ?>">
                <i class="fa fa-calendar"></i>
                <input type="text" name="txtMateriaL" value="" placeholder="Materia:                  <?php echo $Materia[0] ?>">
                <i class="fa fa-calendar"></i>
              
            </div>
      <!-- Tesis -->
            <div id="tesis" style="display:none;">
			   <input  type="text"  maxlength="9" name="txtID" readonly value="<?php echo $_POST['IdDeModificacion']?>">
                <input type="text" name="txtNombreT" placeholder="Nombre:                  <?php echo $Nombre[0] ?>" autofocus>
                <i class="fa fa-user"></i>
                <input type="text" name="txtAutorT" value="" placeholder="Autor:                  <?php echo $Autor[0] ?>">
                <i class="fa fa-user"></i>
                <input type="text" name="txtAsesorT" placeholder="Asesor:                  <?php echo $Asesor[0] ?>">
                <i class="fa fa-calendar"></i>
                    
            </div>
            <!-- Material multimedia -->
            <div id="materialMultimedia" style="display:none;" align="left">
			   <input  type="text"  maxlength="9" name="txtID" readonly value="<?php echo $_POST['IdDeModificacion']?>">
                <input type="text" name="txtNombreMM" placeholder="Nombre:                  <?php echo $Nombre[0] ?>" autofocus>
                <i class="fa fa-user"></i>
                <input type="text" name="txtAutorMM" value="" placeholder="Autor:                  <?php echo $Autor[0] ?>">
                <i class="fa fa-user"></i>
                <label>Tipo</label>
                <select class="form-control" name="txtTipoMM" ><?php echo $comboMM;?></select>
                <div style="height: 10px;"></div>
                <input type="text" name="txtMateriaMM" value="" placeholder="Materia:                  <?php echo $Materia[0] ?>">
                <i class="fa fa-calendar"></i>
             
				
				
            </div>



			<input id="ButModifi" type="submit" id="next" class="action-button" value="Modificar" />



		</form>






</div>
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/fRegistro.js"></script>
</body>
</html>
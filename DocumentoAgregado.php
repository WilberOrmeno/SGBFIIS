<?php
session_start();
include ("Cabecera.php");
include ("bloqueDeSeguridad.php");
include("conexion.php");
$con=conectar();
$selectOption = $_POST['tipoMaterial'];
$TipoMaterial= $_POST['tipoMaterial'];

switch ($selectOption){
        case '1':
                $nombreLibro = $_POST['nombLibro'];
                $autorLibro= $_POST['autorLibro'];
                $fecPubLibro = $_POST['fechaLibro'];
                $edicionLibro = $_POST['edicLibro'];
                $materiaLibro = $_POST['materiaLibro'];
				$cantLibro = $_POST['cantLibro'];
                $descripcionLibro =$_POST['descLibro'];
				$fotoL=$_FILES["foto"]["name"];
				$ruta=$_FILES["foto"]["tmp_name"];
				$destino="FotoDocumentos/".$fotoL;
				copy($ruta,$destino);
                $insertadoLibro = "INSERT INTO `documentos` (`Documento_Tipo`, `Documento_Nombre`, `Documento_Autor`,  `Documento_Fecha_publicacion`, `Documento_Edicion`, `Documento_Materia`, `Documento_Cantidad`,`Documento_Descripcion`,`Documento_Imagen`,`Documento_Estado`)
                                  VALUES ('$TipoMaterial','$nombreLibro','$autorLibro ','$fecPubLibro','$edicionLibro','$materiaLibro','$cantLibro ','$descripcionLibro','$destino','1')";
                $stmt = mysqli_query($con,$insertadoLibro);

        break;
        case '2':
                $nombreTesis = $_POST['nombTesis'];
                $autorTesis = $_POST['autorTesis'];
                $asesorTesis = $_POST['asesorTesis'];
                $descripcionTesis = $_POST['descTesis'];
                $fotoT=$_FILES["foto"]["name"];
                $ruta=$_FILES["foto"]["tmp_name"];
                $destino="FotoDocumentos/".$fotoT;
                copy($ruta,$destino);
                $insertadoTesis = "INSERT INTO `documentos` (`Documento_Tipo`, `Documento_Nombre`, `Documento_Autor`, `Documento_Asesor`, `Documento_Descripcion`,`Documento_Imagen`,`Documento_Estado`) 
                                  VALUES ('$TipoMaterial','$nombreTesis','$autorTesis', '$asesorTesis', '$descripcionTesis','$destino','1')";
                $stmt = mysqli_query($con,$insertadoTesis);

        break;
        case '3':
                $nombreMM = $_POST['nombMM'];
                $autorMM = $_POST['autorMM'];
                $tipoMM= $_POST['tipoMM'];
                $materiaMM = $_POST['materMM'];
                $descripcionMM = $_POST['descMM'];
				$cantLibro = $_POST['cantlibro'];
                $fotoM=$_FILES["foto"]["name"];
                $ruta=$_FILES["foto"]["tmp_name"];
                $destino="FotoDocumentos/".$fotoM;
                copy($ruta,$destino);
                $insertadoMM = "INSERT INTO `documentos` (`Documento_Tipo`, `Documento_Nombre`, `Documento_Autor`, `Documento_Tipo_MM`, `Documento_Materia`, `Documento_Descripcion`,`Documento_Imagen`,`Documento_Cantidad`,`Documento_Estado`) 
                                VALUES ('$TipoMaterial','$nombreMM','$autorMM','$tipoMM','$materiaMM','$descripcionMM','$destino','$cantLibro','1')";
                 $stmt = mysqli_query($con,$insertadoMM);

        break;
}

?>


<html>
 <center><h1 id="htit"><kbd>Documento Agregado</kbd></h1></center>

<center>
<div align="center" style="text-align: center; background-color: lightgray; width: 500px; border-radius: 15px; margin-top: 20px;">
        <br>
<?php
$con=conectar();
$selectOption = $_POST['tipoMaterial'];
switch ($selectOption) {
        case '1':
                $consulta = "select * FROM documentos WHERE Documento_id = (select MAX(Documento_id) from documentos)";
                $sql = mysqli_query($con, $consulta);
                if ($res = mysqli_fetch_array($sql)) {
                echo '<h4 style="font-weight: bold;">TIPO: Libro</h4>';
                echo '<h4 style="font-weight: bold;">NOMBRE: '.$res["Documento_Nombre"].'</h4>';
                echo '<h4 style="font-weight: bold;">AUTOR: '.$res["Documento_Autor"].'</h4>';
                echo '<h4 style="font-weight: bold;">FECHA P.: '.$res["Documento_Fecha_publicacion"].'</h4>';
                echo '<h4 style="font-weight: bold;">EDICIÓN : '.$res["Documento_Edicion"].'</h4>';
                echo '<h4 style="font-weight: bold;">MATERIA : '.$res["Documento_Materia"].'</h4>';
				echo '<h4 style="font-weight: bold;">CANTIDAD : '.$res["Documento_Cantidad"].'</h4>';
                echo '<img src="'.$res["Documento_Imagen"].'" width="200" heigth="150" align="center">';
                }
                break;
        case '2':
                $consulta = "select * FROM documentos WHERE Documento_id = (select MAX(Documento_id) from documentos)";
                $sql = mysqli_query($con, $consulta);
                if ($res = mysqli_fetch_array($sql)) {
                        echo '<h4 style="font-weight: bold;">TIPO: Tesis</h4>';
                        echo '<h4 style="font-weight: bold;">NOMBRE: '.$res["Documento_Nombre"].'</h4>';
                        echo '<h4 style="font-weight: bold;">AUTOR: '.$res["Documento_Autor"].'</h4>';
                        echo '<h4 style="font-weight: bold;">ASESOR: '.$res["Documento_Asesor"].'</h4>';
                        echo '<img src="'.$res["Documento_Imagen"].'" width="200" heigth="150" align="center">';
                }
                break;
        case '3':
                $consulta = "select * FROM documentos WHERE Documento_id = (select MAX(Documento_id) from documentos)";
                $sql = mysqli_query($con, $consulta);
                if ($res = mysqli_fetch_array($sql)) {
                        echo '<h4 style="font-weight: bold;">TIPO: Material Multimedia</h4>';
                        echo '<h4 style="font-weight: bold;">NOMBRE: '.$res["Documento_Nombre"].'</h4>';
                        echo '<h4 style="font-weight: bold;">AUTOR: '.$res["Documento_Autor"].'</h4>';
                        echo '<h4 style="font-weight: bold;">TIPO DE MM: '.$res["Documento_Tipo_MM"].'</h4>';
                        echo '<h4 style="font-weight: bold;">MATERIA: '.$res["Documento_Materia"].'</h4>';
						echo '<h4 style="font-weight: bold;">CANTIDAD : '.$res["Documento_Cantidad"].'</h4>';
                        echo '<img src="'.$res["Documento_Imagen"].'" width="200" heigth="150" align="center">';
                }
                break;
}
?>
        <br>
        <br>
        <br>
</div>
</center>

</center><br>
<center><form action="AgregarDocumentos.php" method="POST"	>
        <button class="btn-lg btn-success">Regresar</button>
    </form>
</center>


</html>

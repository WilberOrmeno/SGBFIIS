<?php 
session_start();
include ("Cabecera.php");
include ("bloqueDeSeguridad.php");
include("conexion.php");
$con=conectar();

$ID = $_POST['txtID'];
$TipoDocumento=$_POST['txtTipoMaterial'];




if($TipoDocumento==1)
			{$Nombre=$_POST['txtNombreL'];
			  $Autor = $_POST['txtAutorL'];
			  $Fecha = $_POST['txtFechaL'];
			  $Edicion = $_POST['txtEdicionL'];
			  $Materia = $_POST['txtMateriaL'];
				$insertado = "UPDATE `biblioteca`.`Documentos` SET  `Documento_Nombre`='$Nombre', 
			`Documento_Autor`='$Autor ', `Documento_Fecha_publicacion`='$Fecha ', `Documento_Edicion`='$Edicion',
			`Documento_Materia`='$Materia'
			WHERE `Documento_id`='$ID'"; 
			$stmt = mysqli_query($con,$insertado);
			}
if($TipoDocumento==2)
		  {$Nombre=$_POST['txtNombreT'];
			$Autor = $_POST['txtAutorT'];
			$Asesor = $_POST['txtAsesorT'];
			$insertado = "UPDATE `biblioteca`.`Documentos` SET  `Documento_Nombre`='$Nombre', 
			`Documento_Autor`='$Autor ', `Documento_Asesor`='$Asesor '
			WHERE `Documento_id`='$ID'"; 
			$stmt = mysqli_query($con,$insertado);
			}
if($TipoDocumento==3)
			{$Nombre=$_POST['txtNombreMM'];
			$Autor = $_POST['txtAutorMM'];
			$Materia = $_POST['txtMateriaMM'];	
			$TipoMM = $_POST['txtTipoMM'];	
				
			$insertado = "UPDATE `biblioteca`.`Documentos` SET `Documento_Nombre`='$Nombre', 
			`Documento_Autor`='$Autor', `Documento_Materia`='$Materia', `Documento_Tipo_MM`='$TipoMM' 
			WHERE `Documento_id`='6';"; 
			$stmt = mysqli_query($con,$insertado);
			}	
?>

<html><br><br><br><br><br>
<center><div class="container" style="color: white;">
       <center><h1 id="htit"><kbd>DOCUMENTO MODIFICADO</kbd></h1></center>
	   <br>
    </div></center><br>
<center><form action="BuscarMaterial.php?t=1" method="POST"	>
    <input type="submit" value="Regresar" />
</form></center>
</html>

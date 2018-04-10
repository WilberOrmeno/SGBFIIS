<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="css/bootstrap.css">
<?php
include("Conexion.php");
$con=conectar();
if(isset($_POST['txtUsuarioAlumno'])==true){
    $nom = $_POST['txtUsuarioAlumno'];
    $sSQL="Select a.Prestamo_Id,b.UsuarioNombre,a.Prestamo_Fecha,a.Prestamo_Fecha_Dev,c.Documento_Nombre
 from Prestamo a left join usuarios b 
 on a.Prestamo_Usuario_Id=b.UsuarioID left join documentos c 
 on a.Prestamo_Documento_Id = c.Documento_id
 where a.Prestamo_Usuario_Id like '%$nom'";

    $stmt2 = mysqli_query($con,$aumento);

}else{
    $sSQL="Select a.Prestamo_Id,b.UsuarioNombre,a.Prestamo_Fecha,a.Prestamo_Fecha_Dev,c.Documento_Nombre
 from Prestamo a left join usuarios b 
 on a.Prestamo_Usuario_Id=b.UsuarioID left join documentos c 
 on a.Prestamo_Documento_Id = c.Documento_id";

}
$result=mysqli_query($con,$sSQL);



$tabla="";
$tabla.='<table id="muestratabla" class="table table-bordered table-hover" style="background-color: GRAY" >';
$tabla.= '<thead><tr>';
$tabla.= '<th bgcolor="yellow"  id="UsuarioID"><font color="black">ID</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioLogin"><font color="black">doc</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioNombre"><font color="black">Nombre</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioPassword"><font color="black">Fecha Prestamo</th>';
$tabla.= '<th bgcolor="yellow" id="UsuarioPassword"><font color="black">Fecha Devolucion</th>';

$tabla.= '<th bgcolor="yellow" id="IDModif"><font color="black">Modificar</th>';
$tabla.= '</tr></thead>';

while($extraido = mysqli_fetch_array($result) )
{ global $res2;
    $tabla.= '<tr>';
    $tabla.= '<td>'.$extraido['Prestamo_Id'].'</td>';
    $tabla.= '<td>'.$extraido['Documento_Nombre'].'</td>';
    $tabla.= '<td>'.$extraido['UsuarioNombre'].'</td>';
    $tabla.= '<td>'.$extraido['Prestamo_Fecha'].'</td>';
    $tabla.= '<td>'.$extraido['Prestamo_Fecha_Dev'].'</td>';
    $tabla.= '<td><form id="formmodif" name="formmodif" action="RegistrarDevolucion.php" METHOD="post">
<center><input type="text" id="IDModificar" name="IDPrestamo" placeholder="ID" style="display: none" value="'.$extraido['Prestamo_Id'].'"/>
<input id="ButModifi" type="submit" name="next" class="action-button" value="Registrar devolucion" style="color: black" />
<span id="resultado"></span>
</form></td>';
    $tabla.= '</tr>';
}
echo $tabla;

?>

<script>
    $(document).ready(function() {
        $('#muestratabla').DataTable({
            "order": []
        });
    } );
</script>


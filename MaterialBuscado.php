<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="css/bootstrap.css">
<?php
include("Conexion.php");
$con=conectar();

$nombreL = $_POST['nombreL'];
$autorL = $_POST['autorL'];
$nombreT = $_POST['nombreT'];
$autorT = $_POST['autorT'];
$asesorT = $_POST['asesorT'];
$nombreM= $_POST['nombreM'];
$autorM = $_POST['autorM'];
$btnres = $_POST['btnres'];

$TipoDoc = $_POST['tipoMaterial'];

//CAMBIADO DOCUMENTO_ID_PRINCIPAL A DOCUMENTO_ID

if ($TipoDoc=="todoo"){
    //Libros
    $sSQL1 = "Select a.Documento_id,b.Nombre_tipo_documento,a.Documento_nombre,a.Documento_Autor,a.Documento_Edicion,
a.Documento_Cantidad,a.Documento_Fecha_publicacion, a.Documento_materia 
from documentos a left join Documento_Tipo b on a.Documento_TIpo=b.Id_Tipo_Documento where Documento_Tipo like '%1%'";

    $result1=mysqli_query($con,$sSQL1) or die;
    $tabla1="";
    $tabla1.='<table id="muestratabla" class="table table-bordered table-hover" style="background-color: GRAY" >';
    $tabla1.= '<thead><tr>';
    $tabla1.= '<th bgcolor="yellow" ><font color="black">ID</th>';
    $tabla1.= '<th bgcolor="yellow" ><font color="black">Tipo</th>';
    $tabla1.= '<th bgcolor="yellow" ><font color="black">Nombre</th>';
    $tabla1.= '<th bgcolor="yellow" ><font color="black">Autor</th>';
    $tabla1.= '<th bgcolor="yellow" ><font color="black">Edicion</th>';
    $tabla1.= '<th bgcolor="yellow" ><font color="black">Materia</th>';
    $tabla1.= '<th bgcolor="yellow" ><font color="black">Cantidad</th>';
    $tabla1.= '<th bgcolor="yellow" id="IDModif"><font color="black">Modificar</th>';

    $tabla1.= '</tr></thead>';
    while($extraido1 = mysqli_fetch_array($result1) )
    {
        if($btnres==1){
            $boton='<td><form id="formmodif" name="formmodif" action="ModificarDocumentos.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdDeModificacion" placeholder="ID" style="display: none" value="'.$extraido1['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Modificar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
        }else{
            $boton='<td><form id="formmodif" name="formmodif" action="Texto.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdReserva" placeholder="ID" style="display: none" value="'.$extraido1['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Reservar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
        }

        $tabla1.= '<tr>';
        $tabla1.= '<td>'.$extraido1['Documento_id'].'</td>';
        $tabla1.= '<td>'.$extraido1['Nombre_tipo_documento'].'</td>';
        $tabla1.= '<td>'.$extraido1['Documento_nombre'].'</td>';
        $tabla1.= '<td>'.$extraido1['Documento_Autor'].'</td>';
        $tabla1.= '<td>'.$extraido1['Documento_Edicion'].'</td>';
        $tabla1.= '<td>'.$extraido1['Documento_materia'].'</td>';
        $tabla1.= '<td>'.$extraido1['Documento_Cantidad'].'</td>';
        $tabla1.=  $boton;
        $tabla1.= '</tr>';

    }

    echo $tabla1;
    //Tesis

    $sSQL2 = "Select a.Documento_Asesor, a.Documento_id,b.Nombre_tipo_documento,a.Documento_nombre,a.Documento_Autor,a.Documento_Edicion,a.Documento_Cantidad,a.Documento_Fecha_publicacion, a.Documento_materia from documentos a left join Documento_Tipo b on a.Documento_TIpo=b.Id_Tipo_Documento WHERE Documento_Tipo like '%2%'";

    $result2=mysqli_query($con,$sSQL2) or die(mysqli_error($sSQL2));
    $tabla2="";
    $tabla2.='<table id="muestratabla" class="table table-bordered table-hover" style="background-color: GRAY" >';
    $tabla2.= '<thead><tr>';
    $tabla2.= '<th bgcolor="yellow" ><font color="black">ID</th>';
    $tabla2.= '<th bgcolor="yellow" ><font color="black">Tipo</th>';
    $tabla2.= '<th bgcolor="yellow" ><font color="black">Nombre</th>';
    $tabla2.= '<th bgcolor="yellow" ><font color="black">Autor</th>';
    $tabla2.= '<th bgcolor="yellow" ><font color="black">Asesor</th>';


    $tabla2.= '<th bgcolor="yellow" id="IDModif"><font color="black">Modificar</th>';
    $tabla2.= '</tr></thead>';
    while($extraido2 = mysqli_fetch_array($result2) )
    {
        if($btnres==1){
            $boton='<td><form id="formmodif" name="formmodif" action="ModificarDocumentos.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdDeModificacion" placeholder="ID" style="display: none" value="'.$extraido2['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Modificar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
        }else{
            $boton='<td><form id="formmodif" name="formmodif" action="Texto.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdReserva" placeholder="ID" style="display: none" value="'.$extraido2['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Reservar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
        }
        $tabla2.= '<tr>';
        $tabla2.= '<td>'.$extraido2['Documento_id'].'</td>';
        $tabla2.= '<td>'.$extraido2['Nombre_tipo_documento'].'</td>';
        $tabla2.= '<td>'.$extraido2['Documento_nombre'].'</td>';
        $tabla2.= '<td>'.$extraido2['Documento_Autor'].'</td>';
        $tabla2.= '<td>'.$extraido2['Documento_Asesor'].'</td>';
        $tabla2.= $boton;
        $tabla2.= '</tr>';
    }

    echo $tabla2;
    //Material Multimedia
    $sSQL3 = "Select a.Documento_id,b.Nombre_tipo_documento,a.Documento_nombre,a.Documento_Autor,a.Documento_Edicion,a.Documento_Cantidad,a.Documento_Fecha_publicacion, a.Documento_materia, a.Documento_Tipo_MM from documentos a left join Documento_Tipo b on a.Documento_TIpo=b.Id_Tipo_Documento where Documento_Tipo like '%3%'";
    $result3=mysqli_query($con,$sSQL3);
    $tabla3="";
    $tabla3.='<table id="muestratabla" class="table table-bordered table-hover" style="background-color: GRAY" >';
    $tabla3.= '<thead><tr>';
    $tabla3.= '<th bgcolor="yellow" ><font color="black">ID</th>';
    $tabla3.= '<th bgcolor="yellow" ><font color="black">Tipo</th>';
    $tabla3.= '<th bgcolor="yellow" ><font color="black">Nombre</th>';
    $tabla3.= '<th bgcolor="yellow" ><font color="black">Autor</th>';
    $tabla3.= '<th bgcolor="yellow" ><font color="black">TipoMM</th>';
    $tabla3.= '<th bgcolor="yellow" ><font color="black">Materia</th>';
    $tabla3.= '<th bgcolor="yellow" ><font color="black">Cantidad</th>';

    $tabla3.= '<th bgcolor="yellow" id="IDModif"><font color="black">Modificar</th>';
    $tabla3.= '</tr></thead>';
    while($extraido3 = mysqli_fetch_array($result3) )
    {
        if($btnres==1){
            $boton='<td><form id="formmodif" name="formmodif" action="ModificarDocumentos.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdDeModificacion" placeholder="ID" style="display: none" value="'.$extraido3['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Modificar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
        }else{
            $boton='<td><form id="formmodif" name="formmodif" action="Texto.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdReserva" placeholder="ID" style="display: none" value="'.$extraido3['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Reservar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
        }
        $tabla3.= '<tr>';
        $tabla3.= '<td>'.$extraido3['Documento_id'].'</td>';
        $tabla3.= '<td>'.$extraido3['Nombre_tipo_documento'].'</td>';
        $tabla3.= '<td>'.$extraido3['Documento_nombre'].'</td>';
        $tabla3.= '<td>'.$extraido3['Documento_Autor'].'</td>';
        $tabla3.= '<td>'.$extraido3['Documento_Tipo_MM'].'</td>';
        $tabla3.= '<td>'.$extraido3['Documento_materia'].'</td>';
        $tabla3.= '<td>'.$extraido3['Documento_Cantidad'].'</td>';
        $tabla3.= $boton;
        $tabla3.= '</tr>';
    }
    echo $tabla3;

}else {
    switch ($TipoDoc) {
        case "1":
            $sSQL = "Select a.Documento_id,b.Nombre_tipo_documento,a.Documento_nombre,a.Documento_Autor,a.Documento_Edicion,a.Documento_Cantidad,a.Documento_Fecha_publicacion, a.Documento_materia from documentos a left join Documento_Tipo b on a.Documento_TIpo=b.Id_Tipo_Documento where Documento_nombre like '%$nombreL%' and Documento_Autor like '%$autorL%' and Documento_Tipo like '%$TipoDoc%'";

            $result=mysqli_query($con,$sSQL) or die(mysqli_error($sSQL));

            $tabla="";
            $tabla.='<table id="muestratabla" class="table table-bordered table-hover" style="background-color: GRAY" >';
            $tabla.= '<thead><tr>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">ID</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Tipo</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Nombre</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Autor</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Edicion</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Materia</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Cantidad</th>';

            $tabla.= '<th bgcolor="yellow" id="IDModif"><font color="black">Modificar</th>';
            $tabla.= '</tr></thead>';
            while($extraido = mysqli_fetch_array($result) )
            {
                if($btnres==1){
                    $boton='<td><form id="formmodif" name="formmodif" action="ModificarDocumentos.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdDeModificacion" placeholder="ID" style="display: none" value="'.$extraido['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Modificar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
                }else{
                    $boton='<td><form id="formmodif" name="formmodif" action="Texto.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdReserva" placeholder="ID" style="display: none" value="'.$extraido['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Reservar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
                }
                $tabla.= '<tr>';
                $tabla.= '<td>'.$extraido['Documento_id'].'</td>';
                $tabla.= '<td>'.$extraido['Nombre_tipo_documento'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_nombre'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_Autor'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_Edicion'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_materia'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_Cantidad'].'</td>';
                $tabla.= $boton;
                $tabla.= '</tr>';
            }
            echo $tabla;
            break;
        case "2":
            $sSQL = "Select a.Documento_Asesor, a.Documento_id,b.Nombre_tipo_documento,a.Documento_nombre,a.Documento_Autor,a.Documento_Edicion,a.Documento_Cantidad,a.Documento_Fecha_publicacion, a.Documento_materia from documentos a left join Documento_Tipo b on a.Documento_TIpo=b.Id_Tipo_Documento  where Documento_nombre like '%$nombreT%' and Documento_Autor like '%$autorT%'  and Documento_Asesor like '%$asesorT%' and Documento_Tipo like '%$TipoDoc%'";

            $result=mysqli_query($con,$sSQL) or die(mysqli_error($sSQL));

            $tabla="";
            $tabla.='<table id="muestratabla" class="table table-bordered table-hover" style="background-color: GRAY" >';
            $tabla.= '<thead><tr>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">ID</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Tipo</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Nombre</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Autor</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Asesor</th>';


            $tabla.= '<th bgcolor="yellow" id="IDModif"><font color="black">Modificar</th>';
            $tabla.= '</tr></thead>';
            while($extraido = mysqli_fetch_array($result) )
            {
                if($btnres==1){
                    $boton='<td><form id="formmodif" name="formmodif" action="ModificarDocumentos.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdDeModificacion" placeholder="ID" style="display: none" value="'.$extraido['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Modificar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
                }else{
                    $boton='<td><form id="formmodif" name="formmodif" action="Texto.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdReserva" placeholder="ID" style="display: none" value="'.$extraido['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Reservar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
                }
                $tabla.= '<tr>';
                $tabla.= '<td>'.$extraido['Documento_id'].'</td>';
                $tabla.= '<td>'.$extraido['Nombre_tipo_documento'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_nombre'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_Autor'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_Asesor'].'</td>';
                $tabla.= $boton;
                $tabla.= '</tr>';
            }

            echo $tabla;
            break;
        case "3":
            if (isset($_POST['tipoMM'])) {
                $TipoM = $_POST['tipoMM'];
                if ($TipoM == "todo") {
                    $sSQL = "Select a.Documento_id,b.Nombre_tipo_documento,a.Documento_nombre,a.Documento_Autor,a.Documento_Edicion,a.Documento_Cantidad,a.Documento_Fecha_publicacion, a.Documento_materia, a.Documento_Tipo_MM from documentos a left join Documento_Tipo b on a.Documento_TIpo=b.Id_Tipo_Documento  where Documento_nombre like '%$nombreM%' and Documento_Autor like '%$autorM%' and Documento_Tipo like '%$TipoDoc%'";
                } else {
                    $sSQL = "Select a.Documento_id,b.Nombre_tipo_documento,a.Documento_nombre,a.Documento_Autor,a.Documento_Edicion,a.Documento_Cantidad,a.Documento_Fecha_publicacion, a.Documento_materia,a.Documento_Tipo_MM from documentos a left join Documento_Tipo b on a.Documento_TIpo=b.Id_Tipo_Documento  where Documento_nombre like '%$nombreM%' and Documento_Autor like '%$autorM%' and Documento_Tipo_MM like '%$TipoM%' and Documento_Tipo like '%$TipoDoc%'";
                }
            }

            $result=mysqli_query($con,$sSQL);
            $tabla="";
            $tabla.='<table id="muestratabla" class="table table-bordered table-hover" style="background-color: GRAY" >';
            $tabla.= '<thead><tr>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">ID</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Tipo</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Nombre</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Autor</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">TipoMM</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Materia</th>';
            $tabla.= '<th bgcolor="yellow" ><font color="black">Cantidad</th>';

            $tabla.= '<th bgcolor="yellow" id="IDModif"><font color="black">Modificar</th>';
            $tabla.= '</tr></thead>';


            while($extraido = mysqli_fetch_array($result) )
            {
                if($btnres==1){
                    $boton='<td><form id="formmodif" name="formmodif" action="ModificarDocumentos.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdDeModificacion" placeholder="ID" style="display: none" value="'.$extraido['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Modificar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
                }else{
                    //CAMBIADO NAME DE FORM
                    $boton='<td><form id="formmodif" name="formmodif" action="Texto.php" METHOD="post">
                            <center><input type="text" id="IDModificar" name="IdReserva" placeholder="ID" style="display: none" value="'.$extraido['Documento_id'].'"/>
                            <input id="ButModifi" type="submit" name="next" class="action-button" value="Reservar" style="color: black" />
                            <span id="resultado"></span>
                            </form></td>';
                }
                $tabla.= '<tr>';
                $tabla.= '<td>'.$extraido['Documento_id'].'</td>';
                $tabla.= '<td>'.$extraido['Nombre_tipo_documento'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_nombre'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_Autor'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_Tipo_MM'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_materia'].'</td>';
                $tabla.= '<td>'.$extraido['Documento_Cantidad'].'</td>';
                $tabla.= $boton;
                $tabla.= '</tr>';
            }
            echo $tabla;
            break;
    }
}

?>

<script>
    $(document).ready(function() {
        $('#muestratabla').DataTable({
            "order": []
        });
    } );
</script>


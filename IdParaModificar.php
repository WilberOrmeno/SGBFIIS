<?php
session_start();
include ("bloqueDeSeguridad.php");
include ("Cabecera.php");
include("Conexion.php");
$con=conectar();

?>
  <script type="text/javascript">
  
$(document).on('ready',function(){       
    $('#ButModifi').click(function(){
        var url = "ModificarUsuarios.php";
        $.ajax({                        
           type: "POST",                 
           url: url,                     
           data: $("#formmodif").serialize(), 
           success: function(data)             
           {
             $('#resultado').html(data);               
           }
       }); 
	   
    });
});




</script>






<html><br>
<div class="container" style="color: white;">
       <center><h1 id="htit"><kbd>Ingrese ID del usuario a modificar</kbd></h1></center>
	   <br>
    </div>
<form id="formmodif" name="formmodif" action="ModificarUsuarios.php" method="POST">
<center><input type="text" id="IDModificar" name="IdDeModificacion" placeholder="ID" autofocus required/>
<input id="ButModifi" type="button" name="next" class="action-button" value="Buscar" />
<span id="resultado"></span>	
</form>

</html>
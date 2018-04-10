<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>SGBFIIS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/dataTable/jquery.dataTables.min.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sRegistro.css">
	<!--Para el select-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
	<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">

    <nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="PantallaDeMuestra.php">Sistemas Bibliotecas</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
                  <?php if(session_status()==1 && isset($valor)==false){
                    echo '<li><a href="BuscarMaterial.php">Búsqueda</a></li>';

                }else {
                    switch ($_SESSION['nivelUsuario']){
                        case 1:
                        	$nivel="Administrador";
                            echo '<li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">Buscar
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="BuscarMaterial.php?t=1">Buscar Documentos</a></li>
                                      <li><a href="BuscarUsuarios.php">Buscar Usuarios</a></li>
                                    </ul>
                                  </li>';
                            break;
                        case 2:
							$nivel="Bibliotecario";
							echo '<li><a href="BuscarUsuarios.php">Búsqueda</a></li>';
                            break;
                        case 3:
							$nivel="Estudiante";
							echo '<li><a href="BuscarMaterial.php?t=1">Búsqueda</a></li>';
                            break;
                    }
                }

                ?>
                <?php if(session_status()==1 && isset($valor)==false) {
                      echo '<li><a href="Contactenos.php">Contáctenos</a></li>';
                  }else{
                      echo '<li><a href="Contactenos.php?t=1">Contáctenos</a></li>';
                  }
                ?>
				</ul>
	    	<ul class="nav navbar-nav navbar-right">
			<?php
			if (session_status()==1 && isset($valor)==false){?>
	<li class="desactive"><a href="IngresoUsuario.php"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
	<?php
	}
	else {
		?><li class="desactive"><a><?php echo 'Bienvenido: '.$_SESSION['nombreusuario'].' / '.$nivel ?></a></li>
        <li class="desactive"><a href="Salir.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
	<?php
		    }
	?>
			</ul>
	    </div>
		</div>
	</nav>

</head>
<body style="background-image: url(images/libros.jpg)">
</body>	

</html>
<!DOCTYPE html>
<html lang="es">
<head>
<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="Index.php">Sistemas Bibliotecas</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="BuscarMaterial.php">Búsqueda</a></li>
				<li><a href="Contactenos.php">Contáctenos</a></li>

			</ul>
	    	<ul class="nav navbar-nav navbar-right">			
			<li class="desactive"><a href="IngresoUsuario.php"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a></li>
	    </div>
		</div>
	</nav>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		#carousel-inner div{
			position: relative;
			width: 100%;
			padding-top: 50%;
		}
	</style> 	
</head>

<body style="background-image: url(images/libros.jpg)">
	<div class="container">
			
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
		    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="images/portada/1.jpg" alt="...">
				</div>
				<div class="item">
					<img src="images/portada/2.jpg" alt="...">
				</div>
				<div class="item"> <img src="images/portada/3.jpg" alt="..."> </div>

			</div>
 
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		</a>
		 
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>
	</div>

	<br><br>

	<div class="row">
		<div class="col-xs-6 col-md-3">
		    <a href="#" class="thumbnail">
			    <img src="images/novedades/1.jpg" alt="Programación">
		    </a>
		</div>
		<div class="col-xs-6 col-md-3">
		    <a href="#" class="thumbnail">
			    <img src="images/novedades/2.jpg" alt="Programación">
		    </a>
		</div>
		<div class="col-xs-6 col-md-3">
		    <a href="#" class="thumbnail">
			    <img src="images/novedades/3.jpg" alt="Programación">
		    </a>
		</div>
		<div class="col-xs-6 col-md-3">
		    <a href="#" class="thumbnail">
			    <img src="images/novedades/4.jpg" alt="Programación">
		    </a>
		</div>
	</div>
	
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="well well-lg">
						<span>© Copyright 2015 - Todos los derechos reservados</span><br>
						<span>Facultad de Ingeniería Industrial y de Sistemas</span>
					</div>
				</div>
			</div>
		</div>	
	</footer>
	
</body>

</html>

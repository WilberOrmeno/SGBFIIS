<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="UTF-8">
	<title>Busqueda General</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="js/dataTable/jquery.dataTables.min.css">
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/dataTable/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sRegistro.css">
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
	<title>Ingreso de Usuario</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
		#msform {
			max-width: 400px;
			padding: 15px;
			margin: 0 auto;
		}
		#avatar{
			width: 96px;
			height: 96px;
			margin: 0px auto 10px;
			display: block;
			text-align: ;
			border-radius: 20%;
		}
		#msform input[type=text]:focus + i.fa {
			opacity: 1;
			left: 30px;
			transition: all 0.25s ease-out;
		}
		#msform input[type=password]:focus + i.fa {
			opacity: 1;
			left: 30px;
			transition: all 0.25s ease-out;
		}

	 </style>

	<script src="js/model.js"></script>
	<script>
		function buscarUsuario(){
			var idUsuario = document.getElementById('email');
			var usuario = new Usuario(null,null,null,null,idUsuario.value,null,null,null,null,null,null);
			var ajax = new XMLHttpRequest();
			ajax.onreadystatechange = function(){
				if(ajax.status == 200 && ajax.readyState == 4){
					document.getElementById('email').value = 'Se ejecuto HTTP Request'
				}
			};

			ajax.open('POST','/buscarUsuario');
			ajax.setRequestHeader('Content-type', 'application/json')
			ajax.send(usuario);
		}
	</script>
</head>

<body style="background-image: url(images/libros.jpg)">
	<div class="container" id ="sha">

		<br><br>
		
		<div class="row">
			<div class="col-xs-12">
				<img src="images/ingreso/librousuario.jpg" class="img responsive"  id="avatar">
			</div>
		</div>

		<br>

		<form id="msform" action="autenticacion.php" method="POST">
			<input type="text" id="textuser" name="user" placeholder="Usuario" autofocus required/>
			<i class="fa fa-user"></i>
			<input type="password" id="textpass" name="pass" id="myPassword" placeholder="Contraseña" required/>
			<i class="fa fa-key"></i>			
			<button id="login-password" type="submit" class="btn btn-success" onclick="buscarUsuario()">Iniciar sesión</button>
			<div class="checkbox">
				<label class="checkbox">
					<input type="checkbox" value="1" name="remenber">No cerrar sesión 
				</label>
				<p class="help-block"><a href="#">¿No puedes acceder a tu cuenta ?</a></p>
			</div>
		</form>
	</div>

	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/fRegistro.js"></script>
</body>
</html>
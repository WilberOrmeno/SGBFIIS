<!DOCTYPE html>
<head>
<?php
session_start();
include ("bloqueDeSeguridad.php");
include ("Cabecera.php")
?>
    <meta charset="UTF-8">
    <title>Historial de préstamos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        html{overflow: auto;}
    </style>
</head>

<body style="background-image: url(images/libros.jpg); min-width: 800px;">
<div class="container solid" style="color: white;">
    <div class="col-md-12">
        <div id="resultados" class="container-fluid" align="center">
            <h2><kbd>Historial de préstamos</kbd></h2>
            <span class="counter pull-right"></span>
            <table class="table table-hover table-bordered results" style="background-color: lightgray; color: #000;">
                <thead style="background-color: white">
                <tr>
                    <th>#</th>
                    <th class="col-md-3 col-xs-3">Titulo</th>
                    <th class="col-md-2 col-xs-2">Autor</th>
                    <th class="col-md-2 col-xs-2">Tipo</th>
                    <th class="col-md-2 col-xs-2">Fecha de préstamo</th>
                    <th class="col-md-2 col-xs-2">Estado</th>
                    <th></th>
                </tr>

                </thead>
                <tbody >
                <tr>
                    <th scope="row">1</th>
                    <td>Aplicación de la teóría de colas a los supermercados</td>
                    <td>Manuel Gómez Cadillo</td>
                    <td>Tesis</td>
                    <td>24/05/17</td>
                    <td>No entregado</td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>La Divina Comedia</td>
                    <td>Dante Alighieri</td>
                    <td>Poema</td>
                    <td>18/05/17</td>
                    <td>Disponible</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="Texto.php">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Reservar
                        </a>
                    </td>
                </tr>

                <tr>
                    <th scope="row">3</th>
                    <td>Álgebra Lineal</td>
                    <td>Lourdes Kala Béjar</td>
                    <td>Libro Académico</td>
                    <td>14/04/17</td>
                    <td>No Disponible</td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
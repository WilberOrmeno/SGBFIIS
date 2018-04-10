<?php
session_start();
echo 'Sesión Cerrada';
session_unset();
session_destroy();

header("location:index.php");
?>
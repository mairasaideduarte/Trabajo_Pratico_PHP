<?php
session_start();
if(isset($_SESSION['usuario_id']) == false){
    header("location:registracion_usuarios.php");
    die("No ha iniciado sesion.");
}
 session_destroy();
 header("location: ingresar.php");
 ?> 
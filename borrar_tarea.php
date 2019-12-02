<?php
session_start();
if(isset($_SESSION['usuario_id']) == false){
    header("location:registracion_usuarios.php");
    die("No ha iniciado sesion.");

}
$conexion = mysqli_connect("localhost", "root", "", "todo2");
$sql = "DELETE FROM tareas WHERE id=$_GET[id]";
$respuesta = mysqli_query($conexion, $sql);
header("Location:menu.php");


?>
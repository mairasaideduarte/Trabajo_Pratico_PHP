<?php
session_start();
if(isset($_SESSION['usuario_id']) == false){
    header("location:registracion_usuarios.php");
    die("No ha iniciado sesion.");
}
?>
<html>
    <head>

    </head>
    <body>
        <form method="POST"  >
         <label>Tarea </label>
        <input type="text" name="tarea" >
        <label >Finalizado</label>
        <input type="text"name="finalizada">
        <button type="submit">Guardar</button>
        </form>
    </body>
</html>
<?php

$tarea = $_POST["tarea"];
$tarea_trim = trim($tarea);
$fecha=date('Y-m-d');
$finalizada=$_POST["finalizada"];

$mensaje="";
if(isset($tarea_trim)==false){
    $mensaje="no me mandaste tarea <br/>";
}
if (empty ($tarea_trim)==true){
    $mensaje="mensaje vacio <br/>";
}
if(empty($mensaje) == false) {
    echo $mensaje;
    die();
}


$conexion=mysqli_connect("localhost","root", "" ,"todo2");
$sql = "insert into tareas (tareas,FechaCreada,finalizada) values('$tarea','$fecha','$finalizada')";
$respuesta_consulta=mysqli_query($conexion , $sql);
if ($respuesta_consulta ) {
    header("location:menu.php");
    die();
   }else{
       die('no se pudo ingresar la tarea');
   }
  
   
?>
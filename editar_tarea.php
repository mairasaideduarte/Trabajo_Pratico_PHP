<?php
session_start();
if(isset($_SESSION['usuario_id']) == false){
    header("location:registracion_usuarios.php");
    die("No ha iniciado sesion.");
}

$id = $_GET["id"];
if(!empty($_POST)){
    if(!isset($_POST['tareas'])){
        die('no existe la tarea');
    }
    if(empty($_POST['tareas'])){
        die("debes ingresar una tarea");
    }
}
$conexion = mysqli_connect('localhost', 'root', '', 'todo2');
$sql = "select * from tareas where id=$id ";
$respuesta_consulta = mysqli_query($conexion, $sql);
$registro = mysqli_fetch_array($respuesta_consulta);
if ($registro==NULL) {
echo "tarea no encontrado";
die();
}

$tarea=$registro['tareas'];
$id=$registro['id'];
$finalizada=$registro['finalizada'];
$FechaCreada=$registro['FechaCreada'];
$FechaFinalizada=$registro['FechaFinalizada'];

?>
<html>
<body>
<form method="post">
<label>
tareas:
<input type="text" name="tareas" value="<?php echo $tarea;?> ">
</label>
<label>
finalizada:
<input type="text" name="finalizada" value="<?php echo $finalizada;?> ">
</label>
<label>
FechaCreada:
<input type="text" name="FechaCreada" value="<?php echo $FechaCreada;?> ">
</label>
FechaFinalizada:
<input type="text" name=FechaFinalizada value="<?php echo $FechaFinalizada;?>">
<button type="submit">Guardar</button>
</form>

    
</body>

</html>
<?php
if (!(empty($_POST))){
    $tarea=$_POST['tareas'];
    $id=$_GET['id'];
    $finalizada=$_POST['finalizada'];
    $FechaCreada=$_POST['FechaCreada'];
    $conexion = mysqli_connect('localhost', 'root', '', 'todo2');
    $consulta="UPDATE tareas SET tareas='$tarea' , finalizada=$finalizada, FechaCreada='$FechaCreada',FechaFinalizada='$FechaFinalizada' where id='$id' ";
    $respuesta_consulta = mysqli_query($conexion, $consulta);
    header('location:menu.php');

}
?>

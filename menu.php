<?php
session_start();
if(isset($_SESSION['usuario_id']) == false){
  header("location:registracion_usuarios.php");
    die("No ha iniciado sesion.");
}
?>
<html>
<body>
<title>Busqueda</title>
<h1>Buscador de tareas</h1>
<form method = 'POST'>
Filtrar tarea: <input type = 'text'  name = 'busqueda'>
<br><br>
Seleccionar tareas<select name = "realizada">
<option  value ="Todas">Todas</option><br>
<option value= "Si">Realizadas</option><br>
<option value = "No">Pendientes</option><br>
</select>
<input type ='submit' values = 'Enviar'> 
</form>
<button><a href="cerrar_sesion.php">cerrar sesion</a></button>
<button><a href="tarea.php">agregar tarea</a></button>
</body>
</html>

<?php
$filtro = "";
$realizada="";
if(isset($_POST['busqueda']) == false){
  if(isset($_GET["filtro"]) && isset($_GET["realizada"])){
      $filtro = ($_GET['filtro']);
      $realizada = $_GET["realizada"];
  }
} else {$filtro = trim($_POST['busqueda']);
         if(isset($_POST["realizada"])){
             $realizada = $_POST["realizada"];
         }
}
$conexion = mysqli_connect("localhost", "root", "", "todo2");

if($realizada == "Todas"){
  $sql = "SELECT * FROM tareas WHERE tareas like '%$filtro%'";
  $consulta = mysqli_query($conexion, $sql);
} else if($realizada == "Si"){
  $sql = "SELECT * FROM tareas WHERE tareas like '%$filtro%' and finalizada =1";
  $consulta = mysqli_query($conexion, $sql);
} else if($realizada == "No"){
  $sql = "SELECT * FROM tareas WHERE tareas like '%$filtro%' and finalizada=0";
  $consulta = mysqli_query($conexion, $sql);
}

echo"<table border=1>
<tr>
<td>tareas</td>
<td>id</td>
<td>finalizada</td>
<td>FechaCreada</td>
<td>editar</td>
<td>borrar</td>



";

while($registro = mysqli_fetch_array($consulta)) {
$tarea=$registro['tareas'];
$id=$registro['id'];
$finalizada=$registro['finalizada'];
$FechaCreada=$registro['FechaCreada'];
echo"<tr>
<td>$tarea</td>
<td>$id</td>
<td>$finalizada</td>
<td>$FechaCreada</td>
<td><a href='editar_tarea.php?id=$id'>editar</a></td>
<td><a href='borrar_tarea.php?id=$id'>borrar</a></td>



</tr>";
}
echo"</table>";
?>
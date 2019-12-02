
<html>
<body>
<h1>registracion</h1>
<form  method = "POST">
<label>
Nombre de Usuario: <input type = "text" name = "nombre_usuario"><br><br>
</label>
<label>
Contrasenia: <input type = "text" name = "contrasenia"><br><br>
</label>
<label>
Email: <input type = "text" name = "email"><br><br>
</label>
<label>
Nombre completo:<input type = "text" name = "nombre_completo"><br><br>
</label>

<button type = "submit">Enviar</button>
</form>
</body>
</html>
<?php
$mensajeError = "";
if(isset($_POST['nombre_usuario']) == false){
    $mensajeError = "No coinciden variables<br\>";
} 
if(isset($_POST['contrasenia']) == false){
      $mensajeError = "No coinciden variables<br\>";
}
if(isset($_POST['email']) == false){
        $mensajeError = "No coinciden variables<br\>";
}
if(isset($_POST['nombre_completo']) == false){
    $mensajeError = "No coinciden variables<br\>";
}
if(empty($mensajeError) == false){
    echo $mensajeError;
    die();
}
$usuario = trim($_POST['nombre_usuario']);
$password = trim($_POST['contrasenia']);
$email = trim($_POST['email']);
$nombre = trim($_POST['nombre_completo']);
$fecha = date("Y-m-d");
if(empty($usuario) == true){
    $mensajeError = "Error: escriba su usuario<br\>";
}   
if(empty($password) == true){
    $mensajeError = "Error: escriba su password<br\>";
}
if(empty($email) == true){
    $mensajeError = "Error: escriba su email<br\>";
}
if(empty($nombre) == true){
    $mensajeError = "Error: escriba su nombre<br\>";
}
if(empty($mensajeError) == false){
    echo $mensajeError;
    die();
}
$conexion = mysqli_connect("localhost", "root", "", "todo2");
$verificacionUsuario = "SELECT nombre_usuario FROM usuario WHERE nombre_usuario = '$usuario'";
$respuesta= mysqli_query($conexion, $verificacionUsuario);

$registro = mysqli_fetch_array($respuesta);

if($registro == NULL){
$passworde = password_hash("$password", PASSWORD_BCRYPT);
$sql =  "INSERT INTO usuario (nombre_usuario, contrasenia, email,nombre_completo, Fecha)
   VALUES ('$usuario', '$passworde', '$email', '$nombre', '$fecha')";
$consulta = mysqli_query($conexion, $sql);
if($consulta == false){
 die("No ha sido posible registrar su inscripcion.");
}
header("location: ingresar.php");
}
else {echo "Este nombre de usuario ya está siendo utilizada.";
      die();}

 ?>
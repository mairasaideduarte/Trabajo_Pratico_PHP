<html>
<body>
<h1>Verificacion de Usuario</h1>
<form  method = "POST">
Usuario: <input type = "text" name = "nombre_usuario"><br>
contrasenia: <input type = "text" name = "contrasenia">
<input type = "submit" values = "Enviar">
<label ><a href="registracion_usuarios.php">registrate</a></label>
</form>
</body>
</html>
<?php
if(!empty($_POST)){
    if(isset($_POST['nombre_usuario']) == false){
        die("No coinciden las variables");
    }
    if(isset($_POST['contrasenia']) == false){
        die("No coinciden las variables"); 
    }
    $usuario = trim($_POST['nombre_usuario']);
    $password = trim($_POST['contrasenia']);
    
    if(empty($usuario) == true || empty($password) == true){
        echo "Escriba usuario y contraseña.";
        die();
    }
 $conexion = mysqli_connect("localhost", "root", "", "todo2");
 $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$usuario'";
 $consulta = mysqli_query($conexion, $sql);
 $registro = mysqli_fetch_array($consulta);
 if($registro){
     $password_en_db=$registro["contrasenia"];
     if(password_verify($password,$password_en_db)){
        session_start();
        $_SESSION['login_ok']=true;
        $_SESSION['usuario_id'] = $registro['id'];
        header("location: menu.php");
    }else{
        die("error de  contraseña");
    }
}}

?>
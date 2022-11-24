<?php
//validamos datos del servidor
$user = "root";
$pass = "";
$host = "localhost";
$datab = "dbformulario";

//conetamos al base datos
$connection = mysqli_connect($host, $user, $pass,$datab);
//verificamos la conexion a base datos
if(!$connection) 
{
    echo "No se ha podido conectar con el servidor" . mysql_error();
}

//Registro
if(isset($_POST["btnRegistro"])){
    //hacemos llamado al imput de formuario de registro
    $nombre = $_POST["nombre"] ;
    $apellido = $_POST["apellido"] ;
    $usuario = $_POST["usuario"] ;
    $correo = $_POST["correo"] ;
    $password = $_POST["password"] ;
    //Se hace el registro
    $sqlverificar = mysqli_query($connection,"SELECT * from tabla_form where correo = '".$correo."'");
    $sqlverificarus = mysqli_query($connection,"SELECT * from tabla_form where usuario = '".$usuario."'");
    if(empty($_POST['password']) || empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['usuario']) || empty($_POST['correo'])){
        echo "<script> alert('Algún campo esta VACÍO'); window.location='registro.html' </script>";
    }else{
        if((mysqli_num_rows($sqlverificar)==0)&&(mysqli_num_rows($sqlverificarus)==0)){
            $pass_fuer = password_hash($password, PASSWORD_DEFAULT);
            $sqlgrabar = "INSERT INTO tabla_form(nombre, apellido, usuario, correo, password) VALUES ('$nombre','$apellido','$usuario','$correo','$pass_fuer')";
            if(mysqli_query($connection,$sqlgrabar)){
                echo "<script> alert('Usuario registrado con EXITO'); window.location='Logueo.php' </script>";
            }else{
                echo "Error: ".$sql."<br>".mysqli_error($connection);
            }    
        }else if(mysqli_num_rows($sqlverificar)==1){
            echo "<script> alert('Correo ya registrado'); window.location='registro.php' </script>";
        }else if(mysqli_num_rows($sqlverificarus)==1){
            echo "<script> alert('Usuario ya registrado'); window.location='registro.php' </script>";
    
        }
    }
}

//Botón Regresar
if(isset($_POST['btnRegresar'])){
    echo "<script> window.location='Logueo.php' </script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body style="background-color:#CEDBE7;">
  <form method="POST">
    <div class="recuadro">
      <div class="contenido">
        <h1>Crear un Usuario</h1>
        Nombre(s):
        <input type="text" name="nombre" id="name" /><br>
        Apellidos:
        <input type="text" name="apellido" id="lastname" /><br>
        Nombre de Usuario:
        <input type="text" name="usuario" id="user"   /><br>
        Correo Electronico:
        <input type="email" name="correo" id="email" /><br>
        Contraseña:
        <input type="password" name="password" id="password"  /><br><br>
        <input type="submit" class="buttonV" name="btnRegistro" id="enviar" value="Registrarse"/>
        <input type="submit" class="buttonV1" name="btnRegresar" id="regresar" value="Cancelar" />
      </div>
    </div>
  </form>
</body>

</html>
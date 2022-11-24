<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Inicie Sesión</title>
		<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body style="background-color:#CEDBE7;">
	<form  method="POST">
		<div class="recuadro">
			<div class="contenido">
				<h1>Inicie Sesión</h1><br>
				Ingrese nombre de Usuario<br>
				<input type="text" name="usuario"><br> <br>	
				Ingrese contraseña<br>
				<input type="password" name="password"><br><br>
				<input type="submit" class="buttonV" value="Ingresar" name="btnInicio"><br>	
      			<a href="registro.php">¿Aún no tienes Usuario?</a><br>
      		</div>
      	</div>
    	</form>
</body>
</html> 

<?php

//Iniciamos sesión
session_start();
if(isset($_SESSION['nombreUsuario'])){
    header('location: index.php');
}


//Login
if(isset($_POST["btnInicio"])){
	//validamos datos del servidor
	$user = "root";
	$pass = "";
	$host = "localhost";
	$datab = "dbformulario";
	//conetamos al base datos
	$connection = mysqli_connect($host, $user, $pass,$datab);
	//verificamos la conexion a base datos
	if(!$connection){
    	die("ERROR!: No hay conexión: ".mysqli_connect_error());
	}
	
	//hacemos llamado al imput de formuario de Inicio de sesión
	$usuario = $_POST["usuario"] ;
	$password = $_POST["password"] ;
    //Validamos NO vacio
	if(empty($_POST['password'])||empty($_POST['ususario'])){
		echo "<script> alert('Campos Vacios'); window.location='Logueo.php' </script>";
	}else{
	//Validación del usuario
	$query = mysqli_query($connection,"SELECT * from tabla_form where usuario = '".$usuario."'");
    $nr = mysqli_num_rows($query);
    $buscarpass = mysqli_fetch_array($query);
    if(!isset($_SESSION['nombreUsuario'])){
        if(($nr==1)&&(password_verify($password, $buscarpass['password' ]))){
            echo "<script> alert('Bienvenido'); window.location='Logueo.php' </script>";
			$_SESSION['nombreUsuario']=$usuario;
        }else if($nr==0){
            echo "<script> alert('ERROR!: Usuario NO existe'); window.location='Logueo.php' </script>";			
        }else{
			echo "<script> alert('ERROR!: Usuario o Contraseña INCORRECTOS'); window.location='Logueo.php' </script>";
		}
    }
	}
}
?>
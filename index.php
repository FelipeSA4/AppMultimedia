<?php
session_start();
if(isset($_SESSION['nombreUsuario'])){
	$usuarioIngresado = $_SESSION['nombreUsuario'];
	echo "<h1> Bienvenido: $usuarioIngresado </h1>";
}else{
	header('location: Logueo.php');
}
//Botón para ir a la pagina Agendar Cita
if(isset($_POST['btnCita'])){
    echo "<script> window.location='agendarCita.php' </script>";
}
//Botón para ir a la pagina Mostrar Citas
if(isset($_POST['btnMostrarCita'])){
    echo "<script> window.location='mostrarCita.php' </script>";
}
//Botón Cerrar Sesión
if(isset($_POST['btnCerrar'])){
	session_destroy();
	header('location: Logueo.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body style="background-color:#CEDBE7;">

	<div class="recuadro">
		<div class="contenido">
			<h1>Acciones</h1>
			<form name="" method="POST">
				<input type="submit" class="buttonV" name="btnMostrarCita" id="mostrarCita" value="Mostrar Citas"/>
				<input type="submit" class="buttonV" name="btnCita" id="cita" value="Agendar Cita"/><br>
				<input type="submit" class="buttonV1" name="btnCerrar" id="cerrar" value="Cerrar Sesión"/><br>
			</form>
		</div>
	</div>
	
</body>

</html> 
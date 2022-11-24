<?php
//iniciamos sesión
session_start();
if(isset($_SESSION['nombreUsuario'])){	$usuarioIngresado = $_SESSION['nombreUsuario']; }

//Botón Regresar
if(isset($_POST["btnRegresar"])){
	echo "<script> window.location='index.php' </script>";
}
//Botón Agendar Cita
if(isset($_POST["btnAgendar"])){
  //validamos datos del servidor
	$user = "root";
	$pass = "";
	$host = "localhost";
	$datab = "dbformulario";
	//conetamos al base datos
	$connection = mysqli_connect($host, $user, $pass,$datab);
	//verificamos la conexion a base datos
	if(!$connection){ die("ERROR!: No hay conexión: ".mysqli_connect_error());}

  //hacemos llamado al imput de formuario de citas
  $nombreCita = $_POST["nombreCita"] ;
  $lugar = $_POST["lugar"] ;
  $fecha = $_POST["fecha"] ;
  $hora = $_POST["hora"] ;
  $descripcion = $_POST["descripcion"] ;

  //Validamos la cita
  $hoy = date("Y-m-d");
  if(empty($_POST['fecha']) || empty($_POST['nombreCita']) || empty($_POST['hora']) || empty($_POST['lugar'])){
    echo "<script> alert('Algún campo esta VACÍO'); window.location='agendarCita.php' </script>";
  }else{
    if($hoy <= $fecha){
      $sqlgrabar = "INSERT INTO citas(usuario, fecha, hora, nombreCita, lugar, descripcion) VALUES ('$usuarioIngresado','$fecha','$hora','$nombreCita','$lugar','$descripcion')";
    if(mysqli_query($connection,$sqlgrabar)){
      echo "<script> alert('Cita registrada con EXITO'); window.location='index.php' </script>";
    }else{
      echo "Error: ".$sql."<br>".mysqli_error($connection);
    }
    }else{
      echo "<script> alert('ERROR!: Fecha NO valida'); window.location='agendarCita.php' </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Agendar Cita</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body style="background-color:#CEDBE7;">
    <form method="POST">
      <div class="recuadro">
        <div class="contenido">
          <h1>Agendar una Cita</h1>
          Titulo:
          <input type="text" name="nombreCita" id="nameDate" /><br>
          Lugar:
          <input type="text" name="lugar" id="place" /><br>
          Fecha:
          <input type="date" name="fecha" id="user"   /><br>
          Hora:
          <input type="time" name="hora" id="email" /><br>
          Descripción:<br>
          <input type="text" name="descripcion" id="description" /><br>
          <input type="submit" class="buttonV" name="btnAgendar" id="agendar" value="Agendar"/>
          <input type="submit" class="buttonV1" name="btnRegresar" value="Regresar">
        </div>
      </div>
    </form>
  </body>

</html> 
<?php
//Aseguramos la sesión
session_start();
if(isset($_SESSION['nombreUsuario'])){
	$usuarioIngresado = $_SESSION['nombreUsuario'];
}else{
	header('location: Logueo.php');
}
//Conexion
$conn = mysqli_connect('localhost', 'root', '','dbformulario');
$id = $_GET['id'];
$query = mysqli_query($conn,"SELECT * from citas where idcita = '".$id."'");
$nr = mysqli_num_rows($query);
$mostrar=mysqli_fetch_array($query);
//Botón Regresar
if(isset($_POST["btnRegresar"])){
	echo "<script> window.location='mostrarCita.php' </script>";
}
//Botón Editar Cita
if(isset($_POST["btnEditar"])){
  
  //Validamos la cita
  $hoy = date("Y-m-d");
  if(empty($_POST['fecha']) || empty($_POST['nombreCita']) || empty($_POST['hora']) || empty($_POST['lugar'])){
    echo "<script> alert('Algún campo esta VACÍO');  </script>";
  }else{
    if($hoy <= $_POST['fecha']){
      $sqlgrabar = "UPDATE citas SET hora = '".$_POST['hora']."',descripcion = '".$_POST['descripcion']."' WHERE idcita = '".$id."'" ;
    if(mysqli_query($conn,$sqlgrabar)){
      echo "<script> alert('Cita actualizada con EXITO'); window.location='mostrarCita.php' </script>";
    }else{
      echo "Error: ".$sql."<br>".mysqli_error($connection);
    }
    }else{
      echo "<script> alert('ERROR!: Fecha NO valida'); </script>";
    }
  }
}
//Conexión
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Editar Cita</title>
<link rel="stylesheet" type="text/css" href="estilos.css" media="all"> 
  <body style="background-color:#CEDBE7;">
	<form method="POST">
      <div class="recuadro">
        <div class="contenido">
          <h1>Editar Cita</h1>
          Id Cita: 
          <?php echo $mostrar['idcita'] ;?><br>
          Titulo:
          <input type="text" name="nombreCita" id="nameDate" value="<?php echo $mostrar['nombreCita'] ?>"/><br>
          Lugar:
          <input type="text" name="lugar" id="place" value="<?php echo $mostrar['lugar'] ?>"/><br>
          Fecha:
          <input type="date" name="fecha" id="date" value="<?php echo $mostrar['fecha'] ?>"/><br>
          Hora:
          <input type="time" name="hora" id="hour" /><br>
          Descripción:<br>
          <input type="text" name="descripcion" id="description" value="<?php echo $mostrar['descripcion'] ?>"/><br>
          <input class="buttonV" type="submit" name="btnEditar" value="Editar" />
        <input class="buttonV1" type="submit" name="btnRegresar" value="Regresar" />  
        </div>
      </div>
	</body>
</html>
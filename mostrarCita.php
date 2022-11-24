<?php
session_start();
if(isset($_SESSION['nombreUsuario'])){
	$usuarioIngresado = $_SESSION['nombreUsuario'];
}else{
	header('location: Logueo.php');
}

$connection = mysqli_connect('localhost', 'root', '','dbformulario');
//Botón Regresar
if(isset($_POST["btnRegresar"])){
	echo "<script> window.location='index.php' </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Citas</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
<style>
	th, td {
	    border:2px solid #360161;
   		width: 20%;
   		text-align: left;
   		vertical-align: top;
   		padding: 0.3em;
	}
	table {
		margin-left: auto;
		margin-right: auto;
    	width: 90%;
    	border-collapse: collapse;
    	background-color: #93C7D5;
    	text-align: center;
}
</style>

</head>

<body style="background-color:#CEDBE7;">
	<div class="contenido"> <h1>Citas</h1> </div>
		<form name="" method="POST">
			<?php
			$sql="Select * from citas where usuario = '".$usuarioIngresado."'";
			$result=mysqli_query($connection,$sql);		
			if(mysqli_num_rows($result)==0){
				echo "<h1>No Hay Citas</h1>";
			}else{
			?>
		<table>
			<tr >
				<th>Nombre</th>
				<th>Lugar</th>
				<th>Fecha</th>
				<th>Hora</th>
				<th>Descripción</th>
				<th>Opciones</th>
			</tr>
			<?php
				while($mostrar=mysqli_fetch_array($result)){
			?>
			<tr>
				<td><?php echo $mostrar['nombreCita'] ?></td>
				<td><?php echo $mostrar['lugar'] ?></td>
				<td><?php echo $mostrar['fecha'] ?></td>
				<td><?php echo $mostrar['hora'] ?></td>
				<td><?php echo $mostrar['descripcion'] ?></td>
				<td>
				<center><a href="borrar.php?id=<?php echo $mostrar['idcita'];?>"><IMG SRC="basura.png" ALT="Borrar" width=50% height=50%></a></center>
				<center><a href="editar.php?id=<?php echo $mostrar['idcita']; ?>"><IMG SRC="editar.png" ALT="Editar" width=50% height=50%></a></center>
				</td>
			</tr>
			<?php
				}}
				?>	
		</table>
		<div class="contenido"><input type="submit" class="buttonV1" name="btnRegresar" value="Regresar"> </div>
		</form>	
</body>
</html> 
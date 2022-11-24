<?php 
include("function.php");
$id = $_GET['id'];
delete('citas','idcita',$id);
header("location:mostrarCita.php");
?>
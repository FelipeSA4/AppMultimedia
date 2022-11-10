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

//hacemos llamado al imput de formuario
$nombre = $_POST["nombre"] ;
$apellido = $_POST["apellido"] ;
$usuario = $_POST["usuario"] ;
$correo = $_POST["correo"] ;
$password = $_POST["password"] ;

//Login
if(isset($_POST["btnInicio"])){
    $query = mysqli_query($connection,"SELECT * from tabla_form where usuario = '".$usuario."'");
    $nr = mysqli_num_rows($query);
    $buscarpass = mysqli_fetch_array($query);
    if(($nr==1)&&(password_verify($password, $buscarpass['password' ]))){
        echo "<script> alert('Bienvenido $nombre'); window.location='index.html' </script>";
    }else if($nr==0){
        echo "<script> alert('Usuario NO existe'); window.location='Logueo.html' </script>";
    }else{
        echo "<script> alert('Usuario o Contraseña INCORRECTOS'); window.location='Logueo.html' </script>";
    }
}
        
//Registro
if(isset($_POST["btnRegistro"])){
    $sqlverificar = mysqli_query($connection,"SELECT * from tabla_form where correo = '".$correo."'");
    $sqlverificarus = mysqli_query($connection,"SELECT * from tabla_form where usuario = '".$usuario."'");
    if(empty($_POST['passwprd']) || empty($_POST['nombre']) || empty($_POST['contraseña']) || empty($_POST['usuario'])|| empty($_POST['correo'])){
        echo "<script> alert('Algún campo esta VACÍO'); window.location='registro.html' </script>";
    }else{
        if((mysqli_num_rows($sqlverificar)==0)&&(mysqli_num_rows($sqlverificarus)==0)){
            $pass_fuer = password_hash($password, PASSWORD_DEFAULT);
            $sqlgrabar = "INSERT INTO tabla_form(nombre, apellido, usuario, correo, password) VALUES ('$nombre','$apellido','$usuario','$correo','$pass_fuer')";
            if(mysqli_query($connection,$sqlgrabar)){
                echo "<script> alert('Usuario registrado con EXITO'); window.location='Logueo.html' </script>";
            }else{
                echo "Error: ".$sql."<br>".mysqli_error($connection);
            }    
        }else if(mysqli_num_rows($sqlverificar)==1){
            echo "<script> alert('Correo ya registrado'); window.location='registro.html' </script>";
        }else if(mysqli_num_rows($sqlverificarus)==1){
            echo "<script> alert('Usuario ya registrado'); window.location='registro.html' </script>";
    
        }
    }
}       
//Botón Regresar
if(isset($_POST['btnRegresar'])){
    echo "<script> window.location='Logueo.html' </script>";
}
//Botón Cerrar Sesión 
if(isset($_POST['btnCerrar'])){
    session_destroy();
    header('location: Logueo.html');
}
    
?>


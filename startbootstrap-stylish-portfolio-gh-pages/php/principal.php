<?php
include 'conexion.php';
extract($_REQUEST);
session_start();

if(!isset($_SESSION['usu_id'])){
	//header('location:../index.php');
}

$usu_id = $_SESSION['usu_id'];
$sql_usuarios="SELECT * FROM tbl_usuario WHERE usu_id=$usu_id";

$usuarios = mysqli_query($conexion, $sql_usuarios);

while ($usuario=mysqli_fetch_array($usuarios)) {
	echo "Hola $usuario[usu_nombre] $usuario[usu_apellidos]";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="logout.proc.php">Pulsame</a>
</body>
</html>
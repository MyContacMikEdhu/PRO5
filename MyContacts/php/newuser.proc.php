<?php 
	
	include 'conexion.php';
	extract($_REQUEST);

	$dir_casa = $calle_casa.' '.$num_casa.' '.$local_casa.' '.$ciudad_casa;
	$dir_otro = $calle_otro.' '.$num_otro.' '.$local_otro.' '.$ciudad_otro;

	$sql_newuser = "INSERT INTO tbl_usuario (usu_correo, usu_pass, usu_dir_casa, usu_dir_otro, usu_tlf, usu_movil, usu_nombre, usu_apellidos) VALUES ('$usu_correo', '$usu_pass', '$dir_casa', '$dir_otro', '$usu_tlf', '$usu_movil', '$usu_nombre', '$usu_apellidos')";

	mysqli_query($conexion, $sql_newuser);
header("location:../index.php?error_reg=no");
?>
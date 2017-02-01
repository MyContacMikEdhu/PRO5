<?php 
	
	include 'conexion.php';
	extract($_REQUEST);
	session_start();

	if (!isset($_SESSION['usu_id'])) {
		header("location:../index.php");
	}

	if (empty($calle_casa) OR empty($num_casa) OR empty($local_casa) OR empty($ciudad_casa)) {
		$casa = $dir_casa;
	} else {
		$casa= $calle_casa.' '.$num_casa.' '.$local_casa.' '.$ciudad_casa;
	}


	if (empty($calle_otro) OR empty($num_otro) OR empty($local_otro) OR empty($ciudad_otro)) {
		$otro = $otro_dir;
	} else {
		$otro= $calle_otro.' '.$num_otro.' '.$local_otro.' '.$ciudad_otro;
	}

	if (empty($usu_pass)) {
		$contra = $password;
	} else {
		$contra = $usu_pass;
	}

	$sql_edituser = "UPDATE tbl_usuario SET usu_correo = '$usu_correo', usu_pass = '$contra', usu_dir_casa = '$casa', usu_dir_otro = '$otro', usu_tlf = '$usu_tlf', usu_movil = '$usu_movil', usu_nombre = '$usu_nombre', usu_apellidos = '$usu_apellidos' WHERE usu_id = ".$_SESSION['usu_id'];

	mysqli_query($conexion, $sql_edituser);

header("location:principal.php");
?>
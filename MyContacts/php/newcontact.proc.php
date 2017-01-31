<?php 
	session_start();
	if (!isset($_SESSION['usu_id'])){
		header("location:../index.php");
	}

	include 'conexion.php';
	extract($_REQUEST);


	$dir_casa = $calle_casa.' '.$num_casa.' '.$local_casa.' '.$ciudad_casa;
	$dir_otro = $calle_otro.' '.$num_otro.' '.$local_otro.' '.$ciudad_otro;

	$sql_newcontact = "INSERT INTO tbl_contactos (cont_nombre, cont_correo, cont_dir_casa, cont_dir_otro, cont_tlf, cont_movil, cont_fecha_n, cont_tipo, usu_id) VALUES ('$cont_nombre', '$cont_correo', '$dir_casa', '$dir_otro', '$telf', '$movil', '$bday', '$tipo', ".$_SESSION['usu_id'].")";
	mysqli_query($conexion, $sql_newcontact);

	header("location:principal.php");
?>
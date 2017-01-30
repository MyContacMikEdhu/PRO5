<?php 
	include 'conexion.php';
session_start();
extract($_REQUEST);
	if (!isset($_SESSION['usu_id'])){
		header("location:../index.php");
	}

	$sql_baja = "UPDATE tbl_usuario SET usu_estado = 0 WHERE usu_id=$id";
	mysqli_query($conexion, $sql_baja);
	session_unset();
	header("location:../index.php");
?>
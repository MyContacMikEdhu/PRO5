<?php 
	session_start();
	if (!isset($_SESSION['usu_id'])){
		header("location:../index.php");
	}

	include 'conexion.php';
	extract($_REQUEST);

	$sql_elimnar = "DELETE FROM tbl_contactos WHERE cont_id = $id";
	mysqli_query($conexion, $sql_elimnar);

	header("location:principal.php");
?>

<?php
	include 'conexion.php';
	extract($_REQUEST);
	session_start();

	if (!isset($_SESSION['usu_id'])) {
		header("location:../index.php");
	}

	session_unset();
	header("location:../index.php");

?>

<?php
include 'conexion.php';

extract($_REQUEST);

$sql = "SELECT * FROM tbl_usuario WHERE usu_correo='$usu_correo' AND usu_pass='$usu_pass' AND usu_estado='1'";
echo "$sql";

$num_usuarios = mysqli_query($conexion, $sql);

	if(mysqli_num_rows($num_usuarios)==1){
		session_start();
		while ($num_usuario = mysqli_fetch_array($num_usuarios)) {
					$_SESSION['usu_id'] = $num_usuario['usu_id'];
				}		
			header ("location:principal.php");
	} else{

		header("location:../index.php?error=1&usu=$usu_correo");
	}



?>
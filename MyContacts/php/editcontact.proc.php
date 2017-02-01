<?php 
	
	include 'conexion.php';
	extract($_REQUEST);
	session_start();

	if (!isset($_SESSION['usu_id'])) {
		header("location:../index.php");
	}

	if (empty($calle_casa) OR empty($num_casa) OR empty($local_casa) OR empty($ciudad_casa)) {
		$dir_casa = $casa;
	} else {
		$dir_casa= $calle_casa.' '.$num_casa.' '.$local_casa.' '.$ciudad_casa;
	}


	if (empty($calle_otro) OR empty($num_otro) OR empty($local_otro) OR empty($ciudad_otro)) {
		$dir_otro = $otro;
	} else {
		$dir_otro= $calle_otro.' '.$num_otro.' '.$local_otro.' '.$ciudad_otro;
	}


	$sql_editcontact = "UPDATE tbl_contactos SET cont_nombre = '$cont_nombre', cont_correo = '$cont_correo', cont_dir_casa = '$dir_casa', cont_dir_otro = '$dir_otro', cont_tlf = '$telf', cont_movil = '$movil', cont_fecha_n = '$bday'  WHERE cont_id = $cont_id";

	mysqli_query($conexion, $sql_editcontact);

header("location:principal.php");
?>
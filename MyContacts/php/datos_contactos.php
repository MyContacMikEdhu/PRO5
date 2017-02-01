<?php 
include 'conexion.php';
extract($_REQUEST);
session_start();

if(!isset($_SESSION['usu_id'])){
	header('location:../index.php');
}

$sql_cont_datos = "SELECT * FROM tbl_contactos WHERE cont_id =$cont_id";

$datos_contactos = mysqli_query($conexion, $sql_cont_datos);
while ($dato=mysqli_fetch_array($datos_contactos)) {
  $nombre = $dato['cont_nombre'];
  $correo = $dato['cont_correo'];
  $casa = $dato['cont_dir_casa'];
  $otro = $dato['cont_dir_otro'];
  $tlf = $dato['cont_tlf'];
  $movil = $dato['cont_movil'];
  $tipo = $dato['cont_tipo'];
  $bday = $dato['cont_fecha_n'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
<tr><?php echo$nombre; ?></tr><br>
<tr><?php echo$correo; ?></tr><br>
<tr><?php echo$casa; ?></tr><br>
<tr><?php echo$otro; ?></tr><br>
<tr><?php echo$tlf; ?></tr><br>
<tr><?php echo$movil; ?></tr><br>
<tr><?php echo$tipo; ?></tr><br>
<tr><?php echo$bday; ?></tr>
	
</table>
</body>
</html>
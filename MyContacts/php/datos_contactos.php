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

echo "marcas=[{address: '$casa', icon: '../img/icon-casa.png', string: '<div><p>Mi Casa</p></div>'}, {address: '$otro', icon: '../img/icon-trabajo.png', string: '<div><p>Trabajo</p></div>'}]";
?>
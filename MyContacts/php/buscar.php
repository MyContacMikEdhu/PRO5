<?php
if ($palabra!=""){
	$sql_buscar = " AND cont_nombre='$palabra'";
	echo "$sql_buscar"; 
}
?>
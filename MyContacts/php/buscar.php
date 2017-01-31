<?php
$search ='';
if (isset($_POST['search'])){
	$search = $_POST['search'];
}

include 'conexion.php';
session_start();
$usu_id = $_SESSION['usu_id'];

$sql_contactos = "SELECT * FROM tbl_contactos WHERE usu_id = $usu_id";
$contactos = mysqli_query($conexion, $sql_contactos);
?>
    <div class="ejemplo-panel-contactos" id="contenido-contactos" style="overflow-y: scroll;">
                <?php
                if (mysqli_num_rows($contactos)==0){
                    echo "<br>";
                    echo "&nbsp;&nbsp;Aún no has añadido ningún contacto";

                    echo "</div>";
                } else {
                    
                ?>

                    <div class="ejemplo-panel-contactos-grupo">
                        <i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp;Familia
                    </div>
<?php
                $tipo = "Familia";
                $sql_familia = "SELECT * FROM tbl_contactos WHERE cont_tipo = '$tipo' AND usu_id='$usu_id' AND cont_nombre LIKE '%$search%'";
                $familias = mysqli_query($conexion, $sql_familia);
                if (mysqli_num_rows($familias)>0){
                    while ($familia = mysqli_fetch_array($familias)) {
                      
                            echo "<div class='ejemplo-panel-contactos-contacto'>";
                            echo "<a class='cont-sel' href=''><div class='col-sm-offset-1 col-sm-8'>";
                            echo "$familia[cont_nombre]";
                            echo "</div></a>";
                            echo "<a href='modificar.php?id=$familia[cont_id]'><div class='col-sm-1'>";
                            echo  "<i class='fa fa-pencil fa-lg' aria-hidden='true' title='Editar'></i>";
                            echo "</div></a>";
                            echo "<a href='eliminar.proc.php?id=$familia[cont_id]' onclick='return confirmar()'><div class='col-sm-1'>";
                            echo  "<i class='fa fa-trash fa-lg' aria-hidden='true' title='Eliminar'></i>";
                            echo "</div></a>";
                            echo "</div>";

                        }
                    }
?>

                    <div class="ejemplo-panel-contactos-grupo">
                        <i class="fa fa-smile-o fa-lg" aria-hidden="true"></i>&nbsp;Amigos
                    </div>
                    <?php
                $tipo = "Amigos";
                $sql_familia = "SELECT * FROM tbl_contactos WHERE cont_tipo = '$tipo' AND usu_id='$usu_id' AND cont_nombre LIKE '%$search%'";
                $familias = mysqli_query($conexion, $sql_familia);
                if (mysqli_num_rows($familias)>0){
                    while ($familia = mysqli_fetch_array($familias)) {
                      
                            echo "<div class='ejemplo-panel-contactos-contacto'>";
                            echo "<a class='cont-sel' href=''><div class='col-sm-offset-1 col-sm-8'>";
                            echo "$familia[cont_nombre]";
                            echo "</div></a>";
                            echo "<a href='modificar.php?id=$familia[cont_id]'><div class='col-sm-1'>";
                            echo  "<i class='fa fa-pencil fa-lg' aria-hidden='true' title='Editar'></i>";
                            echo "</div></a>";
                            echo "<a href='eliminar.proc.php?id=$familia[cont_id]' onclick='return confirmar()'><div class='col-sm-1'>";
                            echo  "<i class='fa fa-trash fa-lg' aria-hidden='true' title='Eliminar'></i>";
                            echo "</div></a>";
                            echo "</div>";

                        }
                    }
?>
                    <div class="ejemplo-panel-contactos-grupo">
                        <i class="fa fa-briefcase " aria-hidden="true"></i>&nbsp;Trabajo
                    </div>
                    <?php
                $tipo = "Trabajo";
                $sql_familia = "SELECT * FROM tbl_contactos WHERE cont_tipo = '$tipo' AND usu_id='$usu_id' AND cont_nombre LIKE '%$search%'";
                $familias = mysqli_query($conexion, $sql_familia);
                if (mysqli_num_rows($familias)>0){
                    while ($familia = mysqli_fetch_array($familias)) {
                      
                            echo "<div class='ejemplo-panel-contactos-contacto'>";
                            echo "<a class='cont-sel' href=''><div class='col-sm-offset-1 col-sm-8'>";
                            echo "$familia[cont_nombre]";
                            echo "</div></a>";
                            echo "<a href='modificar.php?id=$familia[cont_id]'><div class='col-sm-1'>";
                            echo  "<i class='fa fa-pencil fa-lg' aria-hidden='true' title='Editar'></i>";
                            echo "</div></a>";
                            echo "<a href='eliminar.proc.php?id=$familia[cont_id]' onclick='return confirmar()'><div class='col-sm-1'>";
                            echo  "<i class='fa fa-trash fa-lg' aria-hidden='true' title='Eliminar'></i>";
                            echo "</div></a>";
                            echo "</div>";

                        }
                    }
?>
                    <div class="ejemplo-panel-contactos-grupo">
                        <i class="fa fa-users " aria-hidden="true"></i>&nbsp;Otro
                    </div>
                    <?php
                $tipo = "Otro";
                $sql_familia = "SELECT * FROM tbl_contactos WHERE cont_tipo = '$tipo' AND usu_id='$usu_id' AND cont_nombre LIKE '%$search%'";
                $familias = mysqli_query($conexion, $sql_familia);
                if (mysqli_num_rows($familias)>0){
                    while ($familia = mysqli_fetch_array($familias)) {
                      
                            echo "<div class='ejemplo-panel-contactos-contacto'>";
                            echo "<a class='cont-sel' href=''><div class='col-sm-offset-1 col-sm-8'>";
                            echo "$familia[cont_nombre]";
                            echo "</div></a>";
                            echo "<a href='modificar.php?id=$familia[cont_id]'><div class='col-sm-1'>";
                            echo  "<i class='fa fa-pencil fa-lg' aria-hidden='true' title='Editar'></i>";
                            echo "</div></a>";
                            echo "<a href='eliminar.proc.php?id=$familia[cont_id]' onclick='return confirmar()' ><div class='col-sm-1'>";
                            echo  "<i class='fa fa-trash fa-lg' aria-hidden='true' title='Eliminar'></i>";
                            echo "</div></a>";
                            echo "</div>";

                        }
                    }
?>
                </div>
<?php
    }
?>

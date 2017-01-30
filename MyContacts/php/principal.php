<?php
include 'conexion.php';
extract($_REQUEST);
session_start();

if(!isset($_SESSION['usu_id'])){
	header('location:../index.php');
}

$usu_id = $_SESSION['usu_id'];
$sql_usuarios="SELECT * FROM tbl_usuario WHERE usu_id=$usu_id";

$usuarios = mysqli_query($conexion, $sql_usuarios);

while ($usuario=mysqli_fetch_array($usuarios)) {
	
	$direccion = $usuario['usu_dir_casa'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Contacts</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    
  </head>
  <body>
    <section id="ejemplo" class="ejemplo" style="font-size: 15px;">

            <div class="ejemplo-panel">
                <div class="ejemplo-panel-datos">
                    <div style="width: 30%; height: 100%; float: left; padding-top: 10%; padding-left: 2%;">
                        <div class="circulo">
                            M
                        </div>
                    </div>
                    <div style="width: 70%; height: 100%; float: left;">
                    <div style="width: 100%; height: 25%"></div>
                    <div style="width: 100%; height: 25%;">
                        <div class="row">

                            <div class="col-sm-offset-1 col-sm-1 ">
                                <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-8">
                                Tu nombre y apellido
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%; height: 25%">
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-1 ">
                                <i class="fa fa-at fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-8">
                                email@ejemplo.com
                            </div>
                        </div>
                    </div>    
                    <div style="width: 100%; height: 25%">
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-1 ">
                                <i class="fa fa-phone fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-8">
                                987 654 321
                            </div>
                        </div>
                    </div>    
                        

                    </div>
                    
                </div>
                <div class="ejemplo-panel-opcion">
                <br>
                   <div class="col-sm-offset-1 col-sm-11">
                        <form>
                        &nbsp;&nbsp;&nbsp;
                           <input type="text" name="buscar" placeholder="Buscar" style="width: 200px;height: 32px;">
                           <button class="btn btn-dark" name="entrar" style="height: 32px;"><i class="fa fa-search" aria-hidden="true"></i></button>
                       </form>
                   </div>
                </div>
                <div class="ejemplo-panel-opcion2">
                    <div class="col-sm-offset-1 col-sm-10">
                        <form>
                            &nbsp;&nbsp;&nbsp;<input type="checkbox" name="grupo" value="familia">Familia&nbsp;&nbsp;
                            <input type="checkbox" name="grupo" value="amigos">Amigos&nbsp;&nbsp;
                            <input type="checkbox" name="grupo" value="trabajo">Trabajo&nbsp;&nbsp;
                            <input type="checkbox" name="grupo" value="otro">Otro

                        </form>
                    </div>   
                </div>
                <div class="ejemplo-panel-contactos" style="overflow-y: scroll;">
                    <div class="ejemplo-panel-contactos-grupo">
                        <i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp;Familia
                    </div>
                    <div class="ejemplo-panel-contactos-contacto">
                        <div class="col-sm-offset-1 col-sm-8">
                                Mi hermano 
                        </div>
                        <a href="#ejemplo"><div class="col-sm-1">
                            <i class="fa fa-pencil fa-lg" aria-hidden="true" title="Editar"></i>
                        </div></a>
                        <a href="#ejemplo"><div class="col-sm-1">
                            <i class="fa fa-trash fa-lg" aria-hidden="true" title="Eliminar"></i>
                        </div></a>
                    </div>


                    <div class="ejemplo-panel-contactos-contacto">
                        <div class="col-sm-offset-1 col-sm-8">
                                Mi papá
                        </div>
                        <a href="#ejemplo"><div class="col-sm-1">
                            <i class="fa fa-pencil fa-lg" aria-hidden="true" title="Editar"></i>
                        </div></a>
                        <a href="#ejemplo"><div class="col-sm-1">
                            <i class="fa fa-trash fa-lg" aria-hidden="true" title="Eliminar"></i>
                        </div></a>
                    </div>



                    <div class="ejemplo-panel-contactos-grupo">
                        <i class="fa fa-smile-o fa-lg" aria-hidden="true"></i>&nbsp;Amigos
                    </div>
                    <div class="ejemplo-panel-contactos-grupo">
                        <i class="fa fa-briefcase " aria-hidden="true"></i>&nbsp;Trabajo
                    </div>
                    <div class="ejemplo-panel-contactos-grupo">
                        <i class="fa fa-users " aria-hidden="true"></i>&nbsp;Otro
                    </div>
                </div>
            </div>

            

            <div class="ejemplo-geo">
                <div class="ejemplo-geo-opciones">
                    <div class="col-sm-6">
                        <img src="../img/header1.png" width="180px">
                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         <a href="#ejemplo" class="btn btn-dark" style="height: 32px;"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i>&nbsp;Agregar contacto</a>
                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         <a href="#ejemplo" class="btn btn-dark"  style="height: 32px;"><i class="fa fa-cog fa-lg" aria-hidden="true"></i>&nbsp;Configuración</a>
                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         <a href="logout.proc.php" class="btn btn-exit"  style="height: 32px;"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i>&nbsp;Cerrar sesión</a>
                    </div>
                </div>

                <div id="map" class="ejemplo-geo-mapa">
                    
                </div>
            </div>

    </section>

</body>
</html>
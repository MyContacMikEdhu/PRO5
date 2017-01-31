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

$sql_contactos = "SELECT * FROM tbl_contactos WHERE usu_id = $usu_id";
$contactos = mysqli_query($conexion, $sql_contactos);

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/ajax.js"></script>


    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script type="text/javascript">
         function initMap() {
                  

                 var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 17,
                    center: {lat: -34.397, lng: 150.644}
                  });

                var geocoder = new google.maps.Geocoder();
                  geocodeAddress(geocoder, map);
                }

                function geocodeAddress(geocoder, resultsMap) {
                  var address = "<?php echo$direccion; ?>";
                  geocoder.geocode({'address': address}, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                      resultsMap.setCenter(results[0].geometry.location);



                  var contentString = '<div><p>Mi Casa</p></div>';


                      var infowindow = new google.maps.InfoWindow({
                      content: contentString
                      });

                      var marker = new google.maps.Marker({
                        map: resultsMap,
                        animation: google.maps.Animation.BOUNCE,
                        position: results[0].geometry.location,
                        icon: "../img/icon-casa.png",
                      });


                      marker.addListener('click', function() {
                      infowindow.open(map, marker);
                      });

                    } else {
                      alert('Geocode was not successful for the following reason: ' + status);
                    }
                  });
                }


                function confirmar(){
                   var confirmar = confirm("Estas seguro de que quieres eliminar este contacto?");
                    if (!confirmar){
                        return false;
                    }
                }

                function darDeBaja(){
                    var confirmar = confirm("Estas seguro de que quieres darte de baja?");
                    if (!confirmar){
                        return false;
                    }
                }

        /*var READY_STATE_COMPLETE=4;
        var peticion_http = null;
         
        function inicializa_xhr() {
          if(window.XMLHttpRequest) {
            return new XMLHttpRequest(); 
          }
          else if(window.ActiveXObject) {
            return new ActiveXObject("Microsoft.XMLHTTP");
          } 
        }
         
        function crea_query_string() {
          var busca = document.getElementById("buscador"); 
          return "palabra=" + encodeURIComponent(busca.value);
            
        }
         
        function buscar() {
          peticion_http = inicializa_xhr();
          if(peticion_http) {
            peticion_http.onreadystatechange = procesaRespuesta;
            peticion_http.open("POST", "buscar.php", true);
         
            peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            var query_string = crea_query_string();
            peticion_http.send(query_string);
          }
        }
         
        function procesaRespuesta() {
          if(peticion_http.readyState == READY_STATE_COMPLETE) {
            if(peticion_http.status == 200) {
              document.getElementById("contenido-contactos").innerHTML = peticion_http.responseText;
            }
          }
        }
         
        function buscador(){
            document.getElementById("buscador").onclick = buscar();
        };*/


    </script>
    <script async defer
                      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSz41JPaWeB_ZMOLjiyhXQOwlLr4LYnOA&callback=initMap">
                    </script>
  </head>
  <body>
    <section id="ejemplo" class="ejemplo" style="font-size: 15px;">

            <div class="ejemplo-panel">
                <div class="ejemplo-panel-datos">
                    <div style="width: 30%; height: 100%; float: left; padding-top: 10%; padding-left: 10%;">
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
                        <form id="search_form">
                        &nbsp;&nbsp;&nbsp;
                           <input type="text" name="buscar" placeholder="Buscar" id="search" style="width:60%;height: 32px;">
                           <button class="btn btn-dark" name="entrar" style="height: 32px;"><i class="fa fa-search" aria-hidden="true"></i></button>
                       </form>
                   </div>
                </div>
                <div class="ejemplo-panel-opcion2">
                    <div class="col-sm-12">
                        <form>
                            &nbsp;&nbsp;&nbsp;<input type="checkbox" name="grupo" value="familia">Familia&nbsp;&nbsp;
                            <input type="checkbox" name="grupo" value="amigos">Amigos&nbsp;&nbsp;
                            <input type="checkbox" name="grupo" value="trabajo">Trabajo&nbsp;&nbsp;
                            <input type="checkbox" name="grupo" value="otro">Otro

                        </form>
                    </div>   
                </div>
                <div class="ejemplo-panel-contactos"  id="resultado" style="overflow-y: scroll;">
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
                $sql_familia = "SELECT * FROM tbl_contactos WHERE cont_tipo = '$tipo' AND usu_id='$usu_id'";
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
                $sql_familia = "SELECT * FROM tbl_contactos WHERE cont_tipo = '$tipo' AND usu_id='$usu_id'";
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
                $sql_familia = "SELECT * FROM tbl_contactos WHERE cont_tipo = '$tipo' AND usu_id='$usu_id'";
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
                $sql_familia = "SELECT * FROM tbl_contactos WHERE cont_tipo = '$tipo' AND usu_id='$usu_id'";
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
            </div>
            

            <div class="ejemplo-geo">
                <div class="ejemplo-geo-opciones">
                    <div class="col-sm-6">
                        <img src="../img/header1.png" width="30%">
                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         <a href="#ejemplo" class="btn btn-dark" style="height: 32px;"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i>&nbsp;Agregar contacto</a>
                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         
                         <div class="dropdown">
  <button class="btn btn-dark dropdown-toggle" type="button" style="height: 32px;" data-toggle="dropdown"><i class="fa fa-cog fa-lg" aria-hidden="true"></i>&nbsp;Configuración
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">Editar Cuenta</a></li>
    <?php echo "<li><a href='baja.proc.php?id=$usu_id' onclick='return darDeBaja();' >Darse de baja</a></li>";?>
  </ul>
</div>
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
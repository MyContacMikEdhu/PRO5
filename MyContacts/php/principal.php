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
	

    $nombre = $usuario['usu_nombre'];
    $apellido = $usuario['usu_apellidos'];
    $email = $usuario['usu_correo'];
    $pass = $usuario['usu_pass'];
    $telf = $usuario['usu_tlf'];
    $movil = $usuario['usu_movil'];
	$direccion = $usuario['usu_dir_casa'];

    $dir_otro = $usuario['usu_dir_otro'];

    $direccion_trabajo = $usuario['usu_dir_otro'];

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

    <link rel="icon" type="image/png" href="img/icon.png">
    <script type="text/javascript">
        /*var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: new google.maps.LatLng(-33.91722, 151.23064),
          mapTypeId: 'roadmap'
        });

        var icons = {
          casa: {
            icon: "../img/icon-casa.png"
          },
          trabajo: {
            icon: "../img/icon-trabajo.png",
          },
          
        };

        function addMarker(feature) {
            tipo = feature.type;
            if (tipo=="casa"){
                var animacion = google.maps.Animation.BOUNCE;
            } else {
                var animacion = google.maps.Animation.DROP;
            }
          var marker = new google.maps.Marker({
            position: feature.local(),
            icon: icons[feature.type].icon,
            animation: animacion,
            map: map
          });
        }

        var features = [
          {
            type: 'casa',
            local: new google.maps.Geocoder().geocode({
                address: "<?php //echo$direccion; ?>"
                }, function(results, status) {
                      return results[0].geometry.location;
                    }
                )
            }, {
            address: "<?php //echo$direccion_trabajo; ?>",
            type: 'trabajo'
          }
        ];

        for (var i = 0, feature; feature = features[i]; i++) {
          addMarker(feature);
        }
      }*/

     function initMap() {
 
                var marca;

                 var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: {lat: 41.385064, lng: 2.173403}
                  });

                 var marcas = [
                 {
                    address: "<?php echo$direccion; ?>",
                    icon: "../img/icon-casa.png",
                    string: "<div><p>Mi Casa</p></div>"
                 },{
                    address: "<?php echo$direccion_trabajo; ?>",
                    icon: "../img/icon-trabajo.png",
                    string: "<div><p>Trabajo</p></div>"
                 }
                 ];

                  var bounds = new google.maps.LatLngBounds();

                 var size = marcas.length -1
                    for (i=0, marca; marca=marcas[i]; i++){
                     geocodeAddress(map, marca, i, size, bounds);
                    }
                }

                function geocodeAddress(resultsMap, marca, i, size, bounds) {
                        
                        var geocoder = new google.maps.Geocoder();
                              geocoder.geocode({'address': marca.address}, function(results, status) {
                                if (status === google.maps.GeocoderStatus.OK) {
                                var lat = results[0].geometry.location.lat();
                                var long = results[0].geometry.location.lng();

                                var contentString = marca.string;

                                  var infowindow = new google.maps.InfoWindow({
                                  content: contentString
                                  });

                                  var marker = new google.maps.Marker({
                                    map: resultsMap,
                                    animation: google.maps.Animation.BOUNCE,
                                    position:  {lat: lat, lng: long},
                                    icon: marca.icon,
                                  });
                                  bounds.extend(new google.maps.LatLng(lat, long));
                                  alert(bounds)
                                  if(i==size){
                                    resultsMap.fitBounds(bounds);
                                  }

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


                function validar_nc(){
                    var formulario = document.getElementById("new_contact");
                        var msg="Error:";

                        if (formulario.cont_nombre.value==""){
                            msg += "\n El nombre es obligatorio";
                            //document.getElementById("form1").usu_correo.style.borderColor = "red";
                        }

                        if (formulario.calle_casa.value=="" || formulario.num_casa.value=="" || formulario.local_casa.value=="" || formulario.ciudad_casa.value=="" ){
                            msg += "\n La dirección de casa es obligatoria";
                            //document.getElementById("form1").usu_pass.style.borderColor = "red";
                        }
                    if (msg == "Error:"){
                        return true;
                        } else{
                            alert(msg);
                            return false;
                        }
                }


                function validar_eu(){
                    var formulario = document.getElementById("edit_user");
                        var msg="Error:";
                        var pass = formulario.usu_pass.value;
                        var pass1 = formulario.usu_pass1.value;
                        if (pass != pass1){
                            msg += "\n Las contraseñas deben coincidir";
                            //document.getElementById("form1").usu_correo.style.borderColor = "red";
                        }

                        
                    if (msg == "Error:"){
                        return true;
                        } else{
                            alert(msg);
                            return false;
                        }
                }

    function realizaProceso(contid){
        var parametros = {
                "cont_id" : contid,

        };
        $.ajax({
                data:  parametros,
                url:   'modal.php',
                type:  'post',
                beforeSend: function () {
                        $("#myModal3").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#myModal3").html(response);
                }
        });
}

 function tomarDatos(contactoid){
        var parametros = {
                "cont_id" : contactoid,

        };
        $.ajax({
                data:  parametros,
                url:   'datos_contactos.php',
                type:  'post',
                beforeSend: function () {
                        $("#datos").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#datos").html(response);
                }
        });
}
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});


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
                            <?php echo strtoupper($nombre[0]); ?>
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
                                <?php echo $nombre." ".$apellido; ?>
                            </div>
                        </div>
                    </div>
                    <div style="width: 100%; height: 25%">
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-1 ">
                                <i class="fa fa-at fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-8">
                                <?php echo $email; ?>
                            </div>
                        </div>
                    </div>    
                    <div style="width: 100%; height: 25%">
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-1 ">
                                <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-8">
                                <?php echo $movil; ?>
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
                        <form id="check_form">
                            &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" id="check" name="grupo" value="familia">Familia&nbsp;&nbsp;
                            <input type="checkbox" id="check" name="grupo" value="amigos">Amigos&nbsp;&nbsp;
                            <input type="checkbox" id="check" name="grupo" value="trabajo">Trabajo&nbsp;&nbsp;
                            <input type="checkbox" id="check" name="grupo" value="otro">Otro

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
                            echo "<a class='cont-sel' href='#' onclick='tomarDatos($familia[cont_id]);return false;'><div class='col-sm-offset-1 col-sm-8'>";
                            echo "$familia[cont_nombre]";
                            echo "</div></a>";       
                            echo "<a href='#' data-toggle='modal' data-target='#myModal3' id='edit' onclick='realizaProceso($familia[cont_id]);return false;'><div class='col-sm-1'>";
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
                            echo "<a class='cont-sel' href='#'><div class='col-sm-offset-1 col-sm-8'>";
                            echo "$familia[cont_nombre]";
                            echo "</div></a>";
                            echo "<a href='#' data-toggle='modal' data-target='#myModal3' id='edit' onclick='realizaProceso($familia[cont_id]);return false;'><div class='col-sm-1'>";
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
                            echo "<a class='cont-sel' href='#'><div class='col-sm-offset-1 col-sm-8'>";
                            echo "$familia[cont_nombre]";
                            echo "</div></a>";
                            echo "<a href='#' data-toggle='modal' data-target='#myModal3' id='edit' onclick='realizaProceso($familia[cont_id]);return false;'><div class='col-sm-1'>";
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
                            echo "<a class='cont-sel' href='#'><div class='col-sm-offset-1 col-sm-8'>";
                            echo "$familia[cont_nombre]";
                            echo "</div></a>";
                            echo "<a href='#' data-toggle='modal' data-target='#myModal3' id='edit' onclick='realizaProceso($familia[cont_id]);return false;'><div class='col-sm-1'>";
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
            <div class="modal fade" id="myModal3" role="dialog" style="font-size: 15px">
</div>

            <div class="ejemplo-geo">
                <div class="ejemplo-geo-opciones">
                    <div class="col-sm-6">
                        <img src="../img/header1.png" width="30%">
                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         <a href="#ejemplo" class="btn btn-dark" style="height: 32px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i>&nbsp;Agregar contacto</a>


                         <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header" style="text-align: center;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Agregar Contacto</h4>
                                </div>
                                <div class="modal-body">
                                <p>Los campos (*) son obligatorios...</p><br>
                                  <form id="new_contact" action="newcontact.proc.php" method="POST" onsubmit="return validar_nc();">
                                  <div class="row">
                                     <div class="col-sm-5">
                                          <i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;<input type="text" name="cont_nombre" placeholder="Nombre" style="width: 85%">*
                                      </div>
                                      <div class="col-sm-7">
                                          <i class="fa fa-at fa-lg" aria-hidden="true"></i>&nbsp;<input type="email" name="cont_correo" placeholder="Email" style="width: 90%">
                                      </div> 
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-sm-12">
                                      <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                                        <input type="text" name="calle_casa" placeholder="Dirección casa" style="width: 30%">
                                        <input type="number" name="num_casa" placeholder="Núm." style="width: 10%">
                                        <input type="text" name="local_casa" placeholder="Localidad" style="width: 30%">
                                        <input type="text" name="ciudad_casa" placeholder="Ciudad" style="width: 20%">*
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                      <div class="col-sm-12">
                                      <i class="fa fa-building-o fa-lg" aria-hidden="true"></i>&nbsp;
                                        <input type="text" name="calle_otro" placeholder="Otra dirección" style="width: 30%">
                                        <input type="number" name="num_otro" placeholder="Núm." style="width: 10%">
                                        <input type="text" name="local_otro" placeholder="Localidad" style="width: 30%">
                                        <input type="text" name="ciudad_otro" placeholder="Ciudad" style="width: 20%">
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                    <div class="col-sm-5">
                                        <i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;<input type="tel" name="telf" placeholder="Teléfono" maxlength="9" size="9">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;<input type="tel" name="movil" placeholder="Móvil" maxlength="9" size="9">
                                    </div>
                                    <div class="col-sm-7">
                                    <i class="fa fa-users " aria-hidden="true"></i>&nbsp;
                                        <select name="tipo" style="height: 25px;">
                                          <option>Familia</option>
                                          <option>Amigos</option>
                                          <option>Trabajo</option>
                                          <option>Otro</option>
                                      </select>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-birthday-cake" aria-hidden="true" ></i>&nbsp;<input type="date" name="bday" placeholder="Cumpleaños" >
                                    </div>
                                    
                                  </div>    
                                  <br>    
                                  <div class="row">
                                      <div class="col-sm-offset-5 col-sm-2">
                                          <button class="btn btn-dark" name="add_contact" style="height: 32px;">Añadir</button>
                                      </div>
                                  </div>   
                                      
                                      
                                      
                                  </form>
                                </div>
                                
                              </div>
                              
                            </div>
                          </div>



                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         
                         <div class="dropdown">
  <button class="btn btn-dark dropdown-toggle" type="button" style="height: 32px;" data-toggle="dropdown"><i class="fa fa-cog fa-lg" aria-hidden="true"></i>&nbsp;Configuración
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#" data-toggle="modal" data-target="#myModal2">Editar Cuenta</a></li>
    <?php echo "<li><a href='baja.proc.php?id=$usu_id' onclick='return darDeBaja();' >Darse de baja</a></li>";?>
  </ul>
</div>
                    </div>

                    <div class="modal fade" id="myModal2" role="dialog" style="font-size: 15px">
                            <div class="modal-dialog" style="width: 49%;text-align: center;">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Editar cuenta</h4><p><?php echo$email; ?></p>
                                </div>
                                <div class="modal-body" >
                                  <form id="edit_user" action="edituser.proc.php" method="POST" onsubmit="return validar_eu();">
                                  
                                  <div class="row">
                                     
                                      
                                          <input type="hidden" name="usu_correo" value="<?php echo$email; ?>">
                                        
                                      <div class="col-sm-12">
                                          <i class="fa fa-key fa-lg" aria-hidden="true"></i>&nbsp;<input type="password" name="usu_pass" placeholder="Contraseña" style="width: 40%">
                                      
                                          <input type="password" name="usu_pass1" placeholder="Confirmar contraseña" style="width: 52%">
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                     
                                      <div class="col-sm-12">
                                          <i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;<input type="text" name="usu_nombre" placeholder="Nombre" style="width: 40%" value="<?php echo$nombre; ?>">
                                      
                                          <input type="text" name="usu_apellidos" placeholder="Apellidos" style="width: 52%" maxlength="35" value="<?php echo$apellido; ?>">
                                      </div>
                                  </div>
                                  <br>
                                 <p style="text-align: left; color: grey;"><?php echo$direccion; ?></p>

                                  <div class="row">
                                      <div class="col-sm-12">
                                      
                                      <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                                        <input type="text" id="calle_casa" name="calle_casa" placeholder="Dirección casa" style="width: 30%">
                                        <input type="number" name="num_casa" placeholder="Núm." style="width: 10%">
                                        <input type="text" name="local_casa" placeholder="Localidad" style="width: 30%">
                                        <input type="text" name="ciudad_casa" placeholder="Ciudad" style="width: 20%">
                                        <input type="hidden" name="dir_casa" value="<?php echo$direccion; ?>">
                                      </div>
                                  </div>
                                  <br>
                                  <p style="text-align: left; color: grey;"><?php echo$dir_otro; ?></p>
                                  <div class="row">
                                      <div class="col-sm-12">
                                      <i class="fa fa-building-o fa-lg" aria-hidden="true"></i>&nbsp;
                                        <input type="text" name="calle_otro" placeholder="Otra dirección" style="width: 30%">
                                        <input type="number" name="num_otro" placeholder="Núm." style="width: 10%">
                                        <input type="text" name="local_otro" placeholder="Localidad" style="width: 30%">
                                        <input type="text" name="ciudad_otro" placeholder="Ciudad" style="width: 20%">
                                        <input type="hidden" name="otro_dir" value="<?php echo$dir_otro; ?>">
                                      </div>
                                  </div>
                                      <br>
                                  <div class="row">
                                    <div class="col-sm-5">
                                        <i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;<input type="tel" name="usu_tlf" placeholder="Teléfono" maxlength="9" size="9" value="<?php echo$telf; ?>">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;<input type="tel" name="usu_movil" placeholder="Móvil" maxlength="9" size="9" value="<?php echo$movil; ?>">
                                    </div>
                                    
                                    
                                  </div>    
                                  <br>    
                                  <div class="row">
                                      <div class="col-sm-offset-5 col-sm-2">
                                      <input type="hidden" name="password" value="<?php echo$pass; ?>">
                                          <button class="btn btn-dark" name="add_user" style="height: 32px;">Guardar</button>
                                      </div>
                                  </div>   
                                      
                                      
                                      
                                  </form>
                                </div>
                                
                              </div>
                              
                            </div>
                          </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         <a href="logout.proc.php" class="btn btn-exit"  style="height: 32px;"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i>&nbsp;Cerrar sesión</a>
                    </div>
                </div>
<div id="datos">

</div>
                <div id="map" class="ejemplo-geo-mapa">
                    
                </div>
            </div>

    </section>
</body>
</html>
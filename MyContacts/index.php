<?php
    extract($_REQUEST);
    $error_reg="";

    session_start();

if (isset($_SESSION['usu_id'])){
    header("location:php/principal.php");
} else {

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My Contacts</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <link rel="icon" type="image/png" href="img/icon.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>

                function initMap() {
                  

                 var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 17,
                    center: {lat: -34.397, lng: 150.644}
                  });

                var geocoder = new google.maps.Geocoder();
                  geocodeAddress(geocoder, map);
                }

                function geocodeAddress(geocoder, resultsMap) {
                  var address = "Carrer Provença, 12, 08901 L'Hospitalet de Llobregat, Barcelona ";
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
                        icon: "img/icon-casa.png",
                      });


                      marker.addListener('click', function() {
                      infowindow.open(map, marker);
                      });

                    } else {
                      alert('Geocode was not successful for the following reason: ' + status);
                    }
                  });
                }

         function Error(){
            alert("El correo y la contraseña no coinciden");
            document.getElementById("form1").usu_correo.style.borderColor = "red";
            document.getElementById("form1").usu_pass.style.borderColor = "red";
        }

        function reg_ok(){
            alert("Registrado satisfactoriamente");
        }

        function validar(){
            var formulario = document.getElementById("form1");
            var msg="Error:";

            if (formulario.usu_correo.value==""){
                msg += "\n El correo no puede estar vacio";
                document.getElementById("form1").usu_correo.style.borderColor = "red";
            }

            if (formulario.usu_pass.value==""){
                msg += "\n La contraseña no puede estar vacia";
                document.getElementById("form1").usu_pass.style.borderColor = "red";
            }
        if (msg == "Error:"){
            return true;
            } else{
                alert(msg);
                return false;
            }
        }

        function validar_nu(){
            var formulario = document.getElementById("new_user");
            var msg="Error:";

            if (formulario.usu_correo.value==""){
                msg += "\n El correo es obligatorio";
            }

                        var pass = formulario.usu_pass.value;
                        var pass1 = formulario.usu_pass1.value;
                        if (pass != pass1){
                            msg += "\n Las contraseñas deben coincidir";
                            //document.getElementById("form1").usu_correo.style.borderColor = "red";
                        }

            if (formulario.usu_pass.value==""){
                msg += "\n La contraseña es obligatoria";
            }

            if (formulario.usu_nombre.value==""){
                msg += "\n El nombre es obligatorio";
            }

            if (formulario.usu_apellidos.value==""){
                msg += "\n Los apellidos son obligatorios";
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
                    </script>
                    <script async defer
                      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSz41JPaWeB_ZMOLjiyhXQOwlLr4LYnOA&callback=initMap">
                    </script>

</head>

<?php
$body = "<body";
if (isset($error)){
    $body .= " onload='Error();'>";
} else if ($error_reg == "no"){
    $body .= " onload='reg_ok();'>";
} else {
    $body .= ">";
}

echo "$body";
?>

    <!-- Navigation -->
    <div class="navegador">
        <div class="col-sm-3">
            <img src="img/header.png" width="200" >
        </div>
        <div class="col-sm-9">
            <div class="login">
                <form id="form1" action="php/login.proc.php" method="POST" onsubmit="return validar();">
                <input type="text" name="usu_correo" placeholder="Tu email" <?php if(isset($usu)){ echo "value='$usu'";} ?> onfocus="this.style.borderColor=null" maxlength="50">
                <input type="password" name="usu_pass" placeholder="Contraseña" onfocus="this.style.borderColor=null" maxlength="15">

                    <button class="btn btn-dark" name="entrar" style="height: 32px;">Entrar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h3>Almacena tus contactos y míralos en el mapa.</h3>
            <br>
            <a href="#about" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#myModal">Registrarse</a>

        </div>
        <div class="modal fade" id="myModal" role="dialog" style="font-size: 15px">
                            <div class="modal-dialog" style="width: 49%; text-align: center;">
                            
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Registrarse</h4>
                                </div>
                                <div class="modal-body" >
                                <p>Los campos (*) son obligatorios...</p><br>
                                  <form id="new_user" action="php/newuser.proc.php" method="POST" onsubmit="return validar_nu();">
                                  
                                  <div class="row">
                                     
                                      <div class="col-sm-5">
                                          <i class="fa fa-at fa-lg" aria-hidden="true"></i>&nbsp;<input type="email" name="usu_correo" placeholder="Email" style="width: 85%">*
                                      </div> 
                                      <div class="col-sm-7">
                                          <i class="fa fa-key fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;<input type="password" name="usu_pass" placeholder="Contraseña" style="width: 40%">
                                          <input type="password" name="usu_pass1" placeholder="Confirmar contraseña" style="width: 43%">*
                                      </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                     
                                      <div class="col-sm-6">
                                          <i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;<input type="text" name="usu_nombre" placeholder="Nombre" style="width: 90%">*
                                      </div> 
                                      <div class="col-sm-6">
                                          <input type="text" name="usu_apellidos" placeholder="Apellidos" style="width: 90%" maxlength="35">*
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
                                        <i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;<input type="tel" name="usu_tlf" placeholder="Teléfono" maxlength="9" size="9">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;<input type="tel" name="usu_movil" placeholder="Móvil" maxlength="9" size="9">
                                    </div>
                                    
                                    
                                  </div>    
                                  <br>    
                                  <div class="row">
                                      <div class="col-sm-offset-5 col-sm-2">
                                          <button class="btn btn-dark" name="add_user" style="height: 32px;">Registrarse</button>
                                      </div>
                                  </div>   
                                      
                                      
                                      
                                  </form>
                                </div>
                                
                              </div>
                              
                            </div>
                          </div>
    </header>

    <!-- About -->
    <section id="about" class="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="img/header1.png" width="30%"><br><br><br>
                    <p class="lead">MY CONTACTS es una aplicación web de tipo agenda, en la que puedes almacenar todos tus contactos.<br>Además cuenta con el geopodicionamiento de tus contactos, teninedo en cuenta su dirección.<br><br>Únete a nosotros y descubre una nueva forma de agenda web, completamente GRATIS!!</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section id="ejemplo" class="ejemplo" style="font-size: 15px;border-bottom: 3px solid black; border-top: 3px solid black;">

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
                        <form>
                        &nbsp;&nbsp;&nbsp;
                           <input type="text" name="buscar" placeholder="Buscar" style="width:60%;height: 32px;">
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
                    <div class="col-sm-offset-3 col-sm-9">
                        <br><br><br>
                    <p style="width: 50%; text-align: center; color: red;"><b>ESTO ES UNA RECREACIÓN DE NUESTRA APP WEB :)</b></p>
                    </div>
                    
                </div>
            </div>

            

            <div class="ejemplo-geo">
                <div class="ejemplo-geo-opciones">
                    <div class="col-sm-6">
                        <img src="img/header1.png" width="30%">
                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         <a href="#ejemplo" class="btn btn-dark" style="height: 32px;"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i>&nbsp;Agregar contacto</a>
                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         <a href="#ejemplo" class="btn btn-dark" name="agregar" style="height: 32px;"><i class="fa fa-cog fa-lg" aria-hidden="true"></i>&nbsp;Configuración</a>
                    </div>
                    <div class="col-sm-2" style="padding-top: 2%;">
                         <a href="#ejemplo" class="btn btn-exit" name="agregar" style="height: 32px;"><i class="fa fa-power-off fa-lg" aria-hidden="true"></i>&nbsp;Cerrar sesión</a>
                    </div>
                </div>

                <div id="map" class="ejemplo-geo-mapa">
                    
                </div>
            </div>

    </section>


   

    <!-- Footer -->
    <footer style="background-color: #DC4A3D; height: 40%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>My contacts</strong>
                    </h4>
                    <p>Calle Java es fácil
                        <br>LibrosWeb, Bootstrap</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> 654 396 210</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> name@example.com
                        </li>
                    </ul>
                    <br>
                   
                
                    <p class="text-muted" style="color: white">Copyright &copy; MyContacts 2017</p>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>

</body>

</html>
<?php
}
?>

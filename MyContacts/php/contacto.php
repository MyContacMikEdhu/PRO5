<?php
 include 'conexion.php';
extract($_REQUEST);


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
 <div class="modal-dialog" style="width:40%;padding: 50px;">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header" style="text-align: center;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Datos contacto</h4><p><?php echo$nombre; ?></p>
                                </div>
                                <div class="modal-body" >
                                <div class="row">
                                  <div class="col-sm-1">
                                    <i class="fa fa-at fa-lg" aria-hidden="true"></i>
                                  </div>
                                  <div class="col-sm-11">
                                    <?php echo$correo; ?>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-1">
                                    <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                                  </div>
                                  <div class="col-sm-11">
                                    <?php echo$nombre; ?>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-1">
                                    <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                                  </div>
                                  <div class="col-sm-11">
                                    <?php echo$casa; ?>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-1">
                                    <i class="fa fa-building-o fa-lg" aria-hidden="true"></i>
                                  </div>
                                  <div class="col-sm-11">
                                    <?php echo$otro; ?>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-1">
                                    <i class="fa fa-phone fa-lg" aria-hidden="true"></i>
                                  </div>
                                  <div class="col-sm-11">
                                    <?php echo$tlf; ?>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-1">
                                    <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>
                                  </div>
                                  <div class="col-sm-11">
                                    <?php echo$movil; ?>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-1">
                                    <i class="fa fa-users fa-lg" aria-hidden="true"></i>
                                  </div>
                                  <div class="col-sm-11">
                                    <?php echo$tipo; ?>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-1">
                                    <i class="fa fa-birthday-cake fa-lg" aria-hidden="true"></i>
                                  </div>
                                  <div class="col-sm-11">
                                    <?php echo$bday; ?>
                                  </div>
                                </div>
  
                                </div>
                                
                              </div>
                              
                            </div>
 </body>
 </html>
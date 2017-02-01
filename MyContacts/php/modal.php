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
 <div class="modal-dialog" >
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header" style="text-align: center;">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Editar contacto</h4><p><?php echo$nombre; ?></p>
                                </div>
                                <div class="modal-body" >
                                  <form id="edit_contact" action="editcontact.proc.php" method="POST">
                                  <div class="row">
                                     <div class="col-sm-5">
                                          <i class="fa fa-user fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;<input type="text" id="cont_nombre" name="cont_nombre" value=" <?php echo $nombre ?>" style="width: 85%">
                                      </div>
                                      <div class="col-sm-7">
                                          <i class="fa fa-at fa-lg" aria-hidden="true"></i>&nbsp;<input type="email" name="cont_correo" value="<?php echo $correo;?>" style="width: 90%">
                                      </div> 
                                  </div>
                                  <br>
                                  <p style="text-align: left; color: grey;"><?php echo$casa; ?></p>
                                  <div class="row">
                                      <div class="col-sm-12">
                                      <i class="fa fa-home fa-lg" aria-hidden="true"></i>
                                        <input type="text" name="calle_casa" placeholder="Dirección casa" style="width: 30%">
                                        <input type="number" name="num_casa" placeholder="Núm." style="width: 10%">
                                        <input type="text" name="local_casa" placeholder="Localidad" style="width: 30%">
                                        <input type="text" name="ciudad_casa" placeholder="Ciudad" style="width: 20%">
                                      </div>
                                  </div>
                                  <br>
                                  <p style="text-align: left; color: grey;"><?php echo$otro; ?></p>
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
                                    <div class="col-sm-7">
                                        <i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbsp;<input type="tel" name="telf" value=" <?php echo $tlf;?>" maxlength="9" size="9" style="width: 40%">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&nbsp;<input type="tel" name="movil" value=" <?php echo $movil;?>" maxlength="9" size="9" style="width: 40%">
                                    </div>
                                    <div class="col-sm-5">
                                        <i class="fa fa-birthday-cake" aria-hidden="true" ></i>&nbsp;<input type="date" name="bday" value="<?php echo $bday;?>" >
                                    </div>
                                    
                                  </div>    
                                  <br>    
                                  <div class="row">
                                      <div class="col-sm-offset-5 col-sm-2">
                                      <input type="hidden" name="cont_id" value="<?php echo $cont_id;?>">
                                      <input type="hidden" name="casa" value="<?php echo $casa;?>">
                                      <input type="hidden" name="otro" value="<?php echo $otro;?>">
                                          <button class="btn btn-dark" name="add_contact" style="height: 32px;">Guardar</button>
                                      </div>
                                  </div>   
                                      
                                      
                                      
                                  </form>
                                </div>
                                
                              </div>
                              
                            </div>
 </body>
 </html>
                            
                          
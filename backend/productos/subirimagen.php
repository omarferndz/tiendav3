<?php

    $id=base64_decode($_GET['id']);   
    $wsqli="select idproducto,nombre from productos where idproducto='$id'";
  
    $result = $linki->query($wsqli);
    if($linki->errno) die($linki->error);
    $row = $result->fetch_array();


?>

            <div class="row">
            	<div class="col-md-4 col-md-offset-4 ">
                    	<form action="backend/productos/cargarimagen.php" method="post" enctype="multipart/form-data">
                     	<input name="idp" type="hidden" value="<?php echo $id; ?>">
						<div class="panel panel-primary">
                              <div class="panel-heading text-center">
                                <h3 class="panel-title">CARGAR FOTO DEL PRODUCTO<br><br>(<?php echo $row['nombre']?>)</h3>
                              </div>
                              <div class="panel-body">                                          
                                <div class="form-group">
                                    <label for="tipoprod" class="control-label col-md-4">Seleccionar imagen</label>
                                    <div class="col-md-8">
                                        <input type="file" name="foto" id="foto" class="form-control" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                	<?php  include_once('backend/mensajes.php');?> 
								  </div> 
                              </div>
                              <div class="panel-footer text-center">
             				
                             	<input type="submit" class="btn btn-success" value="Subir"/>
                                <a href="?pag=productos" class="btn btn-primary">Regresar</a>
                                  
                              </div>
                              
                              
                              
                              
                          </div>
                            
                      </form>
                    
                    </div>
                        
                </div>
                
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 pad">
                       <div class="thumbnail">
                        <table class="table table-striped table-hover table-bordered">
                          <thead>
                            <tr class="bg-primary text-center">                  
                              <td>IMAGENES</td>
                              <td>ELIMINAR</td>
                             
                            </tr>
                          </thead>
                          <tbody>
                          
                          <?php 
                          $wsqli="SELECT * from rproductofoto where idproducto='$id'";

                            $result = $linki->query($wsqli);
                            if($linki->errno) die($linki->error);
                            while($row = $result->fetch_array()){ 
							$idf=$row['idproductofoto'];
                           
                          ?>
                          
                            <tr class="tabtra text-center">
                              <td><img src="img/imgpro/f<?php echo $idf?>.jpg" width="100" ></td>
                            
                             
                              <td>
            <a class="eliminar_dato text-center" title="<?php echo 'Seguro que desea eliminar esta foto:<br><h4><center></h4><center>' ?>" 				href="eliminarfoto.php?id=<?php echo $id ?>"><button type="button" class="btn btn-danger  btn3d"><span class="glyphicon glyphicon-remove"> Eliminar</span></button></a>
            
                              </td>
                            </tr>
                            <?php }?>
                          </tbody>
                        </table> 
                    </div>
					</div>
         </div>
                                
   <?php 
   // para editar
   $id="";
   $idestatus="";
   $idubicacion="";
   $nombre="";
   $apellido="";
   $correo="";
   $clave="";
   $telefono="";
   $destino="insertar.php";
   $nboton="Guardar";
   if (isset($_GET['id'])){ //estas antes, son funciones para insertar, todos los campos se ponen el campo,
	 $id=base64_decode($_GET['id']);    
  	$wsqli="select * from usuarios where idusuario='$id'";

  	$result = $linki->query($wsqli);
  	if($linki->errno) die($linki->error);
  	$row = $result->fetch_array();
  	$idestatus=$row['idestatus'];
	$idubicacion=$row['idubicacion'];
	$nombre=$row['nombre']; 
	$apellido=$row['apellido'];
	$correo=$row['correo'];
	$clave=$row['clave'];
	$telefono=$row['telefonos'];
	$destino="modificar.php";
    $nboton="Actualizar";  
	   
	   
	   
   }

   ?>
   <div class="col-md-4 col-md-offset-4">
   <!--
 $destino para saber si va a insertar o modificar -->
	<form class="form-horizontal" action="backend/usuarios/<?php echo $destino ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<div class="panel panel-primary">
  		<div class="panel-heading">
			<h4 class="text-center">Tipos de Usuarios</h4>  
   		</div>  
   		<div class="panel-body">
   		
			<div class="form-group">
				<label for="estatus" class="control-label col-md-2">Estatus</label>
				<div	class="col-md-8">
					<select	name="estatus" id="estatus" class="form-control" required>
						<?php include("backend/combos/estatus.php");	 ?>
					 </select>	 
				</div>
			</div> 
			
			<div class="form-group">
				<label for="estatus" class="control-label col-md-2">Estado</label>
				<div	class="col-md-8">
					<select	name="ubicacion" id="estado" class="form-control" required>
						<?php include("backend/combos/ubicacion.php");	 ?>
					 </select>	 
				</div>
			</div> 
					
					<div class="form-group">
						<label class="control-label col-md-2" for="nombre">Nombre</label>
						<div class="col-md-8">
							<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>"required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="apellido">
							Apellido
						</label>
						<div class="col-md-8">
							<input type="text" name="apellido" id="apellido" class="form-control"  value="<?php echo $apellido ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="correo">Correo</label>
						<div class="col-md-8">
							<input type="text" name="correo" id="correo" class="form-control"  value="<?php echo $correo ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="clave">Clave</label>
						<div class="col-md-8">
							<input type="password" name="clave" id="clave" class="form-control"  value="<?php echo $clave ?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2" for="telefono">Telefono</label>
						<div class="col-md-8">
							<input type="number" name="telefono" id="telefono" class="form-control"  value="<?php echo $telefono ?>">
						</div>
						
				
			
		</div>
		</div>
		<?php  include_once('backend/mensajes.php');?>
		<div class="panel-footer text-center">	
			<input type="submit" class="btn btn-primary" value="<?php echo $nboton ?>">
			<a href="sistema.php?pag=tipousuario" class="btn btn-danger">Cancelar</a>
		</div>	    
	 </div>     
	</form>
	</div> 
              

                  <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                        <div class="thumbnail">
                                <h4 class="text-center">Listado de Usuarios</h4>
                               
                            
                        
                         
                          
                        
                          <table id="example" class="table table-striped table-bordered table-hover">
                             <thead>
                             
                               <tr class="bg-primary text-center" >
                                   <td>Codigo</td>
                                   <td>Estatus</td>
                                   <td>Tipo de Usuario</td>
                                   	<td>Nombre</td>
                                   	<td>Apellido</td>
									<td>Correo</td>
                                  	<td>Clave</td> 
                                  	<td>Telefono</td>   
                                   <td>Acciones</td>
                                   
                                </tr>
                             </thead> 

                             <tbody>
                             <?php 
                           		$wsqli="select usuarios.idusuario,estatus.nombre as estatus,usuarios.nombre,apellido,correo,clave,telefonos,tipousuarios.nombre as ntu from usuarios 
                                          inner join estatus on usuarios.idestatus=estatus.idestatus
										  inner join tipousuarios on usuarios.idtipousuario=tipousuarios.idtipousuario
                                          order by usuarios.nombre";
                                          $result = $linki->query($wsqli);
                                          if($linki->errno) die($linki->error);
                                           while($row = $result->fetch_array()){
										   $id=base64_encode($row['idusuario']);	
                        				   $n=$row['nombre'];  
                              ?> 

                             <tr>
                                <td><?php echo $row['idusuario'] ?></td>
                                <td><?php echo $row['estatus'] ?></td>
                                <td><?php echo $row['ntu'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['apellido'] ?></td>
                                <td><?php echo $row['correo'] ?></td>
                                <td><?php echo $row['clave'] ?></td>
                                <td><?php echo $row['telefonos'] ?></td>
                                
                                
                                <!-- editar registro y enviar el parametro-->
                                <td class="text-center">
                                <a href="?pag=usuarios&id=<?php echo $id ?>" class="glyphicon glyphicon-pencil btn btn-info btn-sm">
                               </a>&nbsp&nbsp&nbsp  
                        <a class="glyphicon glyphicon-remove btn btn-danger btn-sm eliminar_dato"  title="<?php echo '<center>Seguro que desea eliminar este registro:<br><h4>'.$n.'</h4><center>' ?>" href="backend/usuarios/eliminar.php?id=<?php echo $id ?>"></a>  
                                  </td>
                               </tr> 

                                <?php } ?>
                             </tbody>   
                          </table>
                  		</div>
					  </div>
                   </div>    
          	


                          
   <?php 
   // para editar
   $id="";
   $idestatus="";
   $nombre="";
   $destino="insertar.php";
   $nboton="Guardar";
   if (isset($_GET['id'])){
		$id=base64_decode($_GET['id']);    
		$wsqli="select * from categorias where idcategoria='$id'";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$row = $result->fetch_array();
	    if($row==0){
			header('location:sistema.php');
		}else{
			$idestatus=$row['idestatus'];
			$nombre=$row['nombre'];
			$destino="modificar.php";
			$nboton="Actualizar";
		}  
   }

   ?>
   <div class="col-md-4 col-md-offset-4">
   <!--
 $destino para saber si va a insertar o modificar -->
	<form class="form-horizontal" action="backend/categorias/<?php echo $destino ?>" method="post">
	<input type="hidden" name="id" value="<?php echo $id ?>">
	<div class="panel panel-primary">
  		<div class="panel-heading">
			<h4 class="text-center">Categorias</h4>  
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
				<label for="nombre" class="control-label col-md-2">Nombre</label>
				<div	class="col-md-8">
				 	<input type="text"	name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>" required>
				</div>
			</div>
			
				<?php  include_once('backend/mensajes.php');?>
			
		</div>
		<div class="panel-footer text-center">	
			<input type="submit" class="btn btn-primary" value="<?php echo $nboton ?>">
			<a href="sistema.php?pag=categorias" class="btn btn-danger">Cancelar</a>
		</div>	    
	 </div>     
	</form>
	</div>                  

                  <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                        <div class="thumbnail">
                                <h4 class="text-center">Listado de Categorias</h4>
                               
                            
                        
                         
                          
                        
                          <table id="example" class="table table-striped table-bordered table-hover">
                             <thead>
                             
                               <tr class="bg-primary text-center" >
                                   <td>Codigo</td>
                                   <td>Estatus</td>
                                   <td>Nombre</td>
                                   <td>Acciones</td>
                                </tr>
                             </thead> 

                             <tbody>
                             <?php 
                           		$wsqli="select Categorias.idcategoria,estatus.nombre as estatus,Categorias.nombre from categorias 
                                          inner join estatus on categorias.idestatus=estatus.idestatus
                                          order by categorias.nombre";
                                          $result = $linki->query($wsqli);
                                          if($linki->errno) die($linki->error);
                                           while($row = $result->fetch_array()){
										   $id=base64_encode($row['idcategoria']);	
                        				   $n=$row['nombre'];  
                              ?> 

                             <tr>
                                <td><?php echo $row['idcategoria'] ?></td>
                                <td><?php echo $row['estatus'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <!-- editar registro y enviar el parametro-->
                                <td class="text-center">
                                <a href="?pag=categorias&id=<?php echo $id ?>" class="glyphicon glyphicon-pencil btn btn-info btn-sm">
                               </a>&nbsp&nbsp&nbsp  
                        <a class="glyphicon glyphicon-remove btn btn-danger btn-sm eliminar_dato"  title="<?php echo '<center>Seguro que desea eliminar este registro:<br><h4>'.$n.'</h4><center>' ?>" href="backend/categorias/eliminar.php?id=<?php echo $id ?>"></a>  
                                  </td>
                               </tr> 

                                <?php } ?>
                             </tbody>   
                          </table>
                  		</div>
					  </div>
                   </div>    
          	


                          
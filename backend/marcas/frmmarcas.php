  <?php 
   // para editar
   $id="";
   $idestatus="";
   $nombre="";
   $destino="insertar.php";
   $nboton="Guardar";
   if (isset($_GET['id'])){
		$id=base64_decode($_GET['id']);   
		$wsqli="SELECT * from marcas where idmarca='$id'";
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
    	<form class="form-horizontal" action="backend/marcas/<?php echo $destino ?>" method="post">
    	<input type="hidden" name="id" value="<?php echo $id ?>">
      	<div class="panel panel-primary">
			 <div class="panel panel-heading">
					<h4 class="text-center">Marcas</h4>  
			  </div>                          
		<div class="panel-body">
			<div class="form-group">
				<label for="estatus" class="control-label col-md-2">Estatus</label>
				<div class="col-md-8">
					<select	name="estatus" id="estatus" class="form-control" required>
					<?php include("backend/combos/estatus.php");	 ?>
					</select>	 
				</div>
			</div>                                     		
			<div class="form-group">
				<label for="nombre" class="control-label col-md-2">Nombre</label>
				<div class="col-md-8">
					<input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>" required>   
				</div>
			</div>	
			
				<?php  include_once('backend/mensajes.php');?>
			
		</div>                           
        <div class="panel-footer text-center">  
           	<input type="submit" class="btn btn-primary" value="<?php echo $nboton ?>">
            <a href="sistema.php?pag=marcas" class="btn btn-danger">Cancelar</a>
      </div>    
    </div>      
	</form>
</div>                  

                  

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
             <div class="thumbnail">
                 <h4 class="text-center">Listado de Marcas</h4>
                         
					   <table id="example" class="table table-striped table-bordered table-hover">
						   <thead>
                           
                               <tr class="bg-primary text-center">
                                   <td>Codigo</td>
                                   <td>Estatus</td>
                                   <td>Nombre</td>
                                   <td>Acciones</td>
                                </tr>
                             </thead> 

                             <tbody>
                             <?php 
                           $wsqli="select marcas.idmarca,estatus.nombre as estatus,marcas.nombre 
                                              from marcas 
                                              inner join estatus
                                              on marcas.idestatus=estatus.idestatus
                                              order by marcas.nombre";
                                            $result = $linki->query($wsqli);
                                            if($linki->errno) die($linki->error);
                                            while($row = $result->fetch_array()){
                                            $id=base64_encode($row['idmarca']);  
                                            $n=$row['nombre'];  
                              ?> 

                               <tr>
                                  <td><?php echo $row['idmarca'] ?></td>
                                  <td><?php echo $row['estatus'] ?></td>
                                  <td><?php echo $row['nombre'] ?></td>
                                  
                                  <td class="text-center">
                                  <a href="?pag=marcas&id=<?php echo $id ?>" class="glyphicon glyphicon-pencil btn btn-info btn-sm">
                                </a>&nbsp&nbsp&nbsp  
                                  <a class="glyphicon glyphicon-remove btn btn-danger btn-sm eliminar_dato"  title="<?php echo '<center>Seguro que desea eliminar este registro:<br><h4>'.$n.'</h4><center>' ?>" href="backend/marcas/eliminar.php?id=<?php echo $id ?>"></a>   
                                    </td>
                                 </tr> 

                                  <?php } ?>
                               </tbody>   
                          </table>
                    </div>
                 </div>    
           </div>
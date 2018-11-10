     <?php 
   // para editar
	$id="";
	$idestatus="";
	$tipoprod="";
	$nombre="";
	$categoria="";
	$marca="";
	$cantidad="";
	$precio="";
	$descripcion="";
	$destino="insertar.php";
	$nboton="Guardar";
	if (isset($_GET['id'])){
		$id=base64_decode($_GET['id']);   
		$wsqli="select * from productos where idproducto='$id'";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$row = $result->fetch_array();
		if($row==0){
			header('location:sistema.php');
		}else{	
			$tipoprod=$row['idtipoproducto'];
			$categoria=$row['idcategoria'];
			$marca=$row['idmarca'];
			$cantidad=$row['cantidad'];
			$idestatus=$row['idestatus'];
			$nombre=$row['nombre'];
			$precio=$row['precio'];
			$descripcion=$row['descripcion'];
			$destino="modificar.php";
			$nboton="Actualizar";
		}
   }

   ?>


<div class="col-md-6 col-md-offset-3">
	<form class="form-horizontal" action="backend/productos/<?php echo $destino ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="text-center">Productos</h4>  
			</div>  
			<div	class="panel-body">
				<div class="form-group">
					<label for="tipoprod" class="control-label col-md-2">Tipo Producto</label>
					<div	class="col-md-8">
						<select	name="tipoprod" id="tipoprod" class="form-control" value="<?php echo $tipoprod ?>" required>
						<?php include("backend/combos/tipoproducto.php");	 ?>
						</select>
					</div>
				</div>  
				<div class="form-group">
					<label for="categoria" class="control-label col-md-2">Categoria</label>
					<div	class="col-md-8">
						<select	name="categoria" id="categoria" class="form-control" value="<?php echo $categoria ?>" required>
						<?php include("backend/combos/categorias.php");	 ?>
						</select>
					</div>
				</div> 
				<div class="form-group">
					<label for="marca" class="control-label col-md-2">Marca</label>
					<div	class="col-md-8">
						<select	name="marca" id="marca" class="form-control" value="<?php echo $marca ?>" required>
						<?php include("backend/combos/marcas.php");	 ?>
						</select>
					</div>
				</div>                                          
				<div class="form-group">
					<label for="estatus" class="control-label col-md-2">Estatus</label>
					<div	class="col-md-8">
						<select	name="estatus" id="estatus" class="form-control" value="<?php echo $estatus ?>" required>
						<?php include("backend/combos/estatus.php");	 ?>
						</select>
					</div>
				</div>   
				<div class="form-group">
					<label for="nombre" class="control-label col-md-2">Nombre</label>
					<div class="col-md-8">
						<input type="text"	name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>" required>
					</div>
				</div>	
				<div class="form-group">
					<label for="cantidad" class="control-label col-md-2">Cantidad</label>
					<div class="col-md-8">
						<input type="number" name="cantidad" id="cantidad" class="form-control" value="<?php echo $cantidad ?>" required>
					</div>
				</div> 
				<div class="form-group">
					<label for="precio" class="control-label col-md-2">Precio</label>
					<div class="col-md-8">
						<input type="text" name="precio" id="precio" class="form-control" value="<?php echo $precio ?>" required>
					</div>
				</div> 
				<div class="form-group">
					<label for="descripcion" class="control-label col-md-2">Descripcion </label>
					<div class="col-md-8">
						<textarea name="descripcion" id="descripcion" class="form-control" required rows="8"><?php echo $descripcion ?></textarea> 
					</div>
				</div> 

				<?php  include_once('backend/mensajes.php');?>  
			</div>  
			<div class="panel-footer text-center">	
				<input type="submit" class="btn btn-primary" value="<?php echo $nboton ?>">
				<a href="?pag=productos" class="btn btn-danger">Cancelar</a>
			</div>	
		</div>      
		</div>
	</form>

	<</div>                  
	<div class="row">
		<div class="container thumbnail">
		<h4 class="text-center">Listado de Productos</h4>                        
		<table id="example" class="table table-striped table-bordered table-hover">
		<thead>
			<tr class="bg-primary text-center">
			<td>Codigo</td>
			<td>Estatus</td>
			<td>Nombre</td>
			<td>Cantidad</td>
			<td>Precio</td>
			<td>Total</td>
			<td>Acciones</td>
		</tr>
		</thead> 
		<tbody>
			<?php
			$filtro="";
			if($_SESSION['idt']==3){
				$idu=$_SESSION['idu'];
				$filtro=" where idusuario='$idu'";
			}
			$wsqli="select productos.idproducto,estatus.nombre as estatus,productos.nombre,
			precio,cantidad,cantidad*precio as total
			from productos 
			inner join estatus
			on productos.idestatus=estatus.idestatus
			$filtro
			order by productos.nombre";
			$result = $linki->query($wsqli);
			if($linki->errno) die($linki->error);
			while($row = $result->fetch_array()){
				$id=base64_encode($row['idproducto']); 
				$n=$row['nombre'];  

			?> 

				<tr class="text-center">
				<td><?php echo $row['idproducto'] ?></td>
				<td><?php echo $row['estatus'] ?></td>
				<td class="text-left"><?php echo $row['nombre'] ?></td>
				<td class="text-right"><?php echo $row['cantidad'] ?></td>
				<td class="text-right"><?php echo number_format($row['precio'],2,',','.') ?></td>
				<td class="text-right"><?php echo number_format($row['total'],2,',','.') ?></td>
				<td>
				<?php if($_SESSION['idt']!=2){?>
					<a href="?pag=productos&id=<?php echo $id ?>" class="glyphicon glyphicon-pencil btn btn-info btn-sm">
					</a> 

					<a class="glyphicon glyphicon-remove btn btn-danger btn-sm eliminar_dato"  title="<?php echo '<center>Seguro que desea eliminar este registro:<br><h4>'.$n.'</h4><center>' ?>" href="backend/productos/eliminar.php?id=<?php echo $id ?>"></a>

					<a class="btn btn-primary btn-sm glyphicon glyphicon-camera" href="?pag=subirimagen&id=<?php echo $id ?>"></a>
				<?php } ?>
				</td>
				</tr> 
			<?php } ?>
		</tbody>   
		</table>
		</div>
	</div>    
</div>
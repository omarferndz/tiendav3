<!doctype html>
<html lang="en">
  <?php include_once("frontend/enca.php"); ?>

<body>
<?php include_once("config/conexi.php"); ?>
    <?php include_once("config/funciones.php"); ?>
  	<?php include_once("frontend/encabezado.php"); ?>
    <?php include_once("frontend/menu.php"); ?>
 <div class="container-fluid" style="background:#EEE; ">
 	<div class="container">
    <?php
	if(!isset($_GET['idp'])){
			
	}else{
		$idp=mysqli_real_escape_string($linki,$_GET['idp']);
		 $wsqli="select *,productos.nombre as np, categorias.nombre as nc, marcas.nombre as nm, tipoproducto.nombre as ntp, usuarios.nombre as nu, ubicacion.nombre as nub from productos
		 	inner join categorias 	on productos.idcategoria	=categorias.idcategoria
		 	inner join marcas     	on productos.idmarca  		=marcas.idmarca
			inner join tipoproducto on productos.idtipoproducto	=tipoproducto.idtipoproducto
			inner join usuarios 	on productos.idusuario		=usuarios.idusuario
			inner join ubicacion 	on usuarios.idubicacion		=ubicacion.idubicacion
			where idproducto='$idp'";
		//echo $wsqli;
        $result = $linki->query($wsqli);
        if($linki->errno) die($linki->error);
        if($row = $result->fetch_array()){
			$idc=$row['idcategoria'];
			$wsqli="select idproductofoto from rproductofoto where idproducto='$idp'";
			$result2 = $linki->query($wsqli);
			unset($idf);
			$idf[]="";
			$i=0;
			while($row2 = $result2->fetch_array()){
				$idf[$i]=$row2['idproductofoto'];
				$i++;
			}	
			
			
		}
	}
		
		
		
	?>
    	
     
     
    	<h2 class="text-primary text-center">DETALLE DEL PRODUCTO</h2>
        
        <div class="row thumbnail">
        	<div class="col-md-8 thumbnail">
            	
                <div class="preview-pic tab-content">
                  <?php
				  	$activo="active";
					for($j=0;$j<$i;$j++){
						if($j>0)$activo="";
					?>
                  <div class="tab-pane <?php echo $activo ?>" id="pic-<?php echo $j ?>"><img src="img/imgpro/f<?php echo $idf[$j] ?>.jpg" /></div>
                  <?php
						}
				  ?>
                </div>
                
                
                
			</div>
            
        	<div class="col-md-4 ">
            	<ul class="list-group">
                	<li class="list-group-item list-group-item-heading"><h4 class="text-center"><?php echo $row['np'] ?></h4></li>
					<li class="list-group-item"><b>Categoria: </b><?php echo $row['nc'] ?></li>
                    <li class="list-group-item"><b>Marca: </b><?php echo $row['nm'] ?></li>
                    <li class="list-group-item"><b>Ubicacion: </b><?php echo $row['nub'] ?></li>
                    <li class="list-group-item"><b>Tipo de Producto: </b><?php echo $row['ntp'] ?></li>
                    <li class="list-group-item"><b>Cantidad: </b><?php echo $row['cantidad'] ?></li>
                    <li class="list-group-item"><h5 class="text-center"><b>Datos del Vendedor</b></h5></li>
                    <li class="list-group-item"><b>Nombre: </b><?php echo $row['nu'].' '.$row['apellido'] ?></li>
                    <li class="list-group-item"><b>Telefono: </b><?php echo $row['telefonos'] ?></li>
                    <li class="list-group-item"><b>Correo: </b><?php echo $row['correo'] ?></li>
                    <li class="list-group-item"><h4 class="text-center text-danger">Precio : <?php echo number_format($row['precio'],2,',','.') ?></h4></li>
                    <li class="list-group-item text-center">
                    	<a href="index.php" class="btn btn-primary">Regresar</a>
                    	<a href="index.php" class="btn btn-danger">Comprar</a>
                    </li>
				</ul>
            </div>
            
           
    	</div>
        <div class="row thumbnail">
         <ul class="nav nav-tabs thumbnail">
                   <?php
				  	$activo="active";
					for($j=0;$j<$i;$j++){
						if($j>0)$activo="";
					?>
                    <li class="thumbnail <?php echo $activo ?>"><a data-target="#pic-<?php echo $j ?>" data-toggle="tab"><img src="img/imgpro/f<?php echo $idf[$j] ?>.jpg"  width="100" /></a></li>
                     <?php
						}
				   ?>
                    
          		</ul>
          		<div class="thumbnail">
          			<h3 class="text-center">Descripción</h3>
          			<?php echo nl2br($row['descripcion']) ?>
          		</div>
        </div>
        
    </div> 
       
   </div>  
       
         
         
  

   <div class="clearfix"></div>
   <div class="well" style="margin-bottom:0">
 		<div class="container hidden-xs  thumbnail">
 			<div class="thumbnail">
				<h3 class="text-center text-danger">Otros productos de la categoria<b> <?php echo $row['nc'] ?></b></h3>
 			     
        </div>
  		
   		
   		<?php
		$wsqli="select idproducto, productos.nombre as np, precio from productos	
		where productos.idcategoria='$idc'";

        $result = $linki->query($wsqli);
        if($linki->errno) die($linki->error);
        while($row = $result->fetch_array()){
			$idp=$row['idproducto'];
			$wsqli="select idproductofoto from rproductofoto where idproducto='$idp' limit 1";
		
			$result2 = $linki->query($wsqli);
			$idf=0;
			if ($row2 = $result2->fetch_array()){
				$idf=$row2['idproductofoto'];	
			}
		
		?>
    		<div class="col-xs-6 col-md-2">
        		<a href="detalle.php?idp=<?php echo $idp ?>" class="thumbnail resaltar">
            		<img src="img/imgpro/f<?php echo $idf ?>.jpg" class="img-responsive img-thumbnail"> 
    
                	<h5 class="text-danger text-center"><?php echo number_format($row['precio'],2,',','.') ?> Bs.</h5>
            	</a>
         	</div> 
		 <?php
			}
		 ?>
          
      
  		</div>
  </div>
  
  
<footer  style="background:#000; height:300px; width:100%">


</footer>
 
 
    <?php include_once("frontend/piedepagina.php"); ?>
  <?php include_once("config/cerrarconexi.php"); ?>
    
    
    <script src="js/jquery-local-min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>  
</html>
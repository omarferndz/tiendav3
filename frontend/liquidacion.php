<div class="panel panel-primary ">
    <div class="panel-heading">
        Liquidación
    </div>
    <div class="panel-body">
     <?php
   		$wsqli="select idproducto,nombre,precio from productos where idtipoproducto=3 order by rand() limit 12";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		while($row = $result->fetch_array()){
			$idp		=$row['idproducto'];
			$nombre		=$row['nombre'];
			$precio		=number_format($row['precio'],0,',','.');
			
			$wsqli="select idproductofoto from rproductofoto where idproducto='$idp' limit 1";
			$result2 = $linki->query($wsqli);
			$idf=0;
			if ($row2 = $result2->fetch_array()){
				$idf=$row2['idproductofoto'];	
			}
			
			
				
   	?>   
       <div class="col-xs-4 col-md-2 col-lg-1"> 
        <div class="thumbnail text-center resaltar">
             <img src="img/imgpro/f<?php echo $idf?>.jpg" class="img-responsive img-thumbnail">
             <a href="detalle.php?idp=<?php echo $idp ?> " class="btn btn-danger btn-xs btn-block">Ver detalle</a>
        </div>
        </div>
     <?php  }?>    
    </div>
</div> 
<div class="panel panel-primary ">
    <div class="panel-heading">
        Ofertas Especiales
    </div>
    <div class="panel-body">
     <?php
   		$wsqli="select idproducto,nombre,precio from productos where idtipoproducto=2 order by rand() limit 2";
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
        
        <div class="thumbnail text-center resaltar">
             <img src="img/imgpro/f<?php echo $idf?>.jpg" class="img-responsive img-thumbnail">
                <h5 class="text-primary"><?php echo $nombre?></h5>
                <h4 class="text-danger"><?php echo $precio?> Bs.</h4>
              <a href="detalle.php?idp=<?php echo $idp ?>" class="btn btn-danger btn-xs btn-block">Ver detalle</a>
        </div>
     <?php  }?>    
    </div>
</div> 
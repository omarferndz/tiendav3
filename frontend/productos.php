<?php




$titulo	="";
$txt	="";
$wsqli	="";
if(isset($_GET['idc'])){
	//SE ELIMINAN POSIBLES ETIQUETAS HTML Y PHP EN LAS PALABRAS INGRESADAS strip_tags() mysqli_real_escape_string()
	$idc=strip_tags($_GET['idc']);
	$idc=mysqli_real_escape_string($linki,$idc);
	$txt="DE LA CATEGORIA (";
	$wsqli="select nombre from categorias where idcategoria='$idc'";
}
if(isset($_GET['idm'])){
	$idm=strip_tags($_GET['idm']);
	$idm=mysqli_real_escape_string($linki,$idm);
	$txt="DE LA MARCA (";
	$wsqli="select nombre from marcas where idmarca='$idm'";
}
if(isset($_GET['idu'])){
	$idu=strip_tags($_GET['idu']);
	$idu=mysqli_real_escape_string($linki,$idu);
	$txt="EN LA UBICACION (";
	$wsqli="select nombre from ubicacion where idubicacion='$idu'";
}
if(isset($_GET['buscar'])){
	$buscar=strip_tags($_GET['buscar']);
	$buscar=mysqli_real_escape_string($linki,$buscar);
	$titulo="DE (".strtoupper($buscar).")";
}
if($wsqli!=""){
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	$row = $result->fetch_array();
	$titulo=$txt.strtoupper($row['nombre']).")";
}
?>






<a name="productos"></a>
<div class="row">
<div class="panel panel-primary">


<div class="panel-heading text-center">
    <h5>LISTADO DE PRODUCTOS <?php echo $titulo ?></h5>
</div>
<div  class="panel-body">
    	<?php
		
		
		
		
		
		
		
		
		
		
		
		$filtro="";
		$union="";
		if(isset($_GET['idc'])){
			$filtro=" where idcategoria='$idc'";
		}
		if(isset($_GET['idm'])){
			$filtro=" where idmarca='$idm'";
		}
		if(isset($_GET['buscar'])){
			$filtro=" where nombre like '$buscar%'";
		}
		if(isset($_GET['idu'])){
			$filtro=" where idubicacion='$idu'";
			$union="inner join usuarios on productos.idusuario=usuarios.idusuario ";
		}
		
		//para el paginador
		$TAMANO_PAGINA = 12; 
		//verifico si hay pagina si no inicio las variables inicio y pagina 
		if (!isset ($_GET["pagina"])) {
			$inicio = 0; 
			$pagina=1; 
		}else{
			$pagina	=strip_tags($_GET["pagina"]);
			$pagina	=mysqli_real_escape_string($linki,$pagina); 		
			$inicio =($pagina - 1) * $TAMANO_PAGINA; 
		}
        // para obtener el total_paginas se lee la tabla
        $wsqli="select idproducto from productos $union $filtro";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$num_total_registros = mysqli_num_rows($result); 
		//calculo el total de páginas 
		$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);
		$limite="order by idproducto desc limit  $inicio, $TAMANO_PAGINA";
		

		//cursor final
		$wsqli="select idproducto,productos.nombre,precio from productos $union $filtro $limite";
		//echo $wsqli;

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
    
    <div class="mostrar_productos">
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="thumbnail text-center resaltar">
                <img src="img/imgpro/f<?php echo $idf?>.jpg" class="img-responsive img-thumbnail">
                <h5 class="text-primary"><?php echo $nombre?></h5>
                <h4 class="text-danger"><?php echo $precio?> Bs.</h4>
                <a href="detalle.php?idp=<?php echo $idp ?>" class="btn btn-danger btn-block">Ver detalle</a>
            </div>
        </div>
    </div>
     <?php  }?> 
     
     
</div>


<?php if($total_paginas>1){?>
<div class="panel-footer">
    <nav class="text-center">
      <ul class="pagination">
       <?php if ($pagina != 1){?>  
        	<li><a href="index.php?pagina=<?php echo ($pagina-1) ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
       <?php }?>  
       <?php  for ($i=1;$i<=$total_paginas;$i++){ ?>
        	<li><a href="index.php?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
       <?php }?> 
       <?php if ($pagina != $total_paginas){?>
       		<li><a href="index.php?pagina=<?php echo ($pagina+1) ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span> </a></li>      
       <?php }?> 
      </ul>
    </nav>
</div>
<?php }?>
</div>
</div>
<?php 
session_start(); 
?>
<!doctype html>
<html lang="en">
  <?php include_once("frontend/enca.php"); ?>
 
  <body>
 
    <?php include_once("config/conexi.php"); ?>
    <?php include_once("config/funciones.php"); ?>
  	<?php include_once("frontend/encabezado.php"); ?>
    <?php include_once("frontend/menu.php"); ?>
   	
     <div class="container-fluid" style="margin-top:5px">
     	<div class="row">
     		<div class="col-md-3 hidden-xs">
        		<?php include_once("frontend/categorias.php"); ?>
                <?php include_once("frontend/marcas.php"); ?>
                <?php include_once("frontend/ubicacion.php"); ?>
                <?php include_once("frontend/ofertas.php"); ?>   
        	</div>
        	<div class="col-md-9 ">
            	 <?php include_once("frontend/carrusel.php"); ?>
            	 <?php include_once("frontend/productos.php"); ?>
                   	
     		</div>
          
  	</div>
     <?php include_once("frontend/liquidacion.php"); ?> 
  </div>
  
  <?php include_once("frontend/piedepagina.php"); ?>

    
    
    <script src="js/jquery-local-min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 
 
   <?php include_once("frontend/modales.php"); ?>  
      <?php include_once("config/cerrarconexi.php"); ?>
  </body>
</html>
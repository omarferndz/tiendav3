<?php 
session_start(); 
if(!isset($_SESSION['idu'])) header('location:index.php');
?>
<!doctype html>
<html lang="en">
  <?php include_once("backend/enca.php"); ?>
 
  <body>
 
    <?php include_once("config/conexi.php"); ?>
    <?php include_once("config/funciones.php"); ?>
  	<?php include_once("backend/encabezado.php"); ?>
    <?php 
	  	if($_SESSION['idt']==1)include_once("backend/menus.php"); 
	  	if($_SESSION['idt']==2)include_once("backend/menuo.php"); 
	  	if($_SESSION['idt']==3)include_once("backend/menuv.php"); 
	  
	  ?>
   	
     <div class="container-fluid" style="margin-top:5px">
     	<div class="row">
     		<?php
			if(!isset($_GET['pag'])){
				echo "<h2 class='text-center'>Bienvenido al sistema</h2>";
			}else{
				$pag=$_GET['pag'];
				if($pag=='categorias')include_once("backend/categorias/frmcategorias.php");
				else if($pag=='marcas')include_once("backend/marcas/frmmarcas.php");
				else if($pag=='ubicacion')include_once("backend/ubicacion/frmubicacion.php");
				else if($pag=='tipoproducto')include_once("backend/tipoproducto/frmtipoproducto.php");
				else if($pag=='productos')include_once("backend/productos/frmproductos.php");
				else if($pag=='subirimagen')include_once("backend/productos/subirimagen.php");
				else if($pag=='usuarios')include_once("backend/usuarios/frmusuario.php");
			}
			
			
			?>
          
  		</div>
     
  </div>
  
  <?php 
	    include_once("frontend/piedepagina.php"); 
  		include_once("config/cerrarconexi.php"); 
	  	include_once("backend/piedepagina.php"); 
	  ?>
    
    
   
        
        
  

        
        
 
     
    
  </body>
</html>
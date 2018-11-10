<header>
  <div class="container-fluid well well-sm" style="margin:5px">
          <div class="row">
          		<div class="col-md-6">
              		<img src="img/logo1.png" class="img-responsive ">
              	</div>
              	<div class="col-md-6 text-center">
              	<?php 
					if(isset($_SESSION['mensajenoexiste'])){
						echo $_SESSION['mensajenoexiste'];
					}
					?>
					
			   </div>
          </div>
  </div>
  
   	
</header>
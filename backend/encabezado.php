<header>
  <div class="container-fluid well well-sm" style="margin:5px">
          <div class="row">
          		<div class="col-md-6">
              		<img src="img/logo1.png" class="img-responsive ">
              	</div>
              	<div class="col-md-6 text-center">
              	<?php 
					if(isset($_SESSION['bienvenido'])){
						echo $_SESSION['bienvenido'];
					}
					?>
					
			   </div>
          </div>
  </div>
  
   	
</header>
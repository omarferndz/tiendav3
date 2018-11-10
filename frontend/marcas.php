 <div class="panel panel-primary ">
    <div class="panel-heading">
        Marcas
    </div>
     <?php    
	 	$wsqli="select marcas.idmarca,marcas.nombre as nm, count(*) as cantidad from marcas 
     	inner join productos on marcas.idmarca=productos.idmarca
    	group by marcas.idmarca 
    	order by nm";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	while($row = $result->fetch_array()){
?>   
<a href="index.php?idm=<?php echo $row['idmarca']?>"class="list-group-item">
   <span class="badge">
    <?php echo  $row['cantidad'] ?>
     </span>
      <?php echo  $row['nm'] ?>
    </a>
    

<?php } ?>
	
     

    <div class="panel-footer text-center">
        <a href='index.php' class="btn btn-primary btn-block">Ver todos</a> 
    </div>
</div>
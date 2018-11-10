<div class="panel panel-primary ">
    <div class="panel-heading">
        Categorias
    </div>
    
   
    <?php 
    $wsqli="select categorias.idcategoria, categorias.nombre as nc, count(*) as cantidad from categorias 
        inner join productos on categorias.idcategoria=productos.idcategoria
        group by categorias.idcategoria 
        order by nc";
        $result = $linki->query($wsqli);
        if($linki->errno) die($linki->error);
        while($row = $result->fetch_array()){
    ?>   
        <a href="index.php?idc=<?php echo $row['idcategoria']?>"class="list-group-item"> 
            <span class="badge"> <?php echo $row['cantidad'] ?> </span> <?php echo  $row['nc'] ?>
        </a>
    <?php } ?>
	
	
	
	
    <div class="panel-footer text-center">
        <a href='index.php' data-cat="0" class="btn btn-primary btn-block">Ver todos</a> 
    </div>

</div>
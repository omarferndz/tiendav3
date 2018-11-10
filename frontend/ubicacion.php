<div class="panel panel-primary ">
    <div class="panel-heading">
        Ubicacioón
    </div>
  <?php 
    $wsqli="select ubicacion.idubicacion,ubicacion.nombre as nu, count(*) as cantidad  from ubicacion 
        inner join usuarios on ubicacion.idubicacion=usuarios.idubicacion
        inner join productos on usuarios.idusuario=productos.idusuario
        group by ubicacion.idubicacion 
        order by nu";
        $result = $linki->query($wsqli);
        if($linki->errno) die($linki->error);
        while($row = $result->fetch_array()){
    ?>   
    
    <a href="index.php?idu=<?php echo $row['idubicacion']?>"class="list-group-item">
       <span class="badge">
       <?php echo  $row['cantidad'] ?>
       </span>
          <?php echo  $row['nu'] ?>
        </a>
        
    
    <?php } ?>
    <div class="panel-footer text-center">
        <a href='index.php' data-cat="0" class="btn btn-primary btn-block">Ver todos</a> 
    </div>

</div>
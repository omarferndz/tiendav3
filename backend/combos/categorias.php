<option	value="">Seleccione una opcion</option>
<?php 
$wsqli="select idcategoria,nombre  from categorias order by nombre";
$result = $linki->query($wsqli);
if($linki->errno) die($linki->error);
while($row2 = $result->fetch_array()){
$idc=$row2['idcategoria'];
 ?>
<option	value="<?php echo $row2['idcategoria'] ?>"<?php if($categoria==$idc){?> selected<?php }?>><?php echo $row2['nombre'] ?></option>

				  
<?php }?> 
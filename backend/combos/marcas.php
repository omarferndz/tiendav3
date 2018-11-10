<option	value="">Seleccione una opcion</option>
<?php 
$wsqli="select idmarca,nombre  from marcas order by nombre";
$result = $linki->query($wsqli);
if($linki->errno) die($linki->error);
while($row2 = $result->fetch_array()){ 
$idc=$row2['idmarca'];

	?>
<option	value="<?php echo $row2['idmarca'] ?>" <?php if($marca==$idc){?> selected<?php }?>><?php echo $row2['nombre'] ?></option>

				  
<?php }?> 
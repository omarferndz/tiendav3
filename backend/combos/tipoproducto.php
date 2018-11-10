<option	value="">Seleccione una opcion</option>
<?php 
$wsqli="select idtipoproducto,nombre  from tipoproducto order by nombre";
$result = $linki->query($wsqli);
if($linki->errno) die($linki->error);
while($row2 = $result->fetch_array()){ 
$idc=$row2['idtipoproducto'];

	?>
<option	value="<?php echo $row2['idtipoproducto'] ?>"<?php if($tipoprod==$idc){?> selected<?php }?>><?php echo $row2['nombre'] ?></option>

				  
<?php }?> 
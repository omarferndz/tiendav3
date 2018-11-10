<option	value="">Seleccione una opcion</option>
<?php 
$wsqli="select idubicacion,nombre  from ubicacion order by nombre";
$result = $linki->query($wsqli);
if($linki->errno) die($linki->error);
while($row2 = $result->fetch_array()){ 
$idu=$row2['idubicacion'];
?>
<option	value="<?php echo $row2['idubicacion'] ?>"<?php if($idubicacion==$idu){?> selected<?php }?> ><?php echo $row2['nombre'] ?></option>

				  
<?php }?> 
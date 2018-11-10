<option	value="">Seleccione una opcion</option>
<?php 
$wsqli="select idestatus,nombre  from estatus order by nombre";
$result = $linki->query($wsqli);
if($linki->errno) die($linki->error);
while($row2 = $result->fetch_array()){ 

$idc=$row2['idestatus'];

?>

<option	value="<?php echo $row2['idestatus'] ?>"<?php if($idestatus==$idc){?> selected<?php }?>><?php echo $row2['nombre'] ?></option>
				  
<?php }?> 
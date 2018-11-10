<?php
 	include_once("../config/conexi.php");
	$wsqli="select categorias.idcategoria,categorias.nombre, COUNT(*) as cp from categorias
			inner join productos on categorias.idcategoria=productos.idcategoria
			GROUP BY categorias.idcategoria
			order by categorias.nombre";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$members = array();
		while($row = $result->fetch_array()){
			array_push($members, $row);
		}
 
		$out['members'] = $members;

 
header("Content-type: application/json");
echo json_encode($out);
die();
 
?>

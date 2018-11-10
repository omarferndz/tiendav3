<?php
 	include_once("../config/conexi.php");
	$wsqli="select marcas.idmarca,marcas.nombre, COUNT(*) as cp from marcas
			inner join productos on marcas.idmarca=productos.idmarca
			GROUP BY marcas.idmarca
			order by marcas.nombre";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$marcas = array();
		while($row = $result->fetch_array()){
			array_push($marcas, $row);
		}
 
		$out['marcas'] = $marcas;

 
header("Content-type: application/json");
echo json_encode($out);
die();
 
?>

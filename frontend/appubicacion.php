<?php
 	include_once("../config/conexi.php");
	$wsqli="select ubicacion.idubicacion,ubicacion.nombre, COUNT(*) as cp from ubicacion
			inner join usuarios 	on ubicacion.idubicacion	=usuarios.idubicacion
			inner join productos 	on usuarios.idusuario		=productos.idusuario
			GROUP BY ubicacion.idubicacion
			order by ubicacion.nombre";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$ubicacion = array();
		while($row = $result->fetch_array()){
			array_push($ubicacion, $row);
		}
 
		$out['ubicacion'] = $ubicacion;

 
header("Content-type: application/json");
echo json_encode($out);
die();
 
?>

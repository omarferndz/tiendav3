<?php
	session_start();
	if(isset($_POST['estatus']) and (isset($_POST['nombre']))){
		include("../../config/conexi.php");
		$estatus=mysqli_real_escape_string($linki, $_POST['estatus']);
		$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
		$wsqli="select * from tipoproducto where nombre='$nombre'";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$row = $result->fetch_array();
		if ($row>0){
			$_SESSION['mensaje']="<b>Error!!</b>Ya existe este tipo de producto";
			$_SESSION['tm'] =0; //<!-- tipo de mensaje para coloarle un color
		}else{
			$wsqli="insert into tipoproducto(idestatus,nombre) values ('$estatus','$nombre')";
			$result = $linki->query($wsqli);
			if($linki->errno) die($linki->error);
			$_SESSION['mensaje']="<b>Exito!!</b>La categoria: " .$nombre." se registro";
			$_SESSION['tm'] =1; 
		}
	}
	$url="location:../../sistema.php?pag=tipoproducto";
	header($url)
?>
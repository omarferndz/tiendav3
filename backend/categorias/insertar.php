<?php
	session_start();
	if(isset($_POST['estatus']) and (isset($_POST['nombre']))){
		include("../../config/conexi.php");
		$estatus=mysqli_real_escape_string($linki, $_POST['estatus']);
		$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
		$wsqli="select * from categorias where nombre='$nombre'";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$row = $result->fetch_array();
		if ($row>0){
			$_SESSION['mensaje']="<b>Error!!</b>Ya existe esta categoria";
			$_SESSION['tm']=0; //<!-- tipo de mensaje para coloarle un color
		}else{
			$wsqli="insert into categorias(idestatus,nombre) values ('$estatus','$nombre')";
			$result = $linki->query($wsqli);
			if($linki->errno) die($linki->error);
			$_SESSION['mensaje']="<b>Exito!!</b>La categoria: " .$nombre." se registro";
			$_SESSION['tm']=1; 
		}
	}
	$url="location:../../sistema.php?pag=categorias";
	header($url)
?>
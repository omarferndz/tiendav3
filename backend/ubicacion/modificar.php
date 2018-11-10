<?php
	session_start();
	include("../../config/conexi.php");
	if(isset($_POST['estatus']) and (isset($_POST['nombre']))){
		$estatus=mysqli_real_escape_string($linki, $_POST['estatus']);
		$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
		$id=$_POST['id'];
		$wsqli="select * from ubicacion where nombre='$nombre' and idubicacion <> '$id'";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$row = $result->fetch_array();
		if ($row>0){
			$_SESSION['mensaje']="<b>Error!! </b> Ya existe esta ubicacion";
			$_SESSION['tm']=0; //<!-- tipo de mensaje para colocarle un color
		}else{
			$wsqli="UPDATE ubicacion SET idestatus='$estatus', nombre='$nombre' where idubicacion='$id'";
			$result = $linki->query($wsqli);
			if($linki->errno) die($linki->error);
			$_SESSION['mensaje']="<b>Exito!!</b> La ubicacion : " .$nombre." se Modifico";
			$_SESSION['tm']=1; 
		}
	}
	$url="location:../../sistema.php?pag=ubicacion";
	header($url);

?>
<?php
	session_start();
	include("../../config/conexi.php");
	$estatus=mysqli_real_escape_string($linki, $_POST['estatus']);
	$ubicacion=mysqli_real_escape_string($linki, $_POST['ubicacion']);
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
	$apellido=mysqli_real_escape_string($linki, $_POST['apellido']);
	$correo=mysqli_real_escape_string($linki, $_POST['correo']);
	$clave=mysqli_real_escape_string($linki, $_POST['clave']);
	$telefono=mysqli_real_escape_string($linki, $_POST['telefono']);

	$id=$_POST['id'];
	
	$wsqli="SELECT * from usuarios where nombre='$nombre' and idusuario <> '$id'";
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);
	$row = $result->fetch_array();
	if ($row>0){
		$_SESSION['mensaje']="<b>Error!! </b> Ya existe el Tipo de Usuario";
		$_SESSION['tm'] =0; //<!-- tipo de mensaje para colocarle un color
	}else{
		$wsqli="UPDATE usuarios SET idestatus='$estatus',idubicacion='$ubicacion',nombre='$nombre',apellido='$apellido', correo='$correo',clave='$clave',telefonos='$telefono' where idusuario='$id'";
		//echo $wsqli;
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$_SESSION['mensaje']="<b>Exito!!</b>El TIpo de Usuario: " .$nombre." se Modifico";
		$_SESSION['tm'] =1; 
	}
	$url="location:../../sistema.php?pag=usuarios";
	header($url);

?>
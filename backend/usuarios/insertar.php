<?php


	
	session_start(); // linea que permite  crear una seccion, es algo que va ha usar en otra pagina, es una variable glogal
	include("../../config/conexi.php"); //conexion de BD
	$ubicacion=mysqli_real_escape_string($linki, $_POST['ubicacion']);//Traer valores de la BD//mysqli para evitar jaker.
	$nombre=mysqli_real_escape_string($linki, $_POST['nombre']);
    $apellido=mysqli_real_escape_string($linki, $_POST['apellido']);
	$correo=mysqli_real_escape_string($linki, $_POST['correo']);
	$clave=mysqli_real_escape_string($linki, $_POST['clave']);
	$telefono=mysqli_real_escape_string($linki, $_POST['telefono']);
					   
					   
	$estatus= 1;
	$idtipousuario=3;
	$fecharegistro=date('Y/m/d');				   
	



	$wsqli="select * from usuarios where correo='$correo'";// valinod informacio
	$result = $linki->query($wsqli);
	if($linki->errno) die($linki->error);//esto es para 
	$row = $result->fetch_array();
	if ($row>0){
		$_SESSION['mensajenoexiste']="<b>Error!!</b>Ya existe este correo: $correo";
		$_SESSION['tm'] =0; //<!-- tipo de mensaje para coloarle un color
	}else{
		$wsqli="Insert into usuarios(idestatus,idtipousuario,idubicacion,nombre,apellido,correo,clave,telefonos, fecharegistro) values ('$estatus','$idtipousuario','$ubicacion','$nombre','$apellido','$correo','$clave','$telefono','$fecharegistro')";
		$result = $linki->query($wsqli);//
		if($linki->errno) die($linki->error);
		$_SESSION['mensajenoexiste']="<b>Exito!!</b>el usuario  : " .$nombre." se registro";
		$_SESSION['tm'] =1; 
	}
	$url="location:../../index.php";
	header($url) //este devuelve para pagina es bueno quitar para probar y ver los errores. si esta si registra si se coloca

?>
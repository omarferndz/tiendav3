<?php
	session_start();
	include("../../config/conexi.php");
	if(isset($_POST['tipoprod']) and (isset($_POST['categoria']))  and (isset($_POST['marca'])) and (isset($_POST['estatus']))  and (isset($_POST['nombre'])) and (isset($_POST['cantidad'])) and (isset($_POST['precio']))){
		$tipoprod	=mysqli_real_escape_string($linki, $_POST['tipoprod']);
		$categoria	=mysqli_real_escape_string($linki, $_POST['categoria']);
		$marca		=mysqli_real_escape_string($linki, $_POST['marca']);
		$estatus	=mysqli_real_escape_string($linki, $_POST['estatus']);
		$nombre		=mysqli_real_escape_string($linki, $_POST['nombre']);
		$cantidad	=mysqli_real_escape_string($linki, $_POST['cantidad']);
		$precio		=mysqli_real_escape_string($linki, $_POST['precio']);
		$descripcion=mysqli_real_escape_string($linki, $_POST['descripcion']);
		$fecha		=date('Y/m/d');
		$idu		=$_SESSION['idu'];
		$wsqli="select * from productos where nombre='$nombre'";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$row = $result->fetch_array();
		if ($row>0){
			$_SESSION['mensaje']="<b>Error!!</b>Ya existe este producto";
			$_SESSION['tm'] =0; //<!-- tipo de mensaje para coloarle un color
		}else{
			$wsqli="Insert into productos(idtipoproducto,idcategoria,idmarca,idusuario,cantidad,idestatus,nombre,precio,descripcion,fecharegistro) values ('$tipoprod','$categoria','$marca','$idu','$cantidad','$estatus','$nombre','$precio','$descripcion','$fecha')";
			$result = $linki->query($wsqli);
			if($linki->errno) die($linki->error);
			$_SESSION['mensaje']="<b>Exito!!</b>El producto: " .$nombre." se registro";
			$_SESSION['tm'] =1; 
		}
	}
	$url="location:../../sistema.php?pag=productos";
	header($url);
?>
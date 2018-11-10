<?php 
session_start();
if(!isset($_POST['correo']) and (!isset($_POST['clave']))){
	header("location:../index.php");
	
	}else{
	  include("../config/conexi.php");
		$correo=mysqli_real_escape_string($linki,$_POST['correo']);
		$clave=mysqli_real_escape_string($linki,$_POST['clave']);
		if($correo=="" or $clave==""){
			header("location:../index.php");
		}else{
		$wsqli="select * from usuarios where correo='$correo' and clave='$clave'";
		$result = $linki->query($wsqli);
		if($linki->errno) die($linki->error);
		$row = $result->fetch_array();
		if($row>0){
			
			$_SESSION['bienvenido']="<h3><b>Bienvenido (a)</b><br>  ". $row['nombre']." ". $row['apellido']."</h3>";
			$_SESSION['idu']=$row['idusuario'];
			$_SESSION['idt']=$row['idtipousuario'];
			//echo $_SESSION['idt'];
			$url="location:../sistema.php";
			
					
			}else{
				$_SESSION['mensajenoexiste']="<h2>Usuario no existe!!</h2>";
				unset($_SESSION['bienvenido']);
				unset($_SESSION['idu']);
				unset($_SESSION['idt']);
				
				$url="location:../index.php";
						
				}
			header($url);   
	
		}
	}


?>
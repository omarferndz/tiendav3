<?php 
	session_start();
	if(isset($_GET['id'])){
		include("../../config/conexi.php");
		$id=base64_decode($_GET['id']);
		$wsqli="delete from marcas where idmarca='$id'";
		$result=$linki->query($wsqli);
		if($linki->errno){
			$_SESSION['mensaje']="<b>ERROR !! </b> no se puede eliminar porque tiene registros relacionados";
			$_SESSION['tm']=0;
		}else{
			$_SESSION['mensaje']="<b>EXITO !!</b> se elimino satisfactoriamente";
			$_SESSION['tm']=1;
		}
	}
	$url="location:../../sistema.php?pag=marcas";
	header($url);
?>
<?php 
session_start();
include("../../config/conexi.php");
$idp=$_POST["idp"];



	$wsqli="select * from  rproductofoto order by idproductofoto desc limit 1";
	$result=$linki->query($wsqli);
	if($linki->errno) die ($linki->errno);
	$row = $result->fetch_array();
	$idf=$row['idproductofoto']+1;
	$msg=subirfoto($idf);



if($msg!=""){
	$_SESSION['mensaje']="Error no se pudo subir la imagen";
	$_SESSION['tm']=0;
}else{
	
	$wsqli="insert into rproductofoto(idproductofoto,idproducto) values ('$idf','$idp')";
	$linki->query($wsqli);
	
	$_SESSION['mensaje']="La imagen se subion con exito!!";
	$_SESSION['tm']=1;
	
	
}

$idp=base64_encode($idp);
$url="location:../../sistema.php?pag=subirimagen&id=".$idp;
header($url);










function subirfoto($id){
$msg="";	
if($_FILES['foto']['name']!==""){

	$uploadedfileload="true";
	$uploadedfile_size=$_FILES['foto']['size'];// sacando el tamaño en byte de la imagen
	//echo $_FILES['minutae']['type']
	//echo $_FILES['minutae']['size'];
	if ($_FILES['foto']['size']>2000000)
	{
		$msg=$msg."El archivo es mayor que 200KB, debes reduzcirlo antes de subirlo";
		$uploadedfileload="false";
	}
		if (!($_FILES['foto']['type']=="image/jpeg"))
	{		
			$msg=$msg." Tu archivo tiene que ser JPG. Otros archivos no son permitidos";
			$uploadedfileload="false";
	}	
	$file_name="f".$id.".jpg";
	$ruta="../../img/imgpro/$file_name";
	if($uploadedfileload=="true"){
		if(move_uploaded_file ($_FILES['foto']['tmp_name'],$ruta)){
			$img=imagecreatefromjpeg($ruta);
			$imagen=imagecreatetruecolor(100,100);
			imagecopyresized($imagen,$img,0,0,0,0,100,100,ImageSX($img),ImageSY($img));
			$file_name="f".$id."p.jpg";
			$ruta="../../img/imgpro/$file_name";
			imagejpeg($imagen,$ruta);
		}else{
			$msg="ERROR";
			}
		}else{
			$msg="ERROR";
		}
	}
	return $msg;
}	

?>
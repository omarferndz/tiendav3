<?php 
function urls_amigables($url) {
	// Tranformamos todo a minusculas
	$url = strtolower($url);
	//Rememplazamos caracteres especiales latinos
	$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
	$repl = array('a', 'e', 'i', 'o', 'u', 'n');
	$url = str_replace ($find, $repl, $url);
	// Añaadimos los guiones
	$find = array(' ', '&', '\r\n', '\n', '+'); 
	$url = str_replace ($find, '-', $url);
	// Eliminamos y Reemplazamos demás caracteres especiales
	$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
	$repl = array('', '-', '');
	$url = preg_replace ($find, $repl, $url);
	return $url;
}

function encrypt($string, $key) {
   $result = '';
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)+ord($keychar));
      $result.=$char;
   }
   return base64_encode($result);
}
function decrypt($string, $key) {
   $result = '';
   $string = base64_decode($string);
   for($i=0; $i<strlen($string); $i++) {
      $char = substr($string, $i, 1);
      $keychar = substr($key, ($i % strlen($key))-1, 1);
      $char = chr(ord($char)-ord($keychar));
      $result.=$char;
   }
   return $result;
}

// Calcula la edad (formato: año/mes/dia)
function calcular_edad($fecha){
    $dias = explode("/", $fecha, 3);
    @$dias =  mktime(0,0,0,$dias[1],$dias[0],$dias[2]);
    $edad = (int)((time()-$dias)/31556926 );
    return $edad;
}
// cortar texto
function cut_string($string, $charlimit)
{
	if(substr($string,$charlimit-1,1) != ' ')
	{
	$string = substr($string,'0',$charlimit);
	$array = explode(' ',$string);
	array_pop($array);
	$new_string = implode(' ',$array);
	
	return $new_string.' ...';
	}
	else
	{ 
	return substr($string,'0',$charlimit-1).' ...';
	}
}

function dias_transcurridos($fecha_i,$fecha_f)
{
	$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
	$dias 	= abs($dias); $dias = floor($dias);		
	return $dias;
}

function Cfecha($fec)	{		
return implode("/", array_reverse(explode("/", $fec)));
		return $fecha;	}
function Cfecha2($fec)	{		
return implode("-", array_reverse(explode("-", $fec)));
		return $fecha;	}
function Cfecha3($fec)	{		
return implode("/", array_reverse(explode("-", $fec)));
		return $fecha;	}
function Cfecha4($fec)	{		
return implode("-",array_reverse(explode("/",$fec)));

		return $fecha;	
}
		
function antiinjection($str) {
	$str = trim($str);
	$str = stripslashes($str);
	$str = strip_tags($str);
	$str=  addslashes($str);
return $str;
} 
//
//$idc=$row['idc'];
//$amigable = urls_amigables($row['nombre'])."-".$idc;
//$vinculo="index.php?categoria=".$amigable;
//
			/*if(isset($_GET['categoria'])){
				$categoria=$_GET['categoria'];
				$vcategoria=explode("-",$categoria);
				$idc=$vcategoria[count($vcategoria)-1];
				$idc = mysqli_real_escape_string($linki,$idc);
				$filtro="where idcategoria='$idc'";
			}
*/
//'OR 1=1 -- '
//$correo = mysqli_real_escape_string($linki,$correo);
//$clave = mysqli_real_escape_string($linki,$clave);




?>
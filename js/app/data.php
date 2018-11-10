<?php
/* Inicializamos la sesión y le añadimos 'data' en caso que no lo tenga ya */
session_start();
if ( !isset($_SESSION['data']) ) $_SESSION['data']=array();
 
/* Leemos los parámetros enviados por post */
$post = json_decode(file_get_contents('php://input'), true);
 
/* Si de los parámetros enviados encontramos 'nombre' añadimos el registro a la sesión */
if ( isset( $post["nombre"] ) ) {
    array_push( $_SESSION['data'], array( "nombre"=>$post["nombre"], "telefono"=>$post["telefono"] ) );
    }
 
/* Devolvemos el listado de datos de la sesión. */
echo json_encode( $_SESSION['data'] );
?>
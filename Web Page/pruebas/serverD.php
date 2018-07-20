<?php
 
// Incorporar la biblioteca nusoap al script, incluyendo nusoap.php (ver imagen de estructura de archivos)
require_once('nusoap/nusoap.php');
// Modificar la siguiente linea con la direccion en la cual se aloja este script
$miURL = 'http://webtecnologia.tk';
$server = new soap_server();
$server->configureWSDL('ws_MAPA', $miURL);
$server->wsdl->schemaTargetNamespace=$miURL;


/*
 * Ejemplo 1: IntroducirDB es una funcion sencilla que recibe un parametro y retorna el mismo
 * con un string anexado
 */
$server->register('ECHOO', // Nombre de la funcion
 array(), // Parametros de entrada
	   
 array('return' => 'xsd:string'), // Parametros de salida
 $miURL);

 function ECHOO(){
return new soapval('return', 'xsd:string', 'Hola');
}


if ( !isset( $HTTP_RAW_POST_DATA ) )
    $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );

$server->service($HTTP_RAW_POST_DATA);
?>
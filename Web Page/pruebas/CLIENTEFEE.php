<?php 
//----------------------SOAP-------------------------------------
// Incluimos la biblioteca de NuSOAP (la misma que hemos incluido en el servidor, ver la ruta que le especificamos)
require_once('nusoap/nusoap.php');
// Crear un cliente apuntando al script del servidor (Creado con WSDL) - 
// Las proximas 3 lineas son de configuracion, y debemos asignarlas a nuestros parametros
$serverURL = 'http://webtecnologia.tk';
$serverScript = 'server.php';
$metodoALlamar = 'getRespuesta';

// Crear un cliente de NuSOAP para el WebService
$cliente = new nusoap_client("$serverURL/$serverScript?wsdl", 'wsdl');
// Se pudo conectar?
$error = $cliente->getError();
if ($error) {
 echo '<pre style="color: red">' . $error  . '</pre>';
 echo '<p style="color:red;'>htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</p>';
 die();
}

// 1. Llamar a la funcion getRespuesta del servidor

$resultado = $cliente->call(
 "IntroducirDB", // Funcion a llamar
 array('pr','re','100','dn','192.0','re','dgt'), // Parametros pasados a la funcion
 "uri:$serverURL/$serverScript", // namespace
 "uri:$serverURL/$serverScript/IntroducirDB" // SOAPAction
);

$rest = $cliente->call(
 "DB_COUNT", // Funcion a llamar
 array(), // Parametros pasados a la funcion
 "uri:$serverURL/$serverScript", // namespace
 "uri:$serverURL/$serverScript/DB_COUNT" // SOAPAction
);

$resto = $cliente->call(
 "DB_SELECT", // Funcion a llamar
 array(), // Parametros pasados a la funcion
 "uri:$serverURL/$serverScript", // namespace
 "uri:$serverURL/$serverScript/DB_SELECT" // SOAPAction
);

echo $resultado;	
echo '<br>';
echo $resto;	
	
// Verificacion que los parametros estan ok, y si lo estan. mostrar rta.
if ($cliente->fault) {
 echo '<b>Error: ';
 print_r($resultado);
 echo '</b>';
} else {
 $error = $cliente->getError();
 if ($error) {
 echo 'document.write("<b style="color: red">Error: ' . $error . '</b>");';
 }
}
if ($cliente->fault) {
 echo '<b>Error: ';
 print_r($rest);
 echo '</b>';
} else {
 $error = $cliente->getError();
 if ($error) {
 echo 'document.write("<b style="color: red">Error: ' . $error . '</b>");';
 }
}
//---------------------------------------------------------------
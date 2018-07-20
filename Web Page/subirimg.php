<html>
<head>
<title>
Subir imagen
</title>
</head>
<body>
<?php
// Incluimos la biblioteca de NuSOAP (la misma que hemos incluido en el servidor, ver la ruta que le especificamos)
require_once('plugins/nusoap/nusoap.php');
// Crear un cliente apuntando al script del servidor (Creado con WSDL) - 
// Las proximas 3 lineas son de configuracion, y debemos asignarlas a nuestros parametros
$serverURL = 'http://webtecnologia.tk';
$serverScript = 'server.php';
$metodoALlamar = 'IntroducirDB';

// Crear un cliente de NuSOAP para el WebService
$cliente = new nusoap_client("$serverURL/$serverScript?wsdl", "wsdl");
// Se pudo conectar?
$error = $cliente->getError();
if ($error) {
 echo '<pre style="color: red">' . $error  . '</pre>';
 echo '<p style="color:red;>'.htmlspecialchars($cliente->getDebug(), ENT_QUOTES).'</p>';
 die();
}

//Main program-----------------------------------------------------------------------------------------------
$lat="";
$lon="";
$a="";
$b="";
$c="";
$d="";

$nom=$_FILES['foto']['name'];	
if (isset($_GET['lat'])){
$lat=$_GET['lat'];
$a = str_replace(",", ".", $lat);
echo "La Latitud es: ".$a."<br>";
}
if (isset($_GET['lon'])){
$lon=$_GET['lon'];
$b = str_replace(",", ".", $lon);
echo "La Longitud es: ".$b."<br>";
}
if (isset($_GET['i'])){
$c=$_GET['i'];
echo "La intensidad es: ".$c."%<br>";
}
if (isset($_GET['dn'])){
$d=$_GET['dn'];
echo "El Desastre Natural es: ".$d."<br>";
}
if (isset($_GET['ip'])){
$ip=$_GET['ip'];
}

if (isset($_GET['t'])){
$t=$_GET['t'];
}

if (isset($_GET['lat'])&& isset($_GET['lon']) && isset($_GET['dn']) && isset($_GET['i'])){

$result = $cliente->call(
 "$metodoALlamar", // Funcion a llamar
 array($b,$a,$c,$d,$ip,$t,$nom), // Parametros pasados a la funcion
 "uri:$serverURL/$serverScript", // namespace
 "uri:$serverURL/$serverScript/$metodoALlamar" // SOAPAction
);

$resultante = $cliente->call(
 "RegistrarFoto", // Funcion a llamar
 array($_FILES['foto']['tmp_name'],$_FILES['foto']['name']), // Parametros pasados a la funcion
 "uri:$serverURL/$serverScript", // namespace
 "uri:$serverURL/$serverScript/RegistrarFoto" // SOAPAction
);

}

//End of main program--------------------------------------------------------------------------------------------

// Verificacion que los parametros estan ok, y si lo estan. mostrar rta.
//Function Foto
if ($cliente->fault) {
 echo '<b>Error: ';
 print_r($resultante);
 echo '</b>';
} else {
 $error = $cliente->getError();
 if ($error) {
 echo '<b style="color: red">Error: ' . $error . '</b>';
 }else{
 echo "<img src='imagenes/$nom' height='200' width='200'><br>";
 echo $resultante."<br>";
 }
}
die();
?>
</body>
</html>
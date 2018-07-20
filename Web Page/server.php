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
$server->register('DB_SELECTE', // Nombre de la funcion
 array(), // Parametros de entrada
	   
 array('return' => 'xsd:string'), // Parametros de salida
 $miURL);

$server->register('IntroducirDB', // Nombre de la funcion
 array('b' => 'xsd:string',
	   'a' => 'xsd:string',
	   'c' => 'xsd:string',
	   'd' => 'xsd:string',
	   'id' => 'xsd:string',
	   't' => 'xsd:string',
	   'nom' => 'xsd:string'), // Parametros de entrada
	   
 array('return' => 'xsd:string'), // Parametros de salida
 $miURL);
 
 $server->register('DB_COUNT', // Nombre de la funcion
 array(), // Parametros de entrada
	   
 array('return' => 'xsd:string'), // Parametros de salida
 $miURL);
 
 $server->register('RegistrarFoto', // Nombre de la funcion
 array('nomF' => 'xsd:string',
	   'nomEE' => 'xsd:string'), // Parametros de entrada   
 array('return' => 'xsd:string'), // Parametros de salida
 $miURL);
 
function IntroducirDB($b,$a,$c,$d,$ip,$t,$nom){
//Register to DB
	$img="imagenes/".$nom;
	$conexion=mysql_connect("localhost","adm_89","grmx1998");
	mysql_select_db("adm_89",$conexion);
	mysql_query("insert into Tabla(Longitud,Latitud,Intensidad,DesastreNatural,IP,Tiempo,LocalizacionIMG) values 
	   ('$b','$a','$c','$d','$ip','$t','$img')", 
	   $conexion);
	mysql_close($conexion);



 return new soapval('return', 'xsd:string', "<b style='color:green'>Se han registrado todos los par&aacute;metros en la BD</b>");
}

function RegistrarFoto($nomF,$nomEE){
$nomE="imagenes/".$nomEE;
copy($nomF,$nomE);
	include('SimpleImage.php');
	$image = new SimpleImage();	
	$image->load($nomE);
	$image->resize(200,200);
	$trozos = explode(".", $nomE);
	$extencion = end($trozos); 
	$ext=".".$extencion;
	$rest = str_replace($ext, "", $nomE);
	$image->save($rest.'mini'.$ext);

return new soapval('return', 'xsd:string', "<b style='color:green'>Se ha registrado la Fotograf&iacute;a en la BD</b>");
}

function DB_COUNT(){
$conexion=mysql_connect("localhost","adm_89","grmx1998") or 
  die("Problemas en la conexion");
mysql_select_db("adm_89",$conexion) or
  die("Problemas en la selección de la base de datos");
$registross=mysql_query("select count(*) as cantidad from Tabla",$conexion) or
  die("Problemas en el select:".mysql_error());
$regg=mysql_fetch_array($registross); 
$ro=$regg['cantidad'];
return new soapval('return', 'xsd:string', $ro);
}

function DB_SELECTE(){
$conexion=mysql_connect("localhost","adm_89","grmx1998") or 
  die("Problemas en la conexion");
mysql_select_db("adm_89",$conexion) or
  die("Problemas en la selección de la base de datos");
  
$registros2=mysql_query("select Longitud,Latitud,DesastreNatural,Intensidad,IP,Tiempo,LocalizacionIMG from Tabla",$conexion) or
  die("Problemas en el select:".mysql_error());  

$lo="";
$la="";
$dn="";
$in="";
$ip="";
$tm="";
$li="";  
  

for($i=1;$i<=$fila=mysql_fetch_row($registros2);$i++){
$lo=$fila[0].";".$lo;
$la=$fila[1].";".$la;
$dn=$fila[2].";".$dn;
$in=$fila[3].";".$in;
$ip=$fila[4].";".$ip;
$tm=$fila[5].";".$tm;
$li=$fila[6].";".$li;
}


$d="LO: ".$lo."^LA: ".$la."^DN: ".$dn."^IN: ".$in."^LI: ".$li."^IP: ".$ip."^TM: ".$tm;
return new soapval('return', 'xsd:string', $d);
}

if ( !isset( $HTTP_RAW_POST_DATA ) )
    $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );

$server->service($HTTP_RAW_POST_DATA);
?>
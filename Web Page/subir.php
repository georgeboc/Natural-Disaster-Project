<html>
<head>
<title>
Subir imagen
</title>
</head>
<body>
<?php
if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip=$_SERVER['REMOTE_ADDR'];
}
if (isset($_GET['lat'])){
$a=$_GET['lat'];
if ($a==0.0){
$a=41.406217;
}
echo "La Latitud es: ".$a."<br>";
}
if (isset($_GET['lon'])){
$b=$_GET['lon'];
if ($b==0.0){
$b=2.132694;
}
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
if (isset($_GET['dimg'])){
$e=$_GET['dimg'];
echo "La Direcci&oacute;n de la imagen es: ".$e."<br>";
}

$hoy = date("F j, Y, g:i a");  


echo'<form action="subirimg.php?lon='.$a.'&lat='.$b.'&i='.$c.'&dn='.$d.'&ip='.$ip.'&t='.$hoy.'" method="post" enctype="multipart/form-data">
<input type="file" name="foto"/>
<br>
<input type="submit" value="Enviar">';
?>
</form>
  <?php
  die();
  ?>
</body>
</html>
<?php
echo 'DB';
$b="HOla";
$a="er";
$c="100";
$d="vfd";
$ip="192.168.1.4";
$t="ui";
$img="hu";
$conexion=mysql_connect("localhost","adm_89","grmx1998");
mysql_select_db("adm_89",$conexion);
mysql_query("insert into Tabla(Longitud,Latitud,Intensidad,DesastreNatural,IP,Tiempo,LocalizacionIMG) values 
   ('$b','$a','$c','$d','$ip','$t','$img')", 
   $conexion);
mysql_close($conexion);
echo 'funciona';
?>
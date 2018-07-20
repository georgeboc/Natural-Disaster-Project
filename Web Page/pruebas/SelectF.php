<?php
$lo=0;
$la=0;
$dn=0;
$in=0;
$ip=0;
$tm=0;
$li=0;

echo'<h1><u>Prueba PHP</u></h1>';
$conexion=mysql_connect("localhost","adm_89","grmx1998");
mysql_select_db("adm_89",$conexion);
  
$registros2=mysql_query("select Longitud,Latitud,DesastreNatural,Intensidad,IP,Tiempo,LocalizacionIMG from tabla",$conexion);
  
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
echo $d;
?>
<!DOCTYPE html>
<html>
<head>
<title>
NDMap
</title>
<link rel="shortcut icon" href="/favicon.ico" />
<style>
html { height: 100% ;}
body { height: 100%; margin: 0; padding: 0 ;}
#map-canvas {height: 100%; width:100%; z-index:0;}
a:hover{text-decoration: none; color:black;}
a:active{text-decoration: none; color:black;}
a:visited{text-decoration: none; color:black;}
a:link{text-decoration: none; color:black;}

#op1 {background-color: #272727; color: white;}
#op1:target {background-color: white; color:#272727;}
#op1:hover {background-color: #515151; color:white;}
#op1:target {background-color: white; color:#272727;}

#op2 {background-color: #272727; color: white;}
#op2:hover {background-color: #515151; color:white;}

#op3 {background-color: #272727; color: white;}
#op3:target {background-color: white; color:#272727;}
#op3:hover {background-color: #515151; color:white;}
#op3:target {background-color: white; color:#272727;}

#texto {text-align:justify}

#titlein {font-family:"Arial"; font-size:14px; font-weight:bold;}

#activo:hover {background-color: #D9D9D9; color:black; left:0px;}
#activo {font-family:"Calibri"; font-size:16px;}
#inactivo:hover {background-color: #D9D9D9; color:black;}
#inactivo {font-family:"Calibri"; font-size:16px;}

#activado:hover {background-color: #D9D9D9; color:black; left:0px;}
#activado {font-family:"Calibri"; font-size:16px;}
#desactivado:hover {background-color: #D9D9D9; color:black;}
#desactivado {font-family:"Calibri"; font-size:16px;}

</style>
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKBvp96pjqaHys_at5Uv0R7jbDAKIX7Xo&sensor=true">
</script>
    <script>
      function initialize() {
	  var myLatlng = new google.maps.LatLng(41.6175899, 0.6200145999999904);
	  var myLatlng1 = new google.maps.LatLng(40, 0);
        var mapOptions = {
          center: new google.maps.LatLng(41.6175899, 0.6200145999999904),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);

			 
<?php 
//----------------------SOAP-------------------------------------
// Incluimos la biblioteca de NuSOAP (la misma que hemos incluido en el servidor, ver la ruta que le especificamos)
require_once('nusoap/nusoap.php');
// Crear un cliente apuntando al script del servidor (Creado con WSDL) - 
// Las proximas 3 lineas son de configuracion, y debemos asignarlas a nuestros parametros
$serverURL = 'http://webtecnologia.tuars.com/';
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
$result = $cliente->call(
 "DB_COUNT", // Funcion a llamar
 array(), // Parametros pasados a la funcion
 "uri:$serverURL/$serverScript", // namespace
 "uri:$serverURL/$serverScript/DB_COUNT" // SOAPAction
);

$resultado = $cliente->call(
 "Select", // Funcion a llamar
 array(), // Parametros pasados a la funcion
 "uri:$serverURL/$serverScript", // namespace
 "uri:$serverURL/$serverScript/Select" // SOAPAction
);

		$LO = explode("LO: ", $resultado);
	$LO1 = end($LO); 
	$lon = explode("^", $LO1);
	$extenci = current($lon);
	for($i=0;$i<$result;$i++){
	$lon = explode(";", $LO1);
	}
		$LA = explode("LA: ", $resultado);
	$LA1 = end($LA); 
	$lat = explode("^", $LA1);
	$extenci = current($lat);
	for($i=0;$i<$result;$i++){
	$lat = explode(";", $LA1);
	}
	
		$DN = explode("DN: ", $resultado);
	$DN1 = end($DN); 
	$dn = explode("^", $DN1);
	$extenci = current($dn);
	for($i=0;$i<$result;$i++){
	$dn = explode(";", $DN1);
	}
		
		$IN = explode("IN: ", $resultado);
	$IN1 = end($IN); 
	$in = explode("^", $IN1);
	$extenci = current($in);
	for($i=0;$i<$result;$i++){
	$in = explode(";", $IN1);
	}
	
		$LI = explode("LI: ", $resultado);
	$LI1 = end($LI); 
	$LI2 = explode("^", $LI1);
	$extenci = current($LI2);
	for($i=0;$i<$result;$i++){
	$LI2 = explode(";", $LI1);
	}
		
		$IPK = explode("IP: ", $resultado);
	$IP1 = end($IPK); 
	$IP = explode("^", $IP1);
	$extenci = current($IP);
	for($i=0;$i<$result;$i++){
	$IP = explode(";", $IP1);
	}
	
		$TM = explode("TM: ", $resultado);
	$TM1 = end($TM); 
	$t = explode("^", $TM1);
	$extenci = current($t);
	for($i=0;$i<$result;$i++){
	$t = explode(";", $TM1);
	}
	
	
// Verificacion que los parametros estan ok, y si lo estan. mostrar rta.
if ($cliente->fault) {
 echo '<b>Error: ';
 print_r($result);
 echo '</b>';
} else {
 $error = $cliente->getError();
 if ($error) {
 echo 'document.write("<b style="color: red">Error: ' . $error . '</b>");';
 }
}
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
//---------------------------------------------------------------

echo"
var contentString = '<div id=\"content\">'+
'<div id=\"siteNotice\">'+
    '</div>'+
    '<h2 id=\"firstHeading\" class=\"firstHeading\">Uluru</h2>'+
    '</div>';";

for($i=0;$i<$result;$i++){

if ($LI2[$i]!=""){
	$trozos = explode(".", $LI2[$i]);
	$extencion = end($trozos); 
	$ext=".".$extencion;
	$rest = str_replace($ext, "", $LI2[$i]);
	$mini=$rest.'mini'.$ext;	
echo"
var image = new google.maps.MarkerImage('".$mini."',new google.maps.Size(200, 200));
var myLatlng = new google.maps.LatLng(".$lon[$i].", ".$lat[$i].");
var marker = new google.maps.Marker({position: myLatlng, map: map, title:'".$dn[$i]."', icon: image});";
}else{
echo"
var myLatlng = new google.maps.LatLng(".$lon[$i].", ".$lat[$i].");
var marker = new google.maps.Marker({position: myLatlng, map: map, title:'".$dn[$i]."'});";
}
}
?>


				  
		google.maps.event.addListener(beachMarker6, 'click', function() {
		  infowindow.open(map,beachMarker6);
		}); 
		 	
	  }
      	  
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<link rel="stylesheet" type="text/css" media="all" href="barralateral/jScrollPane.css" />
	<script type="text/javascript" src="barralateral/jquery.min.js"></script>
	<script type="text/javascript" src="barralateral/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="barralateral/jScrollPane.js"></script>
	<script type="text/javascript"><!--
	$(function()
	{
		$('#pane1').jScrollPane({showArrows:true,scrollbarWidth:10, scrollbarMargin:20});

		$(".jScrollPaneTrack").hide();
		
		$("#map").hover(function(){
			$(".jScrollPaneTrack").fadeIn();
		}); 
		
		$("#map").mouseleave(function(){
			$(".jScrollPaneTrack").fadeOut();
		}); 
		$("#democlick-1").hide();
$("#panelref").hide();
$('#tabla').hide();
//$('#map-canvas').hide();
$("#tabla").hover(function(){
	$("#tabla").animate({left:'0%'});
 });
$("#tabla").mouseleave(function(){
	$("#panelref").hide();
	$("#tabla").animate({left:'-49.75%'});
});
var zmap=0;
  <?php 
if (isset($_GET['map'])){
$map=$_GET['map'];
if ($map=="true"){
echo "$('#div').hide();
		$('#menu').hide();	
		$('#content').hide();
		$('#content1').hide();
		$('#content2').hide();
		$('#tabla').show();
		map='on';
		setInterval(refrescar(),1000);
		zmap=1;";
}
if($map=="false"){
echo"zmap=0;";
}
}
?>

function refrescar(){
if(map=="on"){
//setTimeout(function(){$(location).attr('href','http://webtecnologia.tuars.com/menu11.php?map=true')},1000);
}
}
if(zmap!=1){
setTimeout(function(){
$("#div").animate({
      height:'0',
    });
},2000);}

setTimeout(function(){
$("#divi").animate({
      opacity:'0'
    });
},1998);
setTimeout(function(){
$("#divi").hide();
},2001);

function mapaon(){
$('#tabla').show();
$('#map-canvas').show();
$("#menu").animate({
      left:'-20%'
    });
$("#content").animate({
      opacity:'0'
    });	
$("#content1").animate({
      opacity:'0'
    });	
$("#content2").animate({
      opacity:'0'
    });	
setTimeout(function(){	
$("#menu").hide();	
$("#content").hide();
$("#content1").hide();
$("#content2").hide();
},400);
}  
	$("#texto").animate({
      opacity:'0'
    });	
	setTimeout(function(){
	$("#texto").load("info8.txt");
	$("#texto").animate({
      opacity:'1'
    });	
     },1000);
var op="#op1";	
var map="off"; 
$("#op1").click(function(){
    map="off"; 
	refrescar();
	if(op!="#op1"){
	$("#texto").animate({
      opacity:'0'
    });	
	setTimeout(function(){
	$("#texto").load("info8.txt");
	$("#texto").animate({
      opacity:'1'
    });	
     },1000);
	 op="#op1";
	} 
  });
$("#op2").click(function(){
	zmap=1;
	map="on";
	mapaon();
	setInterval(refrescar(),1000);
  });    
$("#op3").click(function(){
map="off"; 
refrescar();
if(op!="#op3"){
    $("#texto").animate({
      opacity:'0'
    });	
	setTimeout(function(){
    $("#texto").load("about_us5.txt");
	$("#texto").animate({
      opacity:'1'
    });	
     },1000);
	 op="#op3";
	 }
  });



$("#goback").click(function(){
	map="off"; 
	refrescar();
	$("#menu").show();	
	$("#content").show();
	$("#content1").show();
	$("#content2").show();
	$("#menu").animate({
      left:'0%'
    });
    $("#content").animate({
      opacity:'1'
    });
	$("#content1").animate({
      opacity:'1'
    });
	$("#content2").animate({
      opacity:'1'
    });
	$(location).attr('href',op);
	$('#tabla').hide();
	//$('#map-canvas').hide();	
	zmap=0;
  }); 
  
  $("#refresh").click(function(){
	setTimeout(function(){
	$("#panelref").show();},2);
  });
  $("#panelref").hover(function(){
	var src = $("#refresh").attr("src").replace("refresco.png", "refrescoI.png");
    $("#refresh").attr("src", src);
	});
  $("#panelref").mouseleave(function(){
	var src = $("#refresh").attr("src").replace("refrescoI.png", "refresco.png");
    $("#refresh").attr("src", src);
	setTimeout(function(){
	$("#panelref").hide();},2);
	});

	

	
function actualizar(v){
var link="http://webtecnologia.tuars.com/menu.php?map=true";


setTimeout(function(){

link=link+"&estado="+v;
$(location).attr('href',link);


},20000);
}	

	
//panel	
var state=1;

<?php 
if (isset($_GET['estado'])){
$estado=$_GET['estado'];
if ($estado=="1"){
echo "state=1;";
echo "modify();";
}elseif ($estado=="0"){
echo "state=0;";
echo "modify();";
}
}
?>

function modify(){
if(state==1){

var lnk1="http://webtecnologia.tuars.com/menu.php?map=true&estado=1"

var pathname = $(location).attr('href');

if(pathname!=lnk1){
if(zmap==1){
$(location).attr('href',lnk1);
}
}
if(zmap==1){
actualizar(state);
}
$("#activado").css("color","white");
$("#activado").css("background-color","#272727");
$("#desactivado").css("color","black");
$("#desactivado").css("background-color","");

$("#activo").css("color","white");
$("#activo").css("background-color","#272727");
$("#inactivo").css("color","black");
$("#inactivo").css("background-color","");

$("#desactivado").hover(function(){
  $(this).css("color","black");
  $(this).css("background-color","#D9D9D9");
  $("#inactivo").css("background-color","#D9D9D9");
  
  },function(){
  $(this).css("color","black");
  $(this).css("background-color","");
  $("#inactivo").css("background-color","");
  } 
  );

$("#activado").hover(function(){
  $(this).css("color","white");
  $(this).css("background-color","#272727");
  $("#activo").css("background-color","#272727");
  
  },function(){
  
  $(this).css("color","white");
  $(this).css("background-color","#272727");
  $("#activo").css("background-color","#272727");
  } 
  );
  
//Base

$("#inactivo").hover(function(){
  $("#desactivado").css("color","black");
  $("#desactivado").css("background-color","#D9D9D9");
  $("#inactivo").css("background-color","#D9D9D9");
  
  },function(){
  
  $("#desactivado").css("color","black");
  $("#desactivado").css("background-color","");
  $("#inactivo").css("background-color","");
  } 
  );

$("#activo").hover(function(){
  $("#activado").css("color","white");
  $("#activado").css("background-color","#272727");
  $("#activo").css("background-color","#272727");
  
  },function(){
  
  $("#activado").css("color","white");
  $("#activado").css("background-color","#272727");
  $("#activo").css("background-color","#272727");
  } 
  );  
}
if(state==0){

var lnk="http://webtecnologia.tuars.com/menu.php?map=true&estado=0"

var pathname = $(location).attr('href');

if(pathname!=lnk){
if(zmap==1){
$(location).attr('href',lnk);
}
}

$("#desactivado").css("color","white");
$("#desactivado").css("background-color","#272727");
$("#activado").css("color","black");
$("#activado").css("background-color","");

$("#activo").css("color","black");
$("#activo").css("background-color","");
$("#inactivo").css("color","white");
$("#inactivo").css("background-color","#272727");

$("#desactivado").hover(function(){
  $(this).css("color","white");
  $(this).css("background-color","#272727");
  $("#inactivo").css("background-color","#272727");
  
  },function(){
  
  $(this).css("color","white");
  $(this).css("background-color","#272727");
  $("#inactivo").css("background-color","#272727");
  } 
  );

$("#activado").hover(function(){
  $(this).css("color","black");
  $(this).css("background-color","#D9D9D9");
  $("#activo").css("background-color","#D9D9D9");
  
  },function(){
  
  $(this).css("color","black");
  $(this).css("background-color","");
  $("#activo").css("background-color","");
  } 
  );
  
//Base  
  
$("#inactivo").hover(function(){
  $("#desactivado").css("color","white");
  $("#desactivado").css("background-color","#272727");
  $("#inactivo").css("background-color","#272727");
  
  },function(){
  
  $("#desactivado").css("color","white");
  $("#desactivado").css("background-color","#272727");
  $("#inactivo").css("background-color","#272727");
  } 
  );

$("#activo").hover(function(){
  $("#activado").css("color","black");
  $("#activado").css("background-color","#D9D9D9");
  $("#activo").css("background-color","#D9D9D9");
  
  },function(){
  
  $("#activado").css("color","black");
  $("#activado").css("background-color","");
  $("#activo").css("background-color","");
  } 
  );  

}
}
  $("#activo").click(function(){
	state=1;
	modify();
  });
  $("#inactivo").click(function(){
    document.write();
	state=0;
	modify();
  });
	
});

</script>
</head>
<body>
<!--Parte 1-->
<div id="div" style="z-index:3; width:100%; height:100%; background-color:#0040FF; position:absolute; left:0%; top:0%; color:black; text-align:center; color:white; font-family:'Arial'; font-size:23px;">
<table border="0px" style="width:100%; height:100%; position:absolute">
<tr>
<td>
<div id="divi">
<b>NDMap</b>
</div>
</td>
</tr>
</table>
</div>
<div id="menu" style="z-index:2; background-color:#272727; color:white; width:20%; height:100%; position:absolute; left:0%; top:0%;">
<table border="0" style="width:106%;position:absolute; left:-3%;" cellpadding="5">
<tr>
<td style="text-align:center; font-family:'Arial'; font-size:18px;">
<b> NDMap</b>
</td>
</tr>

<tr cellpadding="0">
<td style="font-family:'Arial'; font-size:16px;">
<b>
<a href="#op1">
<div id="op1" style="position:relative; left:0%; width:101%; text-align:left">
<div id="o1" style=" position:relative; left:6%; text-align:left">
Informaci&oacute;n
</div>
</div>
</a>
<a href="#op2">
<div id="op2" style="position:relative; left:0%; width:101%; text-align:left">
<div id="o2" style=" position:relative; left:6%; text-align:left">
Mapa
</div>
</div>
</a>
<a href="#op3">
<div id="op3" style="position:relative; left:0%; width:101%; text-align:left">
<div id="o3" style=" position:relative; left:6%; text-align:left">
About us
</div>
</div>
</a>
</b>
</td>
</tr>
</table>
</div>
<!--Parte 2.1-->
<div id="content" style="background-color:white; z-index:2; width:3%; height:100%; position:absolute; left:20%; top:0%;"></div>
<div id="content1" style="background-color:white; z-index:2; width:77%; height:100%; position:absolute; left:22%; top:0%;"><div id="texto" style="background-color:white;"></div>

</div>
<div id="content2" style="background-color:white; z-index:2; width:1%; height:100%; position:absolute; left:99%; top:0%;"></div>
<!--Parte 3-->
	<script>
	var ventana_alt = $(window).height();
	var alt= '<table id="tabla" cellspacing="0" cellpadding="0" style="z-index:1; background-color: white; border: solid 5px #06AEFB; width:50%; height:'+ventana_alt+'px; position:absolute; left:-49.75%; top:0%;" >';
	document.write(alt);
	setInterval(function(){ 
		var ventana_alt = $(window).height();
		$("#tabla").css("height",ventana_alt);
		$("#tabla").css("width","50%");
		ag=ventana_alt;
		$("#pane1").css("height",ag);
		$("#pane1").css("width","100%");
	},100);
	$("#pane1").addClass("scroll-panel");
	</script>
  
  <tbody>
	<tr>
	<td style="height:3%; background-color: #06AEFB; color: white; border: #06AEFB;">
	<img id="goback" src="/iconos/flecha.png" onmouseover="this.src='/iconos/flechaI.png';" onclick="this.src='/iconos/flechaII.png';" onmouseout="this.src='/iconos/flecha.png';" height="20" width="20" style="position:absolute; top:0%;"/>
	<center>
	<b>
	Informaci&oacute;n
	</b>
	</center>
	<img id="calendar" src="/iconos/Calendario.png" onmouseover="this.src='/iconos/CalendarioI.png';" onclick="this.src='/iconos/CalendarioII.png';" onmouseout="this.src='/iconos/Calendario.png';" height="20" width="20" style="position:absolute; left:92%; top:0%;"/>
	<img id="refresh" src="/iconos/refresco.png" onmouseover="this.src='/iconos/refrescI.png';" onclick="this.src='/iconos/refrescoI.png';" onmouseout="this.src='/iconos/refresco.png';" height="20" width="20" style="position:absolute; left:96%; top:0%;"/>
	<div id="panelref" style="z-index:6; position:absolute; left:96%; top:17px; width:175px; height:125px; ">
	<div style="background-color:#FEFEFE; height:1px;">a</div>
	<div style="background-color:#FDFDFD; height:1px;">a</div>
	<div style="background-color:#FCFCFC; height:1px;">a</div>
	<div style="background-color:#FBFBFB; height:1px;">a</div>
	<div style="background-color:#FAFAFA; height:75%; color:black;">
	<table>
	<tr>
	<td>
	<div style="position:relative; left:5%;"/>
	<span id="titlein">Refresco autom&aacute;tico</span><br><div style="position:relative; top:1%;"/>
	</td>
	</tr>
	<tr>
	<td>
	<div id="activo" style="position:relative; width:163px;"><div id="activado" style="position:relative; left:5%;"/>Activado</div>
	</td>
	</tr>
	<tr>
	<td>
	<div id="inactivo" style="position:relative; width:163px;"><div id="desactivado" style="position:relative; left:5%;"/>Desactivado</div>
	</td>
	</tr>
	</table>
	</div>
	</div>
	</td>
	</tr>
	<tr style="vertical-align:top;">
	<td>
	<div id="map">
		<script>
	var ventana_alto = $(window).height();
	ventana_alto=ventana_alto-60;
	var alto= '<div id="pane1" class="scroll-panel" STYLE="width:100%; overflow: auto; height:'+ventana_alto+'px;">';
	document.write(alto);
		</script>
			<table border="0" style="width:100%;">
			<tr cellspacing="0" cellpadding="0" style="font-weight:bold; text-align:center; background-color:#06AEFB; border: #06AEFB;">
				<td>Longitud</td>
				<td>Latitud</td>
				<td>Desastre Natural</td>
				<td>Intensidad</td>
				<td>IP</td>
				<td>Tiempo</td>
			</tr>
			
	<?php
	for($i=0;$i<$result;$i++){
		$u=$i;
		echo "<style>";		
		echo '#democlick'.$u.':target {display: block; background-color: #009AFF; color:white;}
              #democlick'.$u.':hover {background-color: #92D4FF; color:black;}
              #democlick'.$u.':target {display: block; background-color: #009AFF; color:white;}';		  
	    echo "</style>";
		
		echo '
		<a href="?id=democlick'.$u.'">
			<div id="democlick'.$u.'">';
		echo "<tr>";	
		echo '<td>'.$lon[$i].'</td>';
		echo '<td>'.$lat[$i].'</td>';
		echo '<td>'.$dn[$i].'</td>';
		echo '<td>
		<div style="color:white; font-size:9px; position:absolute; left:46%; z-index:9">
		'.$in[$i].'%
		</div>
		<div style="width:100%; height:10px; background-color: #A2A2A2; border-radius:5px;">	
		<div style="position:relative; width:'.$in[$i].'%; height:10px; background-color: #007CFF; border-radius:5px; color:white; font-size:9px;"/>
				
		</div>
		</td>';
		echo '<td>'.$IP[$i].'</td>';
		echo '<td>'.$t[$i].'</td>';
		echo "</tr>";
		echo '
			</div>
		</a>';
		}
		if ($result==1){
		echo "		
		<script>		
			$('#democlick2').hide();
		</script>";
		}
		if (isset($_GET['id'])){
		$id=$_GET['id'];
		echo "<style>";		
		echo '#'.$id.' {display: block; background-color: #009AFF; color:white;}'; 
		echo '#'.$id.':hover{display: block; background-color: #009AFF; color:white;}'; 
		echo "</style>";
}		
		echo "
		</table>
		</div>
		</div>
		</td>
		</tr>";
		?>	

   </tbody>
 </table>
	<div style="position:static" id="map-canvas"/>	
<?php die();?>
</body>
</html>

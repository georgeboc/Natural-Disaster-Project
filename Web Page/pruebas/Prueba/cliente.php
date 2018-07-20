<?php
$client = new SoapClient(null, array(
 'location' => "http://webtecnologia.tk/simple_server.php",
 'uri'      => "urn://tyler/req"));

$result = $client->
__soapCall("echoo",array('hola'));

print $result;
?>
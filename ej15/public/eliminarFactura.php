<?php
$api_url = "http://localhost/dws/UD5/ej14/public/api/facturas";
$json_data =  file_get_contents($api_url);
$opts = array('http' =>
array(
'method' => 'DELETE',
'content' => http_build_query($json_data),
'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
)
);
$context = stream_context_create($opts);
$result = file_get_contents($api_url, false, $context);
?>
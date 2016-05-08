<?php
/*
 * Used to get around CORS and possible local caching in the future to speed things up
 */

$CONFIG_FILE = "config.ini";
$config = parse_ini_file($CONFIG_FILE, true);

$url = $config['server']['host_url'];
$encoded = 'apiKey=' . $config['server']['api_key'] .'&';

foreach($_GET as $name => $value) {
	$encoded .= urlencode($name).'='.urlencode($value).'&';
}

$encoded .= "remoteHost=".$_SERVER['REMOTE_ADDR']; //might as well pass through who is asking

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);    
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_POST, 1);            
curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded);
//curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 

$response = curl_exec($ch);
echo $response; 
file_put_contents("out.json", $response);
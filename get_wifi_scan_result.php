<?php
function cors() {
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }
}
cors();

error_reporting(E_ALL ^ E_NOTICE);
$ip = $_GET["ip"];
$user = $_GET["user"];
$pwd = $_GET["pwd"];

if(!isset($ip)){
	echo("ip needs to be set ip=[ipadress]");
}
if(!isset($pwd)){
	$pwd = "admin";
}
if(!isset($user)){
	$user = "admin";
}

$getdata = file_get_contents('http://'. $ip .'/get_wifi_scan_result.cgi?user=' . $user . '&pwd=' . $pwd . '');
$removevar = str_replace("var ","", $getdata);
$datasting = substr($removevar, 0, -2);
$data = explode(";\n", $datasting);

$obj = new stdClass();

$query = array();

foreach ($data as $value){
	$var = explode("=", $value);
	$query[$var[0]] = $var[1];
}

$obj->Data=$query;
echo json_encode($obj);
?>
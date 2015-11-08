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

$led_mode = $_GET["led_mode"];
$ptz_center_onstart = $_GET["ptz_center_onstart"];
$ptz_auto_patrol_interval = $_GET["ptz_auto_patrol_interval"];
$ptz_auto_patrol_type = $_GET["ptz_auto_patrol_type"];
$ptz_patrol_h_rounds = $_GET["ptz_patrol_h_rounds"];
$ptz_patrol_v_rounds = $_GET["ptz_patrol_v_rounds"];

if(!isset($ip)){
	echo("ip needs to be set ip=[ipadress]");
}
if(!isset($pwd)){
	$pwd = "admin";
}
if(!isset($user)){
	$user = "admin";
}

$getdata = file_get_contents('http://'. $ip .'/set_misc.cgi?user=' . $user . '&pwd=' . $pwd . '&led_mode=' . $led_mode . '&ptz_center_onstart=' . $ptz_center_onstart . '&ptz_auto_patrol_interval=' . $ptz_auto_patrol_interval . '&ptz_auto_patrol_type=' . $ptz_auto_patrol_type . '&ptz_patrol_h_rounds=' . $ptz_patrol_h_rounds . '&ptz_patrol_v_rounds=' . $ptz_patrol_v_rounds);
echo $getdata;
?>
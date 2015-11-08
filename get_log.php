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

$getdata = file_get_contents('http://'. $ip .'/get_log.cgi?user=' . $user . '&pwd=' . $pwd . '');

$removevar = str_replace("var log_text='","", $getdata);
$getdata = str_replace("\n';","", $removevar);
$removevar = str_replace("          "," ", $getdata);
$getdata = str_replace("     "," ", $removevar);
$removevar = str_replace("   "," ", $getdata);
$getdata = str_replace("  "," ", $removevar);
$removevar = str_replace(",","", $getdata);

$datasting = substr($removevar, 0, -4);

$data = explode('\n', $datasting);

$obj = new stdClass();

$query = array();

$counter = 0;

foreach ($data as $value){	
	$var = explode(" ", $value);	
	$info = array();
	
	$valueindex = 0;
	foreach ($var as $varvalue){
		if($varvalue != ""){
			if($valueindex == 0){
				$info["Day"] = $varvalue;
			}
			if($valueindex == 1){
				$info["Date"] = $varvalue;
			}
			if($valueindex == 2){
				$info["Time"] = $varvalue;
			}
			if($valueindex == 3){
				$info["User"] = $varvalue;
			}
			if($valueindex == 4){
				$info["Ip"] = $varvalue;
			}
			if($valueindex == 5){
				$info["Command"] = $varvalue;
			}
		}
		$valueindex++;		
	}
	if($info != array()){
		$query["log" . $counter] = $info;
	}
	$counter++;
}

$obj->log_text=$query;
echo json_encode($obj);
?>
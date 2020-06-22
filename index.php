<?
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$request = $_SERVER['REQUEST_URI'];
$requestclean = strtok($request,"?");
$uri = explode('/', $requestclean);
date_default_timezone_set("America/New_York");
$now = date("h:i:sa");

require_once('views/head.php');
require_once('views/home.php');
require_once('views/foot.php');
?>

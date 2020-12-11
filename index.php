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

if(!$uri[1])
	require_once('views/home.php');
// elseif($uri[1] == 'slide-image')
// 	require_once('views/slide-image.php');
// elseif($uri[1] == 'slide-text')
// 	require_once('views/slide-text.php');
// elseif($uri[1] == 'slide-audio')
// 	require_once('views/audio.php');
elseif($uri[1] == 'text')
	require_once('views/text.php');
elseif($uri[1] == 'image')
	require_once('views/image.php');
elseif($uri[1] == 'audio')
	require_once('views/audio.php');
elseif($uri[1] == 'letter')
	require_once('views/letter.php');
elseif($uri[1] == 'colophon')
	require_once('views/column.php');
elseif($uri[1] == 'radio')
	require_once('views/radio.php');

require_once('views/foot.php');
?>

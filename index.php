<?
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$request = $_SERVER['REQUEST_URI'];
$requestclean = strtok($request,"?");
$uri = explode('/', $requestclean);
date_default_timezone_set("America/New_York");
$now = date("h:i:sa");

if($uri[1] == 'print' || 
   $uri[1] == 'preview' ) {
    require_once('views/print.php');
} else if($uri[1] == 'print-test-1') {
    require_once('views/print-test-1.php');
}else if($uri[1] == 'book') {
    require_once('views/book.php');
} else if($uri[1] == 'book-test-1') {
    require_once('views/book-test-1.php');
} else if($uri[1] == 'book-test-2') {
    require_once('views/book-test-2.php');
}else if($uri[1] == 'book') {
    require_once('views/book.php');
} else {
    require_once('views/head.php');
    if(!$uri[1])
	    require_once('views/home.php');
    elseif($uri[1] == 'text')
	    require_once('views/text.php');
    elseif($uri[1] == 'image' || $uri[1] == 'mobile' )
	    require_once('views/image.php');
    elseif($uri[1] == 'letter')
	    require_once('views/letter.php');
    elseif($uri[1] == 'appendix')
	    require_once('views/appendix.php');
    elseif($uri[1] == 'source')
	    require_once('views/main.php');
    elseif($uri[1] == 'zoom-in')
	    require_once('views/zoom-in.php');
    require_once('views/foot.php');
}
?>

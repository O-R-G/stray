<?
require_once('views/head.php');

// build $texts[]

$urls = explode('/', 'text');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
$body = $item['body'];
$texts = explode('///', $body);

// build $images[]

$urls = explode('/', 'image');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
// $body = $item['body'];
// $images = explode('///', $item['body']);
// ** stub **
$body = file_get_contents('static/txt/image.txt');;
$images = explode('///', $body);

// 2. output alternating $texts[] and $images[]
//    with page-breaking token in between each
//    to pass to /print

//    ** todo ** --> add appedices and cover (back)

$now = date('l, F j, Y') . ' at ' . date('h:i a');

?><div id='print-container'>
    <div class='page'>Printed on <?= $now; ?>.</div><?
    $j = 0;
    foreach($texts as $text) {
        echo '<div class="page">' . $images[$j] . '</div>';
        echo '<div class="page">' . $text . '</div>';
        if ($j < count($images))
            $j++;
    }
?></div>


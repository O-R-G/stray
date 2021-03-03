<?
require_once('views/head.php');

// better to fetch direct from o-r-g
// then split on some token 
// and then alternate text and image page outputs
// need to add image html to o-r-g

// 0. build $texts[]

// do we need to preprocess output?

$urls = explode('/', 'text');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
$body = $item['body'];
$texts = explode('///', $body);

// 1. build $images[]

$urls = explode('/', 'image');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
// $body = $item['body'];
// $images = explode('///', $item['body']);
$body = file_get_contents('static/txt/image.txt');;
$images = explode('///', $body);

// 2. output alternating $texts[] and $images[]
//    with page-breaking token in between each
//    to pass to /print

//    --> add appedices and cover (back)

$now = date('l, F j, Y') . ' at ' . date('h:i a');

?><div id='print-container'>
    <div class='page'>Printed on <?= $now; ?>.</div><?
    $j = 0;
    for ($i=0; $i < count($texts); $i++) {
        echo '<div class="page">' . $images[$j] . '</div>';
        echo '<div class="page">' . $texts[$i] . '</div>';
        // echo '<div class="page">' . $texts[$i] . '</div>';
        // echo '<div class="page">' . $texts[$i] . $images[$j] . '</div>';

        if ($j < count($images))
            $j++;
    }
?></div>


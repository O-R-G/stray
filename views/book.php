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
$find = '/<div><br><\/div>/';
$replace = '';
$body = preg_replace($find, $replace, $body);
$texts = explode('///', $item['body']);

// 1. build $images[]

/*
$urls = explode('/', 'image');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
$body = $item['body'];
$find = '/<div><br><\/div>/';
$replace = '';
$body = preg_replace($find, $replace, $body);
$images = explode('///', $item['body']);
// '///' as explode key in open-rec-gen?
*/

// 2. output alternating $texts[] and $images[]
//    with page-breaking token in between each
//    to pass to /print

$now = date('l, F j, Y') . ' at ' . date('h:i a');

?><div id='print-container'>
    <div class='.page'>Printed on <?= $now; ?>.</div><?
    for ($i=0; $i < count($texts); $i++) {
        echo $texts[$i];
        echo $texts[$i];    // stub for images
        // echo '<div class="page-break"></div>';
        // echo $images[$i];
        // this causes overflow for now
        // likely as /image in o-r-g is just rough
        // will set that up so a series of divs
        // which are really pages
        // then each image is placed absolutely
        // or padded within that container
        // or even just done with <br>'s
        // echo '<div class="page-break"></div>';
    }

    /* debug
    foreach($texts as $text)   
        echo $text . '<br><br><br>OOOOOOO';    
    foreach($images as $image)   
        echo $image;
    */

?></div>


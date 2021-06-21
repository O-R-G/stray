<?
require_once('views/head.php');

// build $texts[][]
// chapter -> page

$urls = explode('/', 'text');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
// $body = $item['body'];
$body = file_get_contents('static/txt/text.txt');
$texts = [];
$chapters = explode('+++', $body);
foreach($chapters as $chapter) {
    $pages = explode('///', $chapter);
    $texts[] = $pages;
}

// build $images[][]
// chapter -> page

$urls = explode('/', 'image');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
// $body = $item['body'];
$body = file_get_contents('static/txt/image.txt');
$images = [];
$chapters = explode('+++', $body);
foreach($chapters as $chapter) {
    $pages = explode('///', $chapter);
    $images[] = $pages;
}

// build $appendix[][]

$urls = explode('/', 'appendix');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);    
$children = $oo->children($item['id']);
foreach($children as $child) {
    $pages = explode('///', $child['body']);
    $appendix[] = $pages;
}

// build $now

$now = date('l, F j, Y') . ' at ' . date('h:i a');

// build back cover

$now_timestamp = time();
$text_radio = file_get_contents('static/txt/text-radio.txt');
$letter_length = strlen($text_radio);
$current_pos = intval( $now_timestamp ) % $letter_length;
$current_letter = substr($text_radio, $current_pos, 1);

if(ctype_alpha($current_letter))
    $current_filename = strtoupper($current_letter);
elseif($current_letter == '&')
    $current_filename = 'ampersand';
elseif($current_letter == '.')
    $current_filename = 'period';
elseif($current_letter == ',')
    $current_filename = 'comma';
elseif($current_letter == '#')
    $current_filename = 'hash';
elseif($current_letter == '/')
    $current_filename = 'slash';
else
    $current_filename = false;
if($current_filename)
{
    $current_filename_arr = glob('media/letters/' . $current_filename. '*');
    $current_filename_full = '/' . $current_filename_arr[array_rand($current_filename_arr)];
}
?>
<!-- <script src='/static/js/bindery.min.js'></script> -->
<div id='print-container'>
    <div class='page'>
        <div class='now-container'>
            Printed on <?= $now; ?>.
        </div>
        <!--
        <div id='staple-container' class='small caps'>
            STAPLE HERE
        </div>
        -->
    </div><?

    // add staple instructions

    // body
    // verso = $texts[][] + $images[][]
    // recto = $texts[][]

    $i = 0;
    foreach($texts as $chapter) {
        $j = 0;
        foreach($chapter as $page) {
            // verso
            ?><div class="page"><?
                ?><div class = 'mask-text-container'><?
                    echo $page;
                ?></div><?
                ?><div class = 'mask-image-container'><?
                    echo $images[$i][$j];
                ?></div><?
            ?></div><?
            // recto
            $j++;
            $spread = (strpos($images[$i][$j], '<!-- // -->'));
            ?><div class="page"><?
                if ($spread) {
                    ?><div class = 'mask-image-container'><?
                        echo $images[$i][$j];
                    ?></div><?
                    $j++;
                } else {
                    echo $page;
                }
            ?></div><?
        }
        $i++;
    }

    // appendix

    foreach($appendix as $append) {
        ?><div class = 'appendix-section'><?
            foreach($append as $page) {
                ?><div class="page"><?
                    echo $page;
                ?></div><?
            }
        ?></div><?
    }

    // inside back cover

    ?><div id="inside-back-cover">
        <div class='page'>
            &nbsp;
        </div>
    </div><? 

    // back cover

    ?><div id="back-cover">
        <?= $current_filename_full ? '<img src="'. $current_filename_full . '" >' : ''; ?>
        <div>
            SHANNON EBNER: STRAY WORLD is published by SOURCE TYPE, 2021.
        </div>
    </div><? 
?></div>

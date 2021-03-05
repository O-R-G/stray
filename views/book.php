<?
require_once('views/head.php');

// build $texts[][]
// chapter -> page

$urls = explode('/', 'text');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
$body = $item['body'];
// $body = file_get_contents('static/txt/text.txt');
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
$body = $item['body'];
// $body = file_get_contents('static/txt/image.txt');
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

// var_dump(count($appendix));
// die();
// $appendix[] = '<div class="appendix_section">'.$child['body'].'</div>';

/*
// build $cover
// this uses extensive js, surely is a simpler way
// see views/print-new
// addCover

$text_plain = getPlainRadioText(true);
$letter_image_filenames = scandir('media/letters');
$filenum_arr = array();
foreach($letter_image_filenames as $filename){
    if(substr($filename, 0, 1) != '.'){
        $this_key = explode('-', $filename);
        $this_key = $this_key[0];
        if(isset($filenum_arr[$this_key]))
            $filenum_arr[$this_key] ++;
        else
            $filenum_arr[$this_key] = 1;
    }
}
foreach($filenum_arr as $f)
    var_dump($f);
die();
*/

// build $now

$now = date('l, F j, Y') . ' at ' . date('h:i a');

?><div id='print-container'>
    <div class='page'>
        <div class='now-container'>
            Printed on <?= $now; ?>.
        </div>
        <div id='staple-container' class='small caps'>
            STAPLE HERE 
        </div>
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
            $j++;
            // recto
            ?><div class="page"><?
                echo $page;
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

    // back cover

?></div>

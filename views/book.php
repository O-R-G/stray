<?
require_once('views/head.php');

// build $texts[][]
// chapter -> page

// $urls = explode('/', 'text');
// $ids = $oo->urls_to_ids($urls);
// $item = $oo->get($ids[0]);
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

// $urls = explode('/', 'image');
// $ids = $oo->urls_to_ids($urls);
// $item = $oo->get($ids[0]);
// $body = $item['body'];
$body = file_get_contents('static/txt/image.txt');
$images = [];
$chapters = explode('+++', $body);
foreach($chapters as $chapter) {
    $pages = explode('///', $chapter);
    $images[] = $pages;
}

// get print time
$now = date('l, F j, Y') . ' at ' . date('h:i a');

?><div id='print-container'>
    <div class='page'>Printed on <?= $now; ?>.</div><?

        // output pages   
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

    // appendix 1
    // appendix 2
    // appendix 3
    // colophon
    // back cover

    ?></div>
?></div>


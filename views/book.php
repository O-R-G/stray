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

// build back cover

$now_timestamp = time();
$pure_text = file_get_contents('static/txt/pure-text.txt');
$letter_length = strlen($pure_text);
$current_pos = intval( $now_timestamp ) % $letter_length;
$current_letter = substr($pure_text, $current_pos, 1);

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
<script src='/static/js/bindery.min.js'></script>
<div class='print-container'>
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

    // back cover (** stub **)

    ?><div id="back-cover">
        <?= $current_filename_full ? '<img src="'. $current_filename_full . '" >' : ''; ?>
        <div>
            STRAY WORLD is published by Source Type, 2021.
        </div>
    </div><? 
?></div>
<script>  
        window.addEventListener('load', function(){
            Bindery.makeBook({
                content: '.print-container',
                pageSetup: {           
                    size: { width: '208mm', height: '295mm' },
                    // size: { width: '8.5in', height: '11in' },
                    margin: { 
                        top: '15mm', 
                        inner: '37mm', 
                        outer: '15mm', 
                        bottom: '15mm' 
                    },
                },  
                view: 
                    Bindery.View.FLIPBOOK,
                rules: [
                    Bindery.PageBreak({ 
                        selector: '.page', 
                        position: 'both' 
                    }),
                    Bindery.RunningHeader({
                    }),
                ],
            });
        });
        
        // Bindery.makeBook({ 
        //     content: '.print-content',
        //     view: Bindery.View.PRINT,
        //     pageSetup: {
        //         size: { width: '210mm', height: '297mm' },
        //         margin: { top: '17.5mm', inner: '30mm', outer: '10mm', bottom: '17.5mm' },
        //     },
        //     printSetup: {
        //         marks: Bindery.Marks.CROP,
        //         bleed: '12pt',
        //     },
        //     rules: [
        //       Bindery.PageBreak(
        //         { selector: '.hotfield-break', position: 'after', continue:'left' }
        //     ),
        //     ], 

        // });
    </script>

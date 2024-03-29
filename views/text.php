<?
/*
    view for texts
*/

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

$browser = get_browser(null, true);
$browser = $browser['browser'];
$isSafari = strtolower($browser) === 'safari';

?>
<script>
    var message = {
        'window': 'text',
        'status': 'loaded'
    };  
    window.opener.postMessage(JSON.stringify(message), '*');
</script>
<section id="main" class = ''>
	<ul id = 'chapter-nav'>
		<li><a href = "#head1">I.</a></li><li><a href = "#head2">II.</a></li><li><a href = "#head3">III.</a></li><li><a href = "#head4">IV.</a></li><li><a href = "#head5">V.</a></li>
	</ul>
    <div id = 'text-container' class = 'window-container'><?
        foreach($texts as $chapter) {                
            echo '<div class="chapter">';
            foreach($chapter as $page)
                echo '<div class="page">' . $page . '</div>';
            echo '</div>';
        }
    ?></div>
</section><? 
    if($isSafari){
	    ?><a id = 'print' href = "javascript:popup('preview');"></a><?
    } else {
	    ?><a id = 'print' href = "javascript:popup('print');"></a><?
    }
?>


<?
/*
    view for texts
*/

$urls = explode('/', 'text');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
$body = $item['body'];
$texts = explode('///', $body);

$browser = get_browser(null, true);
$browser = $browser['browser'];
$isSafari = strtolower($browser) === 'safari';

?><section id="main" class = ''>
	<ul id = 'chapter-nav'>
		<li><a href = "#head1">I.</a></li><li><a href = "#head2">II.</a></li><li><a href = "#head3">III.</a></li><li><a href = "#head4">IV.</a></li><li><a href = "#head5">V.</a></li><li><a href = "#head6">VI.</a></li>
	</ul>
    <div id = 'text-container' class = 'window-container'><?
        foreach($texts as $text)
            echo '<div class="page">' . $text . '</div>';
    ?></div>
</section><? 
    if($isSafari){
	    ?><a id = 'print' href = "javascript:popup('preview');"></a><?
    } else {
	    ?><a id = 'print' href = "javascript:popup('print');"></a><?
    }
?>


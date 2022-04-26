<? 
if ( !isset($uri[2]) ){
	$content = '';
	$children = $oo->children($item['id']);
	// var_dump(count($children));
	foreach($children as $child) {
	    if (strpos($child['name1'], '.') !== 0) {
            $pages = str_replace('///', '<br><br>', $child['body']);
    	    $content .= $pages . '<br><br><br><div style="text-align:center;">&mdash;&mdash;&mdash;</div><br><br><br>';
        }
	}
} else {
	$content = $item['body'];
} 
?><section id = 'main'>
	<div id = 'appendix-container' ><?= $content; ?></div>
</section>

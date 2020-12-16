<!-- text -->

<?
$name = $item['name1'];
$deck = $item['deck'];
$body = $item['body'];
$notes = $item['notes'];
$date = $item['begin'];
$find = '/<div><br><\/div>/';
$replace = '';
$body = preg_replace($find, $replace, $body);
?><section id="main">
    <div id = 'text-container' class = 'window-container'><?
            echo $body;
    ?></div>
</section>


<!-- text as jpeg -->
<!--
<div id = 'text-container' class = 'window-container'>
	<img id = 'text-image' src = 'media/jpg/source.jpeg'>
</div>

<script>
	// var ticking = false;
	// var sTop = window.scrollY;
	// window.addEventListener('load', function(){
	// 	window.addEventListener('scroll', function(){
	// 		sTop = window.scrollY;
	// 		if (!ticking) {
	// 		    window.requestAnimationFrame(function() {
	// 		    	window_image.scrollTo(0, sTop);
	// 		      	ticking = false;
	// 		    });
	// 		    ticking = false;
	// 		}
	// 	});
	// });
</script>
-->

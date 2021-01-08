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
?><section id="print-content-text" class = 'print-content'>
	<ul id = 'chapter-nav'>
		<li><a href = "#head1">I.</a></li><li><a href = "#head2">II.</a></li><li><a href = "#head3">III.</a></li><li><a href = "#head4">IV.</a></li><li><a href = "#head5">V.</a></li><li><a href = "#head6">VI.</a></li>
	</ul>
    <div id = 'text-container' class = 'window-container'><?
            echo $body;
    ?></div>
</section>
<!-- <button id = 'print'><img src = '/media/svg/bindery-logo40.svg'></button> -->
<a id = 'print' href = '/print'></a>

<script>
  
</script>

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

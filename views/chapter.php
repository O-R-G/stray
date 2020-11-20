<script src='/static/js/section.js'></script>
<?
// if ($_GET){
// 	$chapter = $_GET['chapter'];
// 	$section = $_GET['section'];
// }
// else
// {
// 	$chapter = 0;
// 	$section = 0;
// }

$chapter = $uri[2];
$section = $uri[3];

?>
<script>
	function get_media_folios(chapter, sections_info){
		var idx = chapter - 1;
		var output = [];
		output[0] = []; // images
		output[1] = []; // audio

		var this_image_folios_raw = sections_info[idx]['image'];
		if(this_image_folios_raw.length != 0)
		{
			this_image_folios_raw.forEach(function(el, i){
				if(isNaN(el)){
					var hyphen_pos = el.indexOf('-');
					if(hyphen_pos != -1){
						var this_range = el.split('-');
						for(i = parseInt(this_range[0]); i <= parseInt(this_range[1]); i++)
							output[0].push(i);
					}
					else 
						output[0].push(parseInt(el));
				}
				else{
					output[0].push(el);
				}
			});
			var this_audio_folios_raw = sections_info[idx]['audio'];
			if(typeof this_audio_folios_raw != 'undefined')
				output[1] = this_audio_folios_raw;
			
			return output;
		}
		else
			return false;
		
	}
	var chapter = <?= $chapter ?>;
	var media_folio = get_media_folios(chapter, sections_info);
	if(media_folio.length != 0)
		image_folio.unshift(false);
	var image_folio = media_folio[0];
</script>
<?
if($section == 'text')
{
	?>
		<div id = 'text-container' class = 'content-container' chapter = '<?= $chapter; ?>'>
	<?
		require_once('views/chapter'.$chapter.'.php');
	?>	</div>
		<script>
			var sText_container = document.getElementById('text-container');
			var image_position = [];
			var allcaps_position = [];
			var ticking = false;
			// var current_image = false;
			var sTop = window.scrollY;
			
			var current_image = 0;
			var current_allcaps = 0;
			

			window.addEventListener('load', function(){
				if(media_folio.length != 0)
				{
					var sImage_anchor = document.getElementsByClassName('image_anchor');
					[].forEach.call(sImage_anchor, function(el, i){
						image_position.push(el.offsetTop);
					});
					image_position.push(sText_container.offsetHeight);
				}
				

				var sAllcaps = document.getElementsByClassName('allcaps');
				if(sAllcaps.length != 0)
				{
					[].forEach.call(sAllcaps, function(el, i){
						allcaps_position.push(el.offsetTop);
					});
					allcaps_position.push(sText_container.offsetHeight);
				}
				

				window.addEventListener('scroll', function(){
					sTop = window.scrollY;
					if (!ticking) {
					    window.requestAnimationFrame(function() {
					    	// chekcing image_anchor positions
					    	if(media_folio.length != 0)
					    	{
					    		for(i = 0; i < image_position.length; i++)
								{
					    			if(sTop < image_position[i] )
					    			{
					    				if( i != current_image){
					    					// when image changes
					    					var image_viewing = document.querySelector('.image_anchor.viewing');
					    					if(image_viewing)
					    						image_viewing.classList.remove('viewing');
					    					if(image_folio[i] || image_folio[i] === 0){
					    						var path = image_folio[i];
					    						if(path == 0)
					    							path = 'zero';
					    						if(i != 0)
					    							sImage_anchor[i-1].classList.add('viewing');
					    					}
					    					else
					    						var path = false;
						    				window_image = popup(chapter, '', 'image', path);
						    				current_image = i;
					    				}
					    				break;
					    			}
					    		}
					    	}
				    		
				    		// chekcing allcaps positions
				    		if(sAllcaps.length != 0)
				    		{
				    			for(i = 0; i < allcaps_position.length; i++)
								{
					    			if(sTop < allcaps_position[i] )
					    			{
					    				if( i != current_allcaps){
					    					// when image changes
					    					var allcaps_viewing = document.querySelector('.allcaps.viewing');
					    					if(allcaps_viewing)
					    						allcaps_viewing.classList.remove('viewing');
					    					// if(i != 0)
					    					// 		sImage_anchor[i-1].classList.add('viewing');
					    					
						    				window_allcaps = popup(chapter, '', 'allcaps', i);
						    				current_allcaps = i;
					    				}
					    				break;
					    			}
					    		}
				    		}
					      	ticking = false;
					    });
					    ticking = false;
					}
				});
				
			});

		</script>
	<?
}
else if($section == 'image')
{
	// $folio = $_GET['path'];
	$folio = $uri[4];
	var_dump($folio);
	if($folio == 'zero')
		$folio = 0;
	if(isset($folio)){
		if($folio < 10)
			$folio = '00' . $folio;
		elseif($folio < 100)
			$folio = '0' . $folio;
		$current_src = '/media/slide-text/'.$chapter.'/'.$folio.'.jpeg';
	}
	else
		$current_src = '';
	?>

	<div id = 'image-container' class = 'content-container' chapter = '<?= $chapter; ?>'>
		<img>
	</div>
	<script>
		var current_src = '<?= $current_src; ?>';
		var sImage_container = document.getElementById('image-container');
		// var img_preload = new Image();
		var img_element = document.querySelector('#image-container img');
		img_element.onload = imgOnLoad;
		
		function imgOnLoad(){
			var window_r = 1;
			var img_r = img_element.height / img_element.width;
			sImage_container.classList.add('viewing');
			if( img_r < window_r ){
				// wider then slide_display
				img_element.classList.add('landscape');
			}
			else{
				// thiner then slide_display
				img_element.classList.add('portrait');
			}

		}
		img_element.src = current_src;
	</script>
	<?
}
else if($section == 'allcaps')
{
	// $allcaps = $_GET['allcaps'];
	$allcaps = $uri[4];
	?>
		<div id = 'allcaps-container' class = 'content-container' chapter = '<?= $chapter; ?>'>
			<?
				require_once('views/chapter'.$chapter.'.php');
			?>
		</div>
		<script>
			var allcaps_idx = <?= $allcaps; ?>;
			var allcaps_position = [];
			var viewing_allcaps_h = 0;
			window.addEventListener('load', function(){
				var sAllcaps = document.getElementsByClassName('allcaps');
				[].forEach.call(sAllcaps, function(el, i){
					allcaps_position.push(el.offsetTop);
				});
				sAllcaps[allcaps_idx].classList.add('viewing');
				viewing_allcaps_h = sAllcaps[allcaps_idx].offsetHeight;
				// console.log(sAllcaps[allcaps_idx].offsetTop);
				wH = window.innerHeight;
				if(viewing_allcaps_h < wH)
					window.scrollTo(0, sAllcaps[allcaps_idx].offsetTop - wH/2 + viewing_allcaps_h/2);
				else
					window.scrollTo(0, sAllcaps[allcaps_idx].offsetTop);
			});

		</script>
	<?
}
?>


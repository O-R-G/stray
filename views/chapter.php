<script src='/static/js/section.js'></script>
<?
$chapter = $_GET['chapter'];
$section = $_GET['section'];
?>
<script>
	function get_media_folios(chapter, sections_info){
		var idx = chapter - 1;
		var output = [];
		output[0] = []; // images
		output[1] = []; // audio

		var this_image_folios_raw = sections_info[idx]['image'];
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
	var chapter = '<?= $chapter ?>';
	var media_folio = get_media_folios(chapter, sections_info);
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
			var ticking = false;
			var current_image = 0;
			var sTop = window.scrollY;
			
			var current_image = 0;
			
			
			image_folio.unshift(false);
			
			window.addEventListener('load', function(){
				var sImage_anchor = document.getElementsByClassName('image_anchor');
				[].forEach.call(sImage_anchor, function(el, i){
					image_position.push(el.offsetTop);
				});
				image_position.push(sText_container.offsetHeight);
				// console.log(image_position);
				window.addEventListener('scroll', function(){
					sTop = window.scrollY;
					if (!ticking) {
					    window.requestAnimationFrame(function() {
				    		for(i = 0; i < image_position.length; i++)
							{
				    			if(sTop < image_position[i] )
				    			{
				    				if( i != current_image){
				    					// when image changes
				    					console.log('image changes');
				    					console.log(image_folio[i]);
				    					var image_viewing = document.querySelector('.image_anchor.viewing');
				    					if(image_viewing)
				    						image_viewing.classList.remove('viewing');
				    					if(image_folio[i]){
				    						var query = 'chapter='+chapter+'&folio='+image_folio[i];
				    						if(i != 0)
				    							sImage_anchor[i-1].classList.add('viewing');
				    					}
				    					else
				    						var query = 'chapter='+chapter;
				    					console.log(query);
					    				window_1 = popup_single(chapter, query, 'image');
					    				current_image = i;
				    				}
				    				break;
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
	$folio = $_GET['folio'];
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
?>


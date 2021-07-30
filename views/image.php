<?
/*
    view for images    
*/

// build $texts[chapters][pages]

$urls = explode('/', 'text');
$ids = $oo->urls_to_ids($urls);
$item = $oo->get($ids[0]);
// $body = $item['body'];
if($uri[1] == 'mobile')
	$body = file_get_contents('static/txt/text-mobile.txt');
else
	$body = file_get_contents('static/txt/text.txt');
$texts = [];
$chapters = explode('+++', $body);    
foreach($chapters as $chapter) {
    $pages = explode('///', $chapter);
    $texts[] = $pages;
}

// build $images[chapters][pages]

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

// check browswer

$isMobile = false;
if($uri[1] == 'mobile')
	$isMobile = true;
$browser = get_browser(null, true);
$browser = $browser['browser'];
$isSafari = strtolower($browser) === 'safari';

?><script>
    var message = {
        'window': 'image',
        'status': 'loaded'
    };  
    window.opener.postMessage(JSON.stringify(message), '*');

	var isMobile = <?= json_encode($isMobile); ?>;
	var audio_position = [];
	var wH = window.innerHeight;
	var ticking = false;
	var playing = false;
	var playing_now = 0;
	window.addEventListener('load', function(){
		var audio = document.querySelectorAll('#image-container audio');
		// audio = audio.reserse();
		[].forEach.call(audio, function(el, i){
			el.addEventListener('pause', ()=>{playing=false; el.setAttribute('forcedPaused', true);});
			el.addEventListener('play', ()=>{playing=true; el.setAttribute('forcedPaused', false); playing_now = i; });
			el.addEventListener('ended', ()=>{playing_now++; if(playing_now > audio.length-1) playing_now = 0; audio[playing_now].play(); });
		});
		var audio_rearranged = [audio[3], audio[2], audio[0], audio[1]];
		[].forEach.call(audio_rearranged, function(el, i){
			audio_position.push(el.offsetTop);
		});
        /*
		window.addEventListener('scroll', function(){
			if (!ticking) {
                window.requestAnimationFrame(function() {
                	[].forEach.call(audio_rearranged, function(el, i){
                		var forcedPaused = el.getAttribute('forcedPaused');
                		if(window.scrollY > audio_position[i]-wH && !playing && !forcedPaused){
	                    	el.play();
	                    	playing = true;
	                    }
                	});
                });
                ticking = true;
            }
            ticking = false;
		});
        */		
	});
</script>
<section id ='main' class="image-main-container">
	<ul id = 'chapter-nav'>
		<li><a href = "#head1">I.</a></li><li><a href = "#head2">II.</a></li><li><a href = "#head3">III.</a></li><li><a href = "#head4">IV.</a></li><li><a href = "#head5">V.</a></li><li><a href = "#head6">VI.</a></li>
	</ul>
	<div id = 'image-container' class = 'window-container'><?
        // output $texts as chapters->pages
        // overlay $images
        $i = 0;
        foreach($texts as $chapter) {
            $j = 0;
            ?><div class="chapter"><?
                foreach($chapter as $page) {
                    ?><div class="page"><?
                        ?><div class = 'mask-text-container'><?
                            echo $page;
                        ?></div><?
                        ?><div class = 'mask-image-container'><?
                            echo $images[$i][$j];
                        ?></div><?
                    ?></div><?
                    $j++;
                }
            ?></div><?
            $i++;
        }
    ?></div>

	<div id="text-image-toggle">
		<div id="inner">
			<div id="front"><img src = "/media/svg/text.svg" alt="text"></div>
			<div id="back"><img src = "/media/svg/image.svg" alt="image"></div>
		</div>
	</div>
</section><? 

if($isMobile || $isSafari){
	?><a id = 'print' href = "javascript:popup('preview');"></a><?
} else {
	?><a id = 'print' href = "javascript:popup('print');"></a><?
} 

?><form id="filename-form" method="post" action="/zoom-in" target="_blank">
	<input id="filename-input" type="hidden" name="image-filename">
</form>

<script>
	var imgs = document.querySelectorAll('#image-container img');
	var window_zoom;
	// console.log(hasTouchScreen);
	var sMain = document.getElementById('main');
	var body = document.body;
	// hasTouchScreen = true;
	if(!isMobile)
	{
		
		[].forEach.call(imgs, function(el, i){
			el.addEventListener('click', function(){
				var thisSrc = el.src;
				if(thisSrc !== null)
				{
					var last_slash_pos = thisSrc.lastIndexOf('/');
					var thisFilename = thisSrc.substring(last_slash_pos+1);
					// sFilenameInput.value = thisFilename;
					// sFilenameForm.submit();
					window_zoom = popup('zoom', thisFilename);
				}
			});
		});
	}
	else
	{
		// body.classList.add('hasTouchScreen');
		body.classList.add('mobile');
		body.classList.add('viewing-text');
		var sText_image_toggle = document.getElementById('text-image-toggle');
		sText_image_toggle.addEventListener('click', ()=>{
			body.classList.toggle('viewing-text');
			body.classList.toggle('viewing-image');
		});
		// var sPrint = document.getElementById('print');
		// sPrint.style.display = 'none';

		var wW = window.innerWidth;
		console.log(wW);
		if(wW < 800)
		{
			// var scale = wW / 800;
			// sMain.style.transform = "scale(" + scale + ")";
		}
	}
	console.log(window.innerWidth);
	var all = document.querySelectorAll('*');
	[].forEach.call(all, function(el, i){
		if(el.offsetWidth > window.innerWidth)
			console.log(el);
		else if(el.offsetLeft + el.offsetWidth > window.innerWidth)
			console.log(el);
	});
</script>

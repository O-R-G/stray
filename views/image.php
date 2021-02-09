<?
	$text_id = end($oo->urls_to_ids(array('text')));
	$text = $oo->get($text_id)['body'];
?>
<script>
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
		
	});
	
</script>
<section id ='main'>
	<ul id = 'chapter-nav'>
		<li><a href = "#head1">I.</a></li><li><a href = "#head2">II.</a></li><li><a href = "#head3">III.</a></li><li><a href = "#head4">IV.</a></li><li><a href = "#head5">V.</a></li><li><a href = "#head6">VI.</a></li>
	</ul>
	<div id = 'image-container' class = 'window-container'>
		<div class = 'mask-text-container'><?= $text; ?></div>
		<!-- <div id = 'image-holder-1' class = 'image-holder inline-image-holder' images='2'>
			<img class = '' src = 'media/jpg/STRAY-NM.jpg'><img class = '' src = 'media/jpg/STRAY-SH.jpg'>
		</div> -->
		<div id = 'image-holder-2' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/PHOTORAMA_10-inch.jpg'>
		</div>
		<div id = 'image-holder-3' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/TEMPLE-HIGH-AND-LO-20x13_10-inches.jpg'>
		</div>
		<div id = 'image-holder-29' class = 'image-holder centered' images=''>
			<img class = '' src = 'media/jpg/pp_to-print_IMG_0423.jpg'>
		</div>
		<div id = 'image-holder-4' class = 'image-holder inline-image-holder' images='2'>
			<img class = '' src = 'media/jpg/STRAY-SH.jpg'><img class = '' src = 'media/jpg/STRAY-NM.jpg'>
			<!-- <img class = '' src = 'media/jpg/signal-escapes-2.jpg'> -->
		</div>
		<div id = 'audio-holder-1' class = 'audio-holder image-float-container'>
			<audio id = 'audio-1' controls>
				<source src="media/audio/Left_SUSAN_HUMAN_30minloop.mp3" type = 'audio/mp3'>
			</audio>
			<audio id = 'audio-2' controls>
				<source src="media/audio/Right_B5-Lone.mp3" type = 'audio/mp3'>
			</audio>
		</div>
		<div id = 'image-holder-5' class = 'image-holder' images=''>
			<!-- <img class = '' src = 'media/jpg/6-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/1-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/7-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/FRIENDS-IN-DEED-63x-fnl_10-inch.jpg'><img class = '' src = 'media/jpg/3-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/5-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/4-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/2-FRIENDS-IN-DEED_10-inch.jpg'> -->
			<img class = '' src = 'media/jpg/friendsInDeedHouse-1.jpg'>
		</div>
		
		<div class = 'image-float-container'>
			<!-- I-7 -->
			<div id = 'image-holder-6' class = 'image-holder' images=''>
				<img class = '' src = 'media/jpg/Grace-Walking-and-Talking.jpg'>
			</div>
			<!-- I-8 -->
			<div id = 'image-holder-30' class = 'image-holder' images=''>
				<img class = '' src = 'media/jpg/BOMBARDO_fnl_10-inch.jpg'>
			</div>
			<!-- I-9 -->
			<div id = 'image-holder-31' class = 'image-holder inline-image-holder' images='2'>
				<img class = '' src = 'media/jpg/WILL-AND-BE-GOING-1-v2-fnl_10-inch.jpg'><img class = '' src = 'media/jpg/WILL-AND-BE-GOING-2-v2-fnl_10-inch.jpg'>
			</div>
		</div>
		<!-- I-10 -->
		<div id = 'image-holder-32' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/signal-escapes-v1.jpg'>
		</div>
		<!-- I-11 -->
		<div id = 'image-holder-7' class = 'image-holder inline-image-holder' images='2'>
			<img class = '' src = 'media/jpg/TREE-ELLIPSE-1-IMG_0431-fnl-16INCHES_10-inches.jpg'><img class = '' src = 'media/jpg/TREE-ELLIPSE-2_10-inches.jpg'>
		</div>
		<!-- I-12 -->
		<div id = 'image-holder-33' class = 'image-holder image-float-container' images=''>
			<img class = '' src = 'media/jpg/Exh-view_Ebner_GEP_NY_2017_08.jpg'>
		</div>
		<!-- II-1 -->
		<div id = 'image-holder-34' class = 'image-holder centered' images=''>
			<a href="javascript:popup('appendix/paul-elliman')"><img class = '' src = 'media/jpg/Elliman_LB18-scrambled-bag-2.jpg'></a>
		</div>
		<div id = 'audio-holder-2' class = 'audio-holder'>
			<audio controls>
				<source src="media/audio/NATE_DogonEclipse_30minloop.mp3" type="audio/mp3">
			</audio>
		</div>
		<div id = 'image-holder-8' class = 'image-holder overlap-image-holder'>
			<img class = '' src = 'media/jpg/SEVEN-SLEEPERS-DOOR.jpg'>
		</div>
		<div id = 'image-holder-9' class = 'image-holder inline-image-holder' images='3'>
			<img class = '' src = 'media/jpg/seven-sleepers-FNL-1-working-FNL-FNL.jpg'><img class = '' src = 'media/jpg/seven-sleepers-FNL-2-working-FNL-FNL.jpg'><img class = '' src = 'media/jpg/seven-sleeprs-FNL-3-working-FNL-FNL.jpg'>
		</div>
		<div id = 'image-holder-12' class = 'image-holder image-float-container' images=''>
			<img class = '' src = 'media/jpg/quick_IMG_2222.jpg'>
		</div>
		<div id = 'image-holder-11' class = 'image-holder overlap-image-holder' zindex='1' images=''>
			<img class = '' src = 'media/jpg/SE_Shaker_HIRES_LAYOUT_V2_57x78_Final.jpg'>
		</div>
		<div id = 'image-holder-10' class = 'image-holder image-float-container' >
			<img class = '' src = 'media/jpg/SE_bside_INVERTED_V3_16x18_Final.jpg'>
		</div>
		
		<div id = 'image-holder-13' class = 'image-holder centered' images=''>
			<img class = '' src = 'media/jpg/ghost-song.jpg'>
		</div>
		<div id = 'image-holder-35' class = 'image-holder centered' images=''>
			<img class = '' src = 'media/jpg/SE_Record_IMG_5615_V2_42x50_Final.jpg'>
		</div>
		<div id = 'image-holder-36' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/on-trespassing.png'>
		</div>
		
		<!-- <div id = 'image-holder-14' class = 'image-holder inline-image-holder' images='3'>
			<img class = '' src = 'media/jpg/bird-1_10-inch.jpg'><img class = '' src = 'media/jpg/bird-2_10-inch.jpg'><img class = '' src = 'media/jpg/bird-3_10-inch.jpg'><img class = '' src = 'media/jpg/bird-4_10-inch.jpg'><img class = '' src = 'media/jpg/bird-5_10-inch.jpg'><img class = '' src = 'media/jpg/bird-6_10-inch.jpg'><img class = '' src = 'media/jpg/bird-7_10-inch.jpg'>
		</div> -->
		<div id = 'image-holder-15' class = 'image-holder image-float-container' zindex='1'>
			<img class = '' src = 'media/jpg/SE_cc_ps_grain_IMG_5756_VOG_26x40_Final.jpg'><img class = '' src = 'media/jpg/SE_cc_ps_grain_IMG_5762_V1_26x40_Final.jpg'><img class = '' src = 'media/jpg/SE_cc_ps_grain_IMG_5758_V1_26x40_Final.jpg'>
		</div>
		<div id = 'image-holder-37' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/signal-escapes-2-v2.png'>
		</div>
		<div id = 'image-holder-16' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/STUDIO-PLACARD_10-inches.jpg'>
		</div>
		<div id = 'image-holder-17' class = 'image-holder inline-image-holder' images='3'>
			<img class = '' src = 'media/jpg/4_Shannon_26.jpg'><img class = '' src = 'media/jpg/4_Shannon_30.jpg'><img class = '' src = 'media/jpg/2_Shannon_25.jpg'>
		</div>
		<div id = 'image-holder-18' class = 'image-holder inline-image-holder' images='3'>
			<img class = '' src = 'media/jpg/2_Shannon_18.jpg'><img class = '' src = 'media/jpg/1_Shannon_6.jpg'><img class = '' src = 'media/jpg/1_Shannon_17.jpg'>
		</div>
		<div id = 'image-holder-19' class = 'image-holder inline-image-holder' images='3'>
			<img class = '' src = 'media/jpg/4_Shannon_19.jpg'><img class = '' src = 'media/jpg/2_Shannon_31.jpg'><img class = '' src = 'media/jpg/4_Shannon_2.jpg'>
		</div>
		<div id = 'image-holder-20' class = 'image-holder inline-image-holder' images='3'>
			<img class = '' src = 'media/jpg/1_Shannon_1.jpg'><img class = '' src = 'media/jpg/2_Shannon_9.jpg'><img class = '' src = 'media/jpg/1_Shannon_12.jpg'>
		</div>
		<div id = 'image-holder-21' class = 'image-holder inline-image-holder' images='3'>
			<img class = '' src = 'media/jpg/1_Shannon_15.jpg'><img class = '' src = 'media/jpg/3_Shannon_9b.jpg'><img class = '' src = 'media/jpg/3_Shannon_5.jpg'>
		</div>
		<div id = 'image-holder-22' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/4_Shannon_21.jpg'>
		</div>
		<div id = 'image-holder-23' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/2_Shannon_29.jpg'>
		</div>
		<div id = 'image-holder-24' class = 'image-holder overlap-image-holder' zindex='1'>
			<img class = '' src = 'media/jpg/SB_AGraphicTone_A_IMG_5449_V1_15x15_FInal.jpg'><img class = '' src = 'media/jpg/SE_AGraphicTone_IC_IMG_5464_V1_15x20_Final.jpg'><img class = '' src = 'media/jpg/SE_AGraphicTone_TO_IMG_5479_V1_15x29_Final.jpg'><img class = '' src = 'media/jpg/SE_AGraphicTone_GRAPH_IMG_5473_V1_15x65_Final.jpg'><img class = '' src = 'media/jpg/SE_AGraphicTone_E_IMG_5463_V1_13x15_Final.jpg'><img class = '' src = 'media/jpg/SE_AGraphicTone_N_IMG_5502_V1_15x15_Final.jpg'>
		</div>
		<div id = 'image-holder-25' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/SE_OnSong_on_VOG_15x18_Final.jpg'>
		</div>
		<div id = 'image-holder-26' class = 'image-holder centered' images=''>
			<img class = '' src = 'media/jpg/SE_OnSong_song_G_V3_8x15_Final.jpg'>
		</div>
		<div id = 'image-holder-27' class = 'image-holder overlap-image-holder' zindex='1'>
			<img class = '' src = 'media/jpg/SE_Record_IMG_5615_V2_42x50_Final.jpg'><img class = '' src = 'media/jpg/SE_OnSong_on_VOG_15x18_Final.jpg'><img class = '' src = 'media/jpg/SE_OnTrespassing_no_VOG_15x18_Final.jpg'><img class = '' src = 'media/jpg/SE_OnTrespassing_no_VOG_15x18_Final_1.jpg'><img class = '' src = 'media/jpg/SE_OnTrespassing_pass_V2_15x31_Final.jpg'><img class = '' src = 'media/jpg/SE_OnTrespassing_tres_VOG_15x32_Final.jpg'><img class = '' src = 'media/jpg/SE_OnTrespassing_Sing_V3_15x30_Final.jpg'><img class = '' src = 'media/jpg/SE_OnTrespassing_ing_V2_15x22_Final.jpg'>
		</div>
		<div id = 'image-holder-39' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/hot-field-sec-1.jpg'>
		</div>
		<div id = 'image-holder-40' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/hot-field-sec-2.jpg'>
		</div>
		<div id = 'image-holder-28' class = 'image-holder' images=''>
			<img class = '' src = 'media/jpg/SE_Section_3_WetWords_V3_118x178.jpg'>
		</div>
		<div id = 'image-holder-38' class = 'image-holder image-float-container' images=''>
			<img class = '' src = 'media/jpg/quick_IMG_6114.jpg'>
		</div>
		<div id = 'audio-holder-3' class = 'audio-holder'>
			<audio id = 'audio-4' controls>
				<source src="media/audio/all-at-once-1-4.mp3" type = 'audio/mp3'>
			</audio>
		</div>
	</div>
</section>
<a id = 'print' href = "javascript:popup('print');"></a>
<form id="filename-form" method="post" action="/zoom-in" target="_blank">
	<input id="filename-input" type="hidden" name="image-filename">
</form>
<script>
	var imgs = document.querySelectorAll('#image-container img');
	var window_zoom;
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
</script>
<!-- <button id = 'print'></button>
<script src="/static/js/bindery.min.js"></script>
<script>
	var print = document.getElementById('print');
	print.addEventListener('click', function(){
		Bindery.makeBook({ 
			content: '#main',
			pageSetup: {
				size: { width: '8.5in', height: '11in' },
				margin: { top: '0.5in', inner: '1.25in', outer: '0.25in', bottom: '0.5in' },
			},
			printSetup: {
			    // layout: Bindery.Layout.BOOKLET,
			    // paper: Bindery.Paper.LETTER_PORTRAIT,
			    marks: Bindery.Marks.CROP,
			    bleed: '12pt',
			},
			rules: [
		      Bindery.PageBreak(
		      	{ selector: '.page-breaker', position: 'before', continue:'right' }
	      	),
		    ], 
		});

	});
  
</script> -->
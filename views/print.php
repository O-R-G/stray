<?
	// $text_id = end($oo->urls_to_ids(array('text')));
	// $text = $oo->get($text_id)['body'];
	$text = $item['body'];
?>
<div id = 'print_content'>
	<section class = 'print-content'>
		<!-- <ul id = 'chapter-nav'>
			<li><a href = "#head1">I.</a></li><li><a href = "#head2">II.</a></li><li><a href = "#head3">III.</a></li><li><a href = "#head4">IV.</a></li><li><a href = "#head5">V.</a></li><li><a href = "#head6">VI.</a></li>
		</ul> -->
		<div id = 'image-container' class = 'window-container'>
			<div id = 'image-text-container'><?= $text; ?></div>
			<div id = 'image-chapter-1' class= 'image-chapter'>
				<div id = 'image-holder-1' class = 'image-holder inline-image-holder' images='2'>
					<img class = '' src = 'media/jpg/STRAY-NM.jpg'><img class = '' src = 'media/jpg/STRAY-SH.jpg'>
				</div>
				<div id = 'image-holder-2' class = 'image-holder' images=''>
					<img class = '' src = 'media/jpg/PHOTORAMA_10-inch.jpg'>
				</div>
				<div id = 'image-holder-3' class = 'image-holder' images=''>
					<img class = '' src = 'media/jpg/TEMPLE-HIGH-AND-LO-20x13_10-inches.jpg'>
				</div>
				<div id = 'image-holder-4' class = 'image-holder centered' images=''>
					<img class = '' src = 'media/jpg/signal-escapes-2.jpg'>
				</div>
				<div id = 'image-holder-5' class = 'image-holder inline-image-holder' images='8'>
					<img class = '' src = 'media/jpg/6-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/1-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/7-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/FRIENDS-IN-DEED-63x-fnl_10-inch.jpg'><img class = '' src = 'media/jpg/3-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/5-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/4-FRIENDS-IN-DEED_10-inch.jpg'><img class = '' src = 'media/jpg/2-FRIENDS-IN-DEED_10-inch.jpg'>
				</div>
				<div id = 'audio-holder-1'>
					<audio controls>
						<source src="media/audio/NATE_DogonEclipse_30minloop.mp3" type="audio/mp3">
					</audio>
				</div>
				<div id = 'image-holder-6' class = 'image-holder' images=''>
					<img class = '' src = 'media/jpg/Grace-Walking-and-Talking.jpg'>
				</div>
				<div id = 'image-holder-7' class = 'image-holder inline-image-holder' images='2'>
					<img class = '' src = 'media/jpg/TREE-ELLIPSE-1-IMG_0431-fnl-16INCHES_10-inches.jpg'><img class = '' src = 'media/jpg/TREE-ELLIPSE-2_10-inches.jpg'>
				</div>
				<div id = 'image-holder-8' class = 'image-holder overlap-image-holder' zindex='-1'>
					<img class = '' src = 'media/jpg/SEVEN-SLEEPERS-DOOR.jpg'>
				</div>
				<div id = 'image-holder-9' class = 'image-holder inline-image-holder' images='3'>
					<img class = '' src = 'media/jpg/seven-sleepers-FNL-1-working-FNL-FNL.jpg'><img class = '' src = 'media/jpg/seven-sleepers-FNL-2-working-FNL-FNL.jpg'><img class = '' src = 'media/jpg/seven-sleeprs-FNL-3-working-FNL-FNL.jpg'>
				</div>
				<div id = 'image-holder-10' class = 'image-holder overlap-image-holder' zindex='-1'>
					<img class = '' src = 'media/jpg/SE_bside_INVERTED_V3_16x18_Final.jpg'>
				</div>
				<div id = 'image-holder-11' class = 'image-holder' images=''>
					<img class = '' src = 'media/jpg/SE_Shaker_HIRES_LAYOUT_V2_57x78_Final.jpg'>
				</div>
				<div id = 'image-holder-12' class = 'image-holder' images=''>
					<img class = '' src = 'media/jpg/quick_IMG_2222.jpg'>
				</div>
				<div id = 'image-holder-13' class = 'image-holder centered' images=''>
					<img class = '' src = 'media/jpg/ghost-song.jpg'>
				</div>
				<div id = 'image-holder-14' class = 'image-holder inline-image-holder' images='3'>
					<img class = '' src = 'media/jpg/bird-1_10-inch.jpg'><img class = '' src = 'media/jpg/bird-2_10-inch.jpg'><img class = '' src = 'media/jpg/bird-3_10-inch.jpg'><img class = '' src = 'media/jpg/bird-4_10-inch.jpg'><img class = '' src = 'media/jpg/bird-5_10-inch.jpg'><img class = '' src = 'media/jpg/bird-6_10-inch.jpg'><img class = '' src = 'media/jpg/bird-7_10-inch.jpg'>
				</div>
				<div id = 'image-holder-15' class = 'image-holder overlap-image-holder' zindex='1'>
					<img class = '' src = 'media/jpg/SE_cc_ps_grain_IMG_5756_VOG_26x40_Final.jpg'><img class = '' src = 'media/jpg/SE_cc_ps_grain_IMG_5762_V1_26x40_Final.jpg'><img class = '' src = 'media/jpg/SE_cc_ps_grain_IMG_5758_V1_26x40_Final.jpg'>
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
				<div id = 'image-holder-28' class = 'image-holder' images=''>
					<img class = '' src = 'media/jpg/SE_Section_3_WetWords_V3_118x178.jpg'>
				</div>
			</div>
		</div>
	</section>
	<section id="print-content-text" class = 'print-content'>
		<!-- <ul id = 'chapter-nav'>
			<li><a href = "#head1">I.</a></li><li><a href = "#head2">II.</a></li><li><a href = "#head3">III.</a></li><li><a href = "#head4">IV.</a></li><li><a href = "#head5">V.</a></li><li><a href = "#head6">VI.</a></li>
		</ul> -->
	    <div id = 'text-container' class = 'window-container'><?
	            echo $text;
	    ?></div>
	</section>
</div>
<script src="/static/js/bindery.min.js"></script>
<script>
	Bindery.makeBook({ 
		content: '#print_content',
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
		// rules: [
	 //      Bindery.PageBreak(
	 //      	{ selector: '.page-breaker', position: 'before', continue:'right' }
  //     	),
	 //    ], 

	});
	window.addEventListener('load', function(){
		setTimeout(function(){
			var spread = document.getElementsByClassName('📖-spread-wrapper');
		var left_pages = [];
		var left_pages_div = document.createElement('DIV');
		var right_pages = [];
		var right_pages_div = document.createElement('DIV');
		var cover = document.createElement('DIV');
		cover.innerHTML = '<h1>COVER</h1>';
		cover.className = '📖-page 📖-right';
		right_pages_div.appendChild(cover);
		// right_pages.push(cover);
		var last = document.createElement('DIV');
		last.innerHTML = '<h1>BACK</h1>';
		last.className = '📖-page 📖-left';
		
		console.log('spread length = '+spread.length);
		if(spread.length % 2 != 0){
			for(i = 0; i < parseInt(spread.length / 2 - 1); i++)
			{
				var pages = spread[i].querySelectorAll('.📖-page');
				[].forEach.call(pages, function(el, i){
					// console.log(el);
					var thisPage = el.cloneNode(true);
					if(thisPage.classList.contains('📖-right')){
						thisPage.classList.remove('📖-right');
						thisPage.classList.add('📖-left');
					}
					left_pages_div.appendChild(thisPage);
					// left_pages.push(thisPage);
				});
			}
			console.log('left pages length after first loop = '+left_pages_div.childNodes.length);
			var pages = spread[parseInt((spread.length / 2))+1].querySelectorAll('.📖-page');
			[].forEach.call(pages, function(el, i){
				// console.log(el);
				var thisPage = el.cloneNode(true);
				console.log(thisPage);
				if(thisPage.classList.contains('📖-right'))
					right_pages_div.appendChild(thisPage);
					// right_pages.push(thisPage);
				else
					left_pages_div.appendChild(thisPage);
					// left_pages.push(thisPage);
			});
			left_pages_div.appendChild(last);
			// left_pages.push(last);
			for(i = parseInt((spread.length / 2))+2; i < spread.length; i++)
			{
				var pages = spread[i].querySelectorAll('.📖-page');
				[].forEach.call(pages, function(el, i){
					// console.log(el);
					var thisPage = el.cloneNode(true);
					if(thisPage.classList.contains('📖-left')){
						thisPage.classList.remove('📖-left');
						thisPage.classList.add('📖-right');
					}
					right_pages_div.appendChild(thisPage);
					// right_pages.push(thisPage);
				});
			}
			console.log('left pages length = '+left_pages_div.childNodes.length);
			console.log('right pages length = '+right_pages_div.childNodes.length);
			console.log('spread length = '+spread.length);
			var left_pages_div_clone = left_pages_div.cloneNode(true);
			var right_pages_div_clone = right_pages_div.cloneNode(true);
			console.log(right_pages_div_clone.childNodes[1]);
			[].forEach.call(spread, function(el, i){
				// console.log(i);
				// var left_page = document.createElement('DIV');
				// left_page.innerHTML = left_pages[i];
				// el.appendChild(left_page);
				// console.log(left_pages_div.childNodes.length);
				el.innerHTML = '';
				// console.log(left_pages_div_clone.firstChild);
				if(left_pages_div_clone.firstChild !== null)
					el.appendChild(left_pages_div_clone.firstChild);
				if(right_pages_div_clone.firstChild !== null)
					el.appendChild(right_pages_div_clone.firstChild);
				// el.innerHTML = el.innerHTML + right_pages[i];
				// el.appendChild(left_pages[i]);
				// el.appendChild(right_pages[i]);
			});
			
		}
		else
		{

		}
		var print_button = document.querySelector('button.📖-btn-print');
		print_button.addEventListener('click', function(){
			console.log('click print');
			left_pages_div_clone = left_pages_div.cloneNode(true);
			right_pages_div_clone = right_pages_div.cloneNode(true);

			var print_sheet_right = document.getElementsByClassName('📖-print-sheet-right');
			console.log(print_sheet_right.length);
			[].forEach.call(print_sheet_right, function(el, i){
				console.log('raplaceing');
				var toReplace = el.getElementsByClassName('📖-right');
				el.parentNode.replaceChild(right_pages_div_clone.firstChild, toReplace);
			});

			var print_sheet_left = document.getElementsByClassName('📖-print-sheet-left');
			[].forEach.call(print_sheet_left, function(el, i){
				var toReplace = el.getElementsByClassName('📖-left');
				el.parentNode.replaceChild(left_pages_div_clone.firstChild, toReplace);
			});
		});
		}, 2000);
		
		
	});
	
</script>
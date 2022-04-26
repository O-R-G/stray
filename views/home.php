<? 
	$text_plain = getPlainRadioText();
	$text_plain_arr = mb_str_split($text_plain);
	$text_plain_extended = '';
	foreach($text_plain_arr as $letter)
	{
		// if($letter != ' ')
		// {
		// 	$text_plain_extended .= $letter . $letter . $letter;
		// }
		// else
		// {
		// 	$text_plain_extended .= ' ';
		// }
		$text_plain_extended .= $letter . $letter . $letter;
	}
	
	/*
	// export txt files for stray-server
	$radio_word_extended_text_file = fopen("static/data/text_extended.txt", "w") or die ("Unable to opeb file!");
	fwrite($radio_word_extended_text_file, $text_plain_extended);
	fclose($radio_word_extended_text_file);

	$radio_word_text_file = fopen("static/data/text.txt", "w") or die ("Unable to opeb file!");
	fwrite($radio_word_text_file, $text_plain);
	fclose($radio_word_text_file);
	*/
	$text_plain_escape = htmlspecialchars($text_plain, ENT_QUOTES);
	$text_plain_extended_escape = htmlspecialchars($text_plain_extended, ENT_QUOTES);

	$letter_image_filenames = scandir('media/letters');
	$filenum_arr = array();
	foreach($letter_image_filenames as $filename){
		if(substr($filename, 0, 1) != '.'){
			$this_key = explode('-', $filename);
			$this_key = $this_key[0];
			if(isset($filenum_arr[$this_key]))
				$filenum_arr[$this_key] ++;
			else
				$filenum_arr[$this_key] = 1;
		}
	}

	// get images size
	$example_image_url = 'media/letters/A-0.jpg';
	$example_image_size = getimagesize($example_image_url);
	// h / w
	$image_r = $example_image_size[1] / $example_image_size[0];

	$text_plainIsExtended = isset($_GET['textIsExtended']);
?>
<div id = 'radio_container'>
	<div id="duo_btn" class="window_btn"></div>
	<div id="mobile_btn" class="window_btn"></div>
	<!-- <div id="text_btn" class="window_btn">
		<div id="image_btn" class="window_btn"></div>
	</div> -->
	
	<div id="radio_slide_0" class="radio_slide not_current">
		<p id='radio_text_0' class='radio_text'></p>
		<img id = 'radio_image_0' class = 'radio_image'>
	</div>
	<div id="radio_slide_1" class="radio_slide not_current">
		<p id='radio_text_1' class='radio_text'></p>
		<img id = 'radio_image_1' class = 'radio_image'>
	</div>
	<div id="radio_slide_2" class="radio_slide not_current">
		<p id='radio_text_2' class='radio_text'></p>
		<img id = 'radio_image_2' class = 'radio_image'>
	</div>
</div>
<div id = "text" style="display:none"><?= $text_plain; ?></div>
<div id = 'nav'>
<a href = 'javascript:popup("appendix", "", "")'>APPENDIX</a>
<a href = 'javascript:popup("colophon", "", "")'>COLOPHON</a>
<a href = 'javascript:popup("afterword", "", "")'>AFTERWORD</a>
<a href = 'javascript:popup("instructions-for-use", "", "")'>INSTRUCTIONS FOR USE</a>
</div>
<script>

	var current_letter;
	var text_plain = '<?= $text_plain_escape; ?>';
	var text_plain_extended = '<?= $text_plain_extended_escape; ?>';
	var radio_image = document.getElementsByClassName('radio_image');
	var radio_slide = document.getElementsByClassName('radio_slide');
	var radio_slide_0 = document.getElementById('radio_slide_0');
	var radio_slide_1 = document.getElementById('radio_slide_1');
	var radio_slide_2 = document.getElementById('radio_slide_2');
	var radio_image_0 = document.getElementById('radio_image_0');
	var radio_image_1 = document.getElementById('radio_image_1');
	var radio_image_2 = document.getElementById('radio_image_2');
	var radio_text_0 = document.getElementById('radio_text_0');
	var radio_text_1 = document.getElementById('radio_text_1');
	var radio_text_2 = document.getElementById('radio_text_2');
	var image_counter = 0;
	var loop_timer = null;
	var isPlaying = false;

	var filenum_arr = <? echo json_encode($filenum_arr); ?>;
	var letter_display_arr = [];
	var previous_char = '';
	var saved_order = [];

	var textIsExtended = <?= json_encode($text_plainIsExtended); ?>;
	var textToFeed = textIsExtended ? text_plain_extended : text_plain;

	var image_r = <?= $image_r; ?>;
	var wH = window.innerHeight;
	var image_h = wH - 40;
	var image_w = image_h / image_r;

	var isNoto = <?= json_encode($isNoto); ?>;

	var sWindow_btn = document.getElementsByClassName('window_btn');
	[].forEach.call(sWindow_btn, (el, i)=>{
		el.style.width = image_w + 'px';
		if(el.id == 'duo_btn')
		{
			el.addEventListener('click', ()=>open_duo());
		}
		// else if(el.id == 'text_btn')
		// {
			
		// 	el.addEventListener('click', function(){
		// 		setTimeout(function(){
		// 			console.log('click text btn');
		// 			open_duo();
		// 		}, 1000);
		// 		// open_duo();
				
		// 	});
		// }
		// else if(el.id == 'image_btn')
		// {
			
		// 	el.addEventListener('click', function(){
		// 		console.log('click image btn');
		// 		open_duo();
		// 	});
		// }
		else if(el.id == 'mobile_btn')
		{
			el.addEventListener('click', ()=>{popup('mobile')});
		}
	});


	function format_img_display(letter){
		// if(main_fuse > 100)
			// return false;
		// main_fuse++;
		var this_letter = letter.toUpperCase();
		if(this_letter == '&')
			this_letter = 'ampersand';
		else if(this_letter == '.')
			this_letter = 'period';
		else if(this_letter == ',')
			this_letter = 'comma';
		else if(this_letter == '#')
			this_letter = 'hash';
		else if(this_letter == '/')
			this_letter = 'slash';
		else if( !isAlphabetic(this_letter))
		{
			if(isNoto)
				return this_letter;
			else
				return ' ';
		}

		var this_max = filenum_arr[this_letter];
		var letter_order = Math.floor(Math.random() * Math.floor(this_max));
		
		while( (saved_order.includes(letter_order) && saved_order.length < this_max-1) || isNaN(letter_order) ){
			letter_order = Math.floor(Math.random() * Math.floor(this_max));
		}
		saved_order.push(letter_order);
		var output = 'media/letters/'+this_letter+'-'+letter_order+'.jpg';

		return output;
	}
	
	// request json
	if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
	    var httpRequest = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE 6 and older
	    var httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
	}
	function loop_letters(c_letter, words, display_arr, isInitialed = true){
		if(!isInitialed)
		{
			var first_display = display_arr[c_letter];
			c_letter++;
			if(c_letter >= words.length)
				c_letter = 0;
			var next_display = display_arr[c_letter];
			c_letter++;
			if(c_letter >= words.length)
				c_letter = 0;
			var nextnext_display = display_arr[c_letter];
			if(first_display['type'] === 'whitespace'){
				radio_slide_0.setAttribute('display_type', 'whitespace');
			}
			else if(first_display['type'] === 'image'){
				radio_slide_0.setAttribute('display_type', 'image');
				radio_image_0.src = first_display['content'];
			}
			else
			{
				if(isNoto)
				{
					radio_slide_0.setAttribute('display_type', 'text');
					radio_text_0.innerText = first_display['content'];
				}
				else{
					radio_slide_0.setAttribute('display_type', 'whitespace');
				}
			}

			if(next_display['type'] === 'whitespace')
				radio_slide_1.setAttribute('display_type', 'whitespace');
			else if(next_display['type'] === 'image'){
				radio_slide_1.setAttribute('display_type', 'image');
				radio_image_1.src = next_display['content'];
			}
			else
			{
				if(isNoto)
				{
					radio_slide_1.setAttribute('display_type', 'text');
					radio_text_1.innerText = next_display['content'];
				}
				else{
					radio_slide_1.setAttribute('display_type', 'whitespace');
				}
			}

			if(nextnext_display['type'] === 'whitespace'){
				radio_slide_2.setAttribute('display_type', 'whitespace');
			}
			else if(nextnext_display['type'] === 'image'){
				radio_slide_2.setAttribute('display_type', 'image');
				radio_image_2.src = nextnext_display['content'];
			}
			else
			{
				if(isNoto)
				{
					radio_slide_2.setAttribute('display_type', 'text');
					radio_text_2.innerText = nextnext_display['content'];
				}
				else
					radio_slide_2.setAttribute('display_type', 'whitespace');
			}

			setTimeout(function(){
				radio_slide_0.classList.remove('not_current');
			}, 0);
		}
		else
		{
			image_counter++;
			var current_slide = radio_slide[image_counter%3];
			// var last_image = radio_image[(image_counter - 1) % 3];
			var nextnext_slide = radio_slide[(image_counter + 2) % 3];
			var nextnext_display = display_arr[c_letter];
			var nextnext_image = nextnext_slide.querySelector('img');
			var nextnext_text = nextnext_slide.querySelector('p');

			current_slide.classList.remove('not_current');
			// next_image.classList.add('not_current');
			nextnext_slide.classList.add('not_current');

			if(nextnext_display['type'] == 'whitespace'){
				nextnext_slide.setAttribute('display_type', 'whitespace');
				// nextnext_slide.classList.add('whitespace');
			}
			else if(nextnext_display['type'] === 'image'){
				nextnext_slide.setAttribute('display_type', 'image');
				nextnext_image.src = nextnext_display['content'];
			}
			else{
				if(isNoto)
				{
					nextnext_slide.setAttribute('display_type', 'text');
					nextnext_slide.classList.remove('whitespace');
					nextnext_text.innerText = nextnext_display['content'];
				}
				else
				{
					nextnext_slide.setAttribute('display_type', 'whitespace');
					// nextnext_slide.classList.add('whitespace');
				}
			}
		}
		
		c_letter++;
		if(c_letter >= words.length){
			preload(0, textToFeed, filenum_arr, previous_char);
			c_letter = 0;
		}
		return c_letter;
	}
	function preload(init_index = 0, words, num_arr, prev_char){
		letter_display_arr = [];
		var words_length = words.length;
		var preload_index = init_index;
		for(i = 0; i < words_length; i++)
		{
			var this_letter = words[i].toUpperCase();
			if(this_letter !== prev_char)
				saved_order = [];
			prev_char = this_letter;
			
			var this_letter_display = format_img_display(this_letter);
			if(this_letter_display === ' '){
				var this_display = {
					'type': 'whitespace',
					'content': ' '
				};
			}
			else if(this_letter_display != this_letter){
				var this_display = {
					'type': 'image',
					'content': this_letter_display
				};
			}
			else
			{
				var this_display = {
					'type': 'text',
					'content': this_letter_display
				};
			}
			letter_display_arr.push(this_display);
		}
		var preload_img = new Image();
		preload_img.onload = function(){
			preload_index++;
			if(preload_index < words_length)
			{
				preload_img.src = letter_display_arr[preload_index];
			}
		}
		preload_img.src = letter_display_arr[preload_index];
	}
	httpRequest.onreadystatechange = function(){
		
		if (httpRequest.readyState === XMLHttpRequest.DONE) {
			
	      if (httpRequest.status === 200) {	
      		var response = JSON.parse(httpRequest.responseText);
      		
      		if(response){
      // 			if(textIsExtended)
      // 				current_letter = response['current_pos_extended'];
  				// else
      // 				current_letter = response['current_pos'];
      			current_letter = response['current_pos'];
      			var wait = 1000 - (Date.now() % 1000);
      			current_letter++;
      			if(current_letter >= textToFeed.length)
      				current_letter = 0;
      			preload(current_letter, textToFeed, previous_char);
      			setTimeout(function(){
      				current_letter = loop_letters(current_letter, textToFeed, letter_display_arr, false);
      				// already current++ when initiating loop_letters();
      				// so "current_letter" is actually the next next index to preload
      				// current_letter = (current_letter + 2) % text.length;
      				if(textIsExtended)
      				{
      					loop_timer = setInterval(function(){
	      					isPlaying = true;
	      					current_letter = loop_letters(current_letter, textToFeed, letter_display_arr);
	      				}, 333);
      				}
      				else
      				{
      					loop_timer = setInterval(function(){
	      					isPlaying = true;
	      					current_letter = loop_letters(current_letter, textToFeed, letter_display_arr);
	      				}, 1000);
      				}
      				
      				
      			}, wait);
      		}
	      }
	    }
	};
	httpRequest.open('GET', 'https://strayworld.sourcetype.com/now');
	httpRequest.send();
	// [].forEach.call(radio_image, function(el, i){
	// 	if(!hasTouchScreen){
	// 		el.addEventListener('click', ()=>open_duo());
	// 	}
	// 	else{
	// 		el.addEventListener('click', ()=>{popup('mobile')});
	// 	}
	// });

	window.addEventListener('keydown', event => {
		if(event.keyCode == '32'){
			loop_timer = pauseplay();
		}
	});

	function pauseplay(){
		if(isPlaying)
		{
			isPlaying = false;
			clearInterval(loop_timer);
			return null;
		}
		else
		{
			isPlaying = true;
			if(textIsExtended)
				var interval = 333;
			else
				var interval = 1000;

			return setInterval(function(){
					current_letter = loop_letters(current_letter, textToFeed, letter_display_arr);
			    }, interval);
		}
	}

</script>
<script src="/static/js/resize.js"></script>

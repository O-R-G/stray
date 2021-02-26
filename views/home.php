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

	$text_plainIsExtended = isset($_GET['textIsExtended']);
?>
<div id = 'radio_container'>
	<img id = 'radio_image_0' class = 'radio_image not_current'>
	<img id = 'radio_image_1' class = 'radio_image not_current'>
	<img id = 'radio_image_2' class = 'radio_image not_current'>
</div>
<div id = "text" style="display:none"><?= $text_plain; ?></div>
<div id = 'nav'><a href = 'javascript:popup("colophon", "", "")'>COLOPHON</a></div>
<script>
	var current_letter;
	var text_plain = '<?= $text_plain_escape; ?>';
	var text_plain_extended = '<?= $text_plain_extended_escape; ?>';
	var radio_image = document.getElementsByClassName('radio_image');
	var radio_image_0 = document.getElementById('radio_image_0');
	var radio_image_1 = document.getElementById('radio_image_1');
	var radio_image_2 = document.getElementById('radio_image_2');
	var image_counter = 0;
	var loop_timer = null;
	var isPlaying = false;

	var filenum_arr = <? echo json_encode($filenum_arr); ?>;
	var src_arr = [];
	var previous_char = '';
	var saved_order = [];

	var textIsExtended = <?= json_encode($text_plainIsExtended); ?>;
	var textToFeed = textIsExtended ? text_plain_extended : text_plain;

	function format_img_src(letter){
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
		else if(this_letter == ' ')
			return 'whitespace';

		var this_max = filenum_arr[this_letter];
		var letter_order = Math.floor(Math.random() * Math.floor(this_max));
		if()
		var fuse = 0;
		while(saved_order.includes(letter_order) || isNaN(letter_order)){
			letter_order = Math.floor(Math.random() * Math.floor(this_max));
			fuse++;
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
	function loop_letters(c_letter, words, srcs, isInitialed = true){
		if(!isInitialed)
		{
			var first_src = srcs[c_letter];
			c_letter++;
			if(c_letter >= words.length)
				c_letter = 0;
			var next_src = srcs[c_letter];
			c_letter++;
			if(c_letter >= words.length)
				c_letter = 0;
			var nextnext_src = srcs[c_letter];
			if(first_src == 'whitespace')
				radio_image_0.classList.add('whitespace');
			else
				radio_image_0.src = first_src;

			if(next_src == 'whitespace')
				radio_image_1.classList.add('whitespace');
			else
				radio_image_1.src = next_src;

			if(nextnext_src == 'whitespace')
				radio_image_2.classList.add('whitespace');
			else
				radio_image_2.src = nextnext_src;

			setTimeout(function(){
				radio_image_0.classList.remove('not_current');
			}, 0);
		}
		else
		{
			image_counter++;
			var current_image = radio_image[image_counter%3];
			// var last_image = radio_image[(image_counter - 1) % 3];
			var nextnext_image = radio_image[(image_counter + 2) % 3];
			var nextnext_src = srcs[c_letter];

			current_image.classList.remove('not_current');
			// next_image.classList.add('not_current');
			nextnext_image.classList.add('not_current');

			if(nextnext_src == 'whitespace')
				nextnext_image.classList.add('whitespace');
			else{
				nextnext_image.classList.remove('whitespace');
				nextnext_image.src = nextnext_src;
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
		src_arr = [];
		var words_length = words.length;
		var preload_index = init_index;
		for(i = 0; i < words_length; i++)
		{
			var this_letter = words[i].toUpperCase();
			if(this_letter !== prev_char)
				saved_order = [];
			prev_char = this_letter;
			// console.log(this_letter);
			src_arr.push(format_img_src(this_letter));
		}
		var preload_img = new Image();
		preload_img.onload = function(){
			preload_index++;
			if(preload_index < words_length)
			{
				preload_img.src = src_arr[preload_index];
			}
		}
		// console.log(preload_index, src_arr[preload_index]);
		preload_img.src = src_arr[preload_index];
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
      			console.log(current_letter);
      			if(current_letter >= textToFeed.length)
      				current_letter = 0;
      			
      			preload(current_letter, textToFeed, previous_char);
      			setTimeout(function(){
      				current_letter = loop_letters(current_letter, textToFeed, src_arr, false);
      				// already current++ when initiating loop_letters();
      				// so "current_letter" is actually the next next index to preload
      				// current_letter = (current_letter + 2) % text.length;
      				if(textIsExtended)
      				{
      					loop_timer = setInterval(function(){
	      					isPlaying = true;
	      					current_letter = loop_letters(current_letter, textToFeed, src_arr);
	      				}, 333);
      				}
      				else
      				{
      					loop_timer = setInterval(function(){
	      					isPlaying = true;
	      					current_letter = loop_letters(current_letter, textToFeed, src_arr);
	      				}, 1000);
      				}
      				
      				
      			}, wait);
      		}
	      }
	    }
	};
	httpRequest.open('GET', 'https://stray.o-r-g.net/now');
	httpRequest.send();
	console.log(hasTouchScreen);
	[].forEach.call(radio_image, function(el, i){
		if(!hasTouchScreen){
			el.addEventListener('click', ()=>open_duo());
		}
		else
			el.addEventListener('click', ()=>popup('mobile'));
	});

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
					current_letter = loop_letters(current_letter, textToFeed, src_arr);
			    }, interval);
		}
	}

</script>

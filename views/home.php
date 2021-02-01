<? 
	$text_id = end($oo->urls_to_ids(array('text-radio')));
	$text_item = $oo->get($text_id);

	$radio_words_raw = $text_item['body'];
	$radio_words_raw = str_replace("</div><div>", " ", $radio_words_raw);
	$radio_words_raw = preg_replace("/<br\W*?\/?>/", " ", $radio_words_raw);
	$radio_words_raw = strip_tags($radio_words_raw);
	$radio_words_raw = str_replace(", ", ",,, ", $radio_words_raw);
	// $radio_words_raw = preg_replace("/\w\./", "... ", $radio_words_raw);
	// $radio_words_raw = str_replace(". ", "... ", $radio_words_raw);
	$radio_words = htmlspecialchars($radio_words_raw, ENT_QUOTES);
	// var_dump(strlen($radio_words));
	while(ord(substr($radio_words, strlen($radio_words)-1)) == 9  || 
		  ord(substr($radio_words, strlen($radio_words)-1)) == 10  || 
		  ord(substr($radio_words, strlen($radio_words)-1)) == 13)
	{
		$radio_words = substr($radio_words, 0, strlen($radio_words)-1);
	}

	$radio_words = substr($radio_words, 0, 50942);
	$test = "'";
	$test_2 = htmlspecialchars($test, ENT_QUOTES);
	// var_dump($test_2);
	// var_dump($radio_words);
	// for($i = 0; $i < )

	
	// foreach($radio_words_raw as $chapter){
	// 	$chapter_temp = str_replace(' | ', ' ', $chapter);
	// 	$radio_words .= $chapter_temp . ' ';
	// }

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
?>
<div id = 'radio_container'>
	<img id = 'radio_image_0' class = 'radio_image not_current'>
	<img id = 'radio_image_1' class = 'radio_image not_current'>
	<img id = 'radio_image_2' class = 'radio_image not_current'>
</div>
<div id = 'nav'><a href = 'javascript:popup("colophon", "", "")'>COLOPHON</a></div>
<script>
	var current_letter;
	var radio_words = '<?= $radio_words; ?>';
	// console.log(radio_words.length);
	var radio_image = document.getElementsByClassName('radio_image');
	var radio_image_0 = document.getElementById('radio_image_0');
	var radio_image_1 = document.getElementById('radio_image_1');
	var radio_image_2 = document.getElementById('radio_image_2');
	var image_counter = 0;
	var loop_timer = null;
	var isPlaying = false;

	var filenum_arr = <? echo json_encode($filenum_arr); ?>;
	var src_arr = [];
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
		// console.log(words[c_letter]);
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
			preload(0, radio_words, filenum_arr);
			c_letter = 0;
		}
		return c_letter;
	}
	function preload(init_index = 0, words, num_arr){
		src_arr = [];
		var words_length = words.length;
		var preload_index = init_index;
		for(i = 0; i < words_length; i++)
		{
			var this_letter = words[i].toUpperCase();
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
      			current_letter = response['current_pos'];
      			var wait = 1000 - (Date.now() % 1000);
      			current_letter++;
      			if(current_letter >= radio_words.length)
      				current_letter = 0;
      			preload(current_letter, radio_words);
      			setTimeout(function(){
      				current_letter = loop_letters(current_letter, radio_words, src_arr, false);
      				// already current++ when initiating loop_letters();
      				// so "current_letter" is actually the next next index to preload
      				current_letter = (current_letter + 2) % radio_words.length;
      				
      				loop_timer = setInterval(function(){
      					isPlaying = true;
      					current_letter = loop_letters(current_letter, radio_words, src_arr);
      				}, 1000);
      				
      			}, wait);
      		}
	      }
	    }
	};
	httpRequest.open('GET', 'https://stray.o-r-g.net/now');
	httpRequest.send();
	[].forEach.call(radio_image, function(el, i){
		el.addEventListener('click', ()=>open_duo());
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
			return setInterval(function(){
      					current_letter = loop_letters(current_letter, radio_words, src_arr);
      			    }, 1000);
		}
	}

</script>

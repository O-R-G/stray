/*
    collect and assemble msg[] for matrix.js
    includes cacheing
*/

var wH = window.innerHeight;
var wW = window.innerWidth;

// date / time

Date.prototype.today = function () {
    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    return days[this.getDay()] + " " + this.getDate() + " " + months[this.getMonth()] + " " + this.getFullYear();
}
Date.prototype.now = function () {
     return this.hour() + ":" + this.minute() +":"+ this.second();
}
Date.prototype.hour = function () {
     return ((this.getHours() < 10)?"0":"") + this.getHours();
}
Date.prototype.minute = function () {
     return ((this.getMinutes() < 10)?"0":"") + this.getMinutes();
}
Date.prototype.second = function () {
    return ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
}
function get_time(){
    var d = new Date();
	return [d.today().toUpperCase(), d.now().toUpperCase()];
}

var now = new Date();
var now_hr = now.hour();
var now_min = now.minute();
var now_sec = now.second();
var now_msec = now.getMilliseconds();

var sDisplay = document.getElementById('display');
var sDisplay_img = document.getElementById('display_img');
var sControl_display = document.getElementById('control_display');

var display_w = sDisplay.offsetWidth;
var display_h = sDisplay.offsetHeight;
var display_r = display_h / display_w;
var img_r = 1;
var img_preload = new Image();
var img_src = '';

var timer_interval, timer_timeout, timer_control;
var interval;
var remain;
var current_position, slide_length, current_chapter;
var chapters_beginnings = [];

// slideshow control
var speed_min = 10000;
var speed_max = 1;
var speed_interval = 500;
var current_speed;
var pause_start = false;
var slide_start;

var poem_arr;
var full_length;

var sBlack_screen = document.getElementById('black_screen');
var sBlack_screen_text = sBlack_screen.querySelector('p');

var media_folios = [];
var current_chapter = false; // 1-8
var response;
function handle_msgs(name, res, results_count = false){
	response = res;
	if(name == 'slide-text'){
		if(chapter)
		{

			var this_chapter = response['chapter_'+chapter];
			current_position = 0;
			interval = response['slide_text_duration'];
			full_length = this_chapter['length'];

			media_folios = get_media_folios(chapter);
			
		}
		else if(type == 'entire')
		{
			current_position = response['entire']['current_slide'];
			interval = response['slide_text_duration'];
			var pages_num_temp = 0;
			
			// for testing
			if(testchapter == 2)
				current_position = 587;
			else if (testchapter == 'last')
				current_position = 1435;
			
			for(i = 0 ; i < sections_info.length ; i++){
				pages_num_temp += response['chapter_'+(i+1)]['length'];
				if(!current_chapter && current_position < pages_num_temp){
					current_chapter = i+1;
					current_position = current_position - pages_num_temp + response['chapter_'+(i+1)]['length'];
					full_length = response['chapter_'+current_chapter]['length'];
					media_folios = get_media_folios(current_chapter);
					break;
				}
			}
			sDisplay.setAttribute('chapter', current_chapter);
			// console.log('current chapter = '+current_chapter);
			// console.log('chapter position = '+current_position);
		}
		else
		{
			current_position = response['current_slide_text'];
			interval = response['slide_text_duration'];
			full_length = response['slide_text_length'];
		}

	}
	else if(name == 'slide-image'){
		if(chapter)
		{

			var this_chapter = response['chapter_'+chapter];
			current_position = this_chapter['current_slide'];
			interval = response['slide_image_duration'];
			full_length = this_chapter['length'];
		}
		else
		{
			current_position = response['current_slide_image'];
			interval = response['slide_image_duration'];
			full_length = response['slide_image_length'];
		}
	}
	else if(name == 'letter'){
		var poem = response['poem'];
		poem_arr = poem.split('');

		current_position = response['current_letter'];
		interval = response['letter_duration'];
		full_length = response['letter_length'];
	}
	remain = interval;
	current_speed = interval / speed_interval;

	img_src = format_img_src(current_position);
	
	
	
	var isStarted = false;
	img_preload.onload = imgOnLoad;

	function imgOnLoad(){
		if(!isStarted){
			isStarted = true;

			display_w = sDisplay.offsetWidth;
			display_h = sDisplay.offsetHeight;
			display_r = display_h / display_w;

			adjust_img_proportion(img_preload, display_r);

			if(chapter)
				var wait = 0;
			else if(type == 'entire'){
				now = new Date();
				// var wait = interval - (now_timestamp % full_loop_ms % interval);
				var wait = interval - ((now.second() + now.getMilliseconds()) % interval);
				if (wait > interval / 2 )
					current_position++;
				current_position++;	
			}
			console.log('wait = '+wait);
			img_src = format_img_src(current_position);

			document.addEventListener('keypress', function(e){

				e = e || window.event;
				if(e.charCode == '61' || e.charCode == '43'){
					slide_speed_up();
				}
				else if(e.charCode == '45' || e.charCode == '95'){
					slide_slow_down();
				}
				else if(e.charCode == '48' || e.charCode == '41'){
					slide_pause_play();
				}
			});
			timer_timeout = setTimeout(function(){
				if(chapter)
				{
					chapter_opening(chapter);
				}
				else if(type == 'entire')
				{
					if(current_position >= full_length)
					{
						next_chapter();
					}
					else
					{
						next_slide();
						timer_interval = setInterval(next_slide, interval);	
					}	
				}
						
			}, wait);
		}
		else if(current_position == 0)
		{
			adjust_img_proportion(img_preload, display_r);
		}
		
	}
	img_preload.src = img_src;

}

// letter
function format_img_src(i){
	var output = '';

	if(template == 'letter'){
		var this_letter = poem_arr[i].toUpperCase();
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
			return '';
		var this_letter_variation = filenum_arr[this_letter];
		var letter_order = parseInt(parseInt(this_letter_variation) * Math.random());
		output = '/media/letters/'+this_letter+'-'+letter_order+'.jpg';
	}
	else if(template == 'slide-image' || template == 'slide-text'){
        output = '/media/'+template+'/';
        if (chapter) {
		    output += chapter+'/';
        }
        else if(type == 'entire')
        	output += current_chapter+'/';
		if(i<10){
			output += '00' + i + '.jpeg';
		}
		else if(i<100){
			output += '0' + i + '.jpeg';
		}
		else{
			output += i + '.jpeg';
		}

	}

	return output;
}



function slide_speed_up(){
	if(pause_start)
		slide_pause_play();

	now = new Date();
	now = now.getTime();
	clearInterval(timer_interval);
	clearTimeout(timer_timeout);
	clearTimeout(timer_control);

	interval -= speed_interval;

	if(interval < speed_max){
		interval = speed_max;
		sControl_display.style.display = 'initial';
		sControl_display.innerHTML = '!reaches maximum speed: '+ speed_max +'ms / slide';
		timer_control = setTimeout(function(){
			sControl_display.style.display = 'none';
		}, 2000);
	}
	else{
		sControl_display.style.display = 'initial';
		sControl_display.innerHTML = '- '+interval+'ms / slide';
		timer_control = setTimeout(function(){
			sControl_display.style.display = 'none';
		}, 2000);
	}
	// console.log('interval = '+interval);

	sControl_display.style.display = 'initial';
	sControl_display.innerHTML = '&uarr; '+interval+'ms / slide';
	timer_control = setTimeout(function(){
		sControl_display.style.display = 'none';
	}, 2000);

	remain = interval - (now - slide_start);
	if(remain < 0)
		remain = 200;
	
	timer_timeout = setTimeout(function(){
		next_slide();
		timer_interval = setInterval(next_slide, interval);
	}, remain);

}
function slide_slow_down(){
	if(pause_start)
		slide_pause_play();

	now = new Date();
	now = now.getTime();
	clearInterval(timer_interval);
	clearTimeout(timer_timeout);
	clearTimeout(timer_control);

	interval += speed_interval;
	// in case when speed is up to 1 ms / slide then slow down, it becomes 501 ms / slide
	if(interval != 1 == interval % speed_interval != 0)
		interval = parseInt( interval / speed_interval ) * speed_interval;

	if(interval > speed_min){
		interval = speed_min;
		sControl_display.style.display = 'initial';
		sControl_display.innerHTML = '!reaches minimum speed: '+ speed_min +'ms / slide';
		timer_control = setTimeout(function(){
			sControl_display.style.display = 'none';
		}, 2000);
	}
	else{
		sControl_display.style.display = 'initial';
		sControl_display.innerHTML = '&darr; '+interval+'ms / slide';
		timer_control = setTimeout(function(){
			sControl_display.style.display = 'none';
		}, 2000);
	}
	
	remain = interval - (now - slide_start);
	timer_timeout = setTimeout(function(){
		next_slide();
		timer_interval = setInterval(next_slide, interval);
	}, remain);
	


}
function slide_pause_play(){
	if(!pause_start){
		clearInterval(timer_interval);
		clearTimeout(timer_timeout);
		clearTimeout(timer_control);

		pause_start = new Date();
		pause_start = pause_start.getTime();
		remain = interval - (pause_start - slide_start);

		sControl_display.style.display = 'initial';
		sControl_display.innerHTML = 'paused';
	}
	else{
		now = new Date();
		now = now.getTime();
		var paused_time = now - pause_start;
		var temp = slide_start + paused_time;
		slide_start = temp;
		pause_start = false;
		timer_timeout = setTimeout(function(){
			next_slide();
			// timer_interval = setInterval(next_slide, interval);
		}, remain);

		sControl_display.style.display = 'initial';
		sControl_display.innerHTML = 'resumed';
		timer_control = setTimeout(function(){
			sControl_display.style.display = 'none';
		}, 2000);
	}

}
function next_slide(){
	slide_start = new Date();
	slide_start = slide_start.getTime();

	media_folios[1].forEach(function(el, i){
		if(el[0] == current_position){
			console.log('is audio');
			var this_param = 'width=200,height=200';
			var popup_top_min = 0.1 * wH;
			var popup_top_max = 0.5 * wH;
			var popup_left_min = 0.1 * wW;
			var popup_left_max = 0.5 * wW;
			var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
			var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;
			var this_param = this_param+',top='+this_top+',left='+this_left;	
			window.open('/slide-audio?audio='+el[1], 'audio', this_param);
		}
	});
	
	if(section == 'image'){
		if(media_folios[0].includes(current_position)){
			if(sDisplay_img.style.display == 'none')
				sDisplay_img.style.display = 'initial';
			sDisplay_img.src = img_src;
		}
	}
	else{
		if(media_folios[0].includes(current_position) || media_folios[1].includes(current_position))
			sDisplay_img.style.display = 'none';
		else
			sDisplay_img.style.display = 'initial';
		sDisplay_img.src = img_src;
	}

	if(current_position == -1){
		if(type == 'entire')
		{
			clearInterval(timer_interval);
			next_chapter();
		}
	}
	else
		current_position++;
	
	if(current_position >= full_length){
		if(chapter)
		{
			close_windows();
			return false;
		}
		else if(type == 'entire')
		{
			
			current_position = -1;
			console.log(current_position);	
			return false;
		}
		else
		{
			current_position = 0;
			if(section == 'image'){
				sDisplay_img.src = '';
			}
		}
	}
	

	
	img_src = format_img_src(current_position);
	img_preload.src = img_src;
}
function next_chapter(){
	current_chapter++ ;
	if( current_chapter > 8)
		current_chapter = 1;

	sDisplay.setAttribute('chapter', current_chapter);
	full_length = response['chapter_'+current_chapter]['length'];
	media_folios = get_media_folios(current_chapter);
	current_position = 0;
	img_src = format_img_src(current_position);

	sDisplay_img.style.display = 'none';

	chapter_opening(current_chapter);
}
function chapter_opening(chapter){
	sBlack_screen_text.innerText = chapter + '. ' + sections_info[(chapter-1)]['title'];
	sBlack_screen.classList.add('flashing');
	setTimeout(function(){
		sBlack_screen.classList.remove('flashing');
		timer_interval = setInterval(next_slide, interval);	
	}, 6000);
}

function close_windows(){
	sBlack_screen_text.innerText = '';
	sBlack_screen.style.display = 'block';
	setTimeout(function(){
		window.close();
	}, 4000);
}

function get_media_folios(chapter){
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
function adjust_img_proportion(img_pre, d_ratio){

	img_r = img_pre.height / img_pre.width;
	console.log('img_r = '+img_r);
	console.log('display_r = '+d_ratio)
	if( img_r < d_ratio ){
		// wider then slide_display
		sDisplay_img.style.width = '100%';
		sDisplay_img.style.height = 'initial';
		// var extra_width = display_h / img_r - display_w;
	}
	else{
		// thiner then slide_display
		sDisplay_img.style.width = 'initial';
		sDisplay_img.style.height = '100%';
		// var extra_height = display_w * img_r - display_h;
	}
}
// console.log('section = '+section);

request_json(template, 'https://strayworld.sourcetype.com/now');

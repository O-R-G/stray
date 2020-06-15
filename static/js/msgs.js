/*
    collect and assemble msg[] for matrix.js
    includes cacheing
*/

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

var req_array = [
	{
		'name': 'wetwords-image',
		'req_url': 'http://stray.o-r-g.net/now'
		// 'req_url': 'static/data/dummy.json'
	}
];

var now_msg = get_time();
var msgs, // the final msgs for display. array of letters
	msgs_sections = {}, // the kept msgs in the form of opening, mid, ending. it needs to stay array so that it has the flexibility to be updated.
	msgs_temp = []; // the intermediate msgs to hold updated msgs, and wait until the current frame is settled. 
var msgs_array = [],
	msgs_array_temp = [];
var sDisplay_img = document.getElementById('display_img');
var sSlide_display = document.getElementById('slide_display');
var sControl_display = document.getElementById('control_display');

var img_preload = new Image();
var timer_interval, timer_timeout, timer_control;
var interval = 1000;
var remain = interval;
var img_src, current_position, slide_length;

var speed_min = 10000;
var speed_max = 1;
var speed_interval = 500;
var current_speed = interval / speed_interval;
var pause_start = false;
var slide_start = new Date();

var poem_arr;

function handle_msgs(name, response, results_count = false){
	// console.log('handle_msgs...'+name);
	if(results_count == '')
		results_count = false;
	var response = response;
	if(name == 'wetwords-image'){
		
		var poem = response['poem'];
		poem_arr = poem.split('');
		current_position = response['current_letter'];
		slide_length = poem_arr.length;
		console.log(current_position);
		// var current_position = 472;
		console.log()
		img_src = format_img_src(current_position);


		var display_w = sSlide_display.offsetWidth;
		var display_h = sSlide_display.offsetHeight;
		var display_r = display_h / display_w;
		var img_r = 1;
		var isStarted = false;
		img_preload.onload = imgOnLoad;

		function imgOnLoad(){
			if(!isStarted){
				isStarted = true;
				img_r = img_preload.height / img_preload.width;
				if( img_r < display_r ){
					// wider then slide_display
					sDisplay_img.style.width = '100%';
					var extra_width = display_h / img_r - display_w;
					// sDisplay_img.style.left = '-'+(extra_width/2)+'px';
				}
				else{
					// thiner then slide_display
					sDisplay_img.style.height = '100%';
					var extra_height = display_w * img_r - display_h;
					// sDisplay_img.style.top = '-'+(extra_height/2)+'px';
				}
				var wait = interval - now.getMilliseconds();

				if (wait > 500)
					current_position++;
				current_position++;
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
					next_slide();
					timer_interval = setInterval(next_slide, interval);
				}, wait);
			}
			
		}
		img_preload.src = img_src;
		// wait until exactly next second to start
		// advance currentLetter as required

		
	}
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
	console.log('interval = '+interval);

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
	console.log('interval = '+interval);

	

	remain = interval - (now - slide_start);
	console.log('remain in slow down: '+remain);
	timer_timeout = setTimeout(function(){
		next_slide();
		timer_interval = setInterval(next_slide, interval);
	}, remain);
	


}
function slide_pause_play(){
	if(!pause_start){
		console.log('paused');
		clearInterval(timer_interval);
		clearTimeout(timer_timeout);
		clearTimeout(timer_control);

		pause_start = new Date();
		pause_start = pause_start.getTime();
		remain = interval - (pause_start - slide_start);
		console.log(pause_start, slide_start);
		console.log('remain = '+remain);

		sControl_display.style.display = 'initial';
		sControl_display.innerHTML = 'paused';
	}
	else{
		console.log('resume');
		now = new Date();
		now = now.getTime();
		var paused_time = now - pause_start;
		console.log('paused_time = '+paused_time);
		console.log('old slide_start = '+slide_start);
		var temp = slide_start + paused_time;
		slide_start = temp;
		console.log('new slide_start = '+slide_start);
		pause_start = false;
		timer_timeout = setTimeout(function(){
			next_slide();
			timer_interval = setInterval(next_slide, interval);
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
	sDisplay_img.src = img_src;
	preload_next_image(current_position);
	current_position++;
	if(current_position >= slide_length)
		current_position = 0;
	
}
function format_img_src(i){
	var this_letter = poem_arr[i].toUpperCase();
	console.log('next letter:'+this_letter);
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
	var output = 'media/letters/'+this_letter+'-'+letter_order+'.jpg';
	return output;
}

// preload all images
function preload_next_image(i){
	var next = i+1;
	if(next >= slide_length)
		next = 0;
	img_src = format_img_src(next);
	img_preload.src = img_src;
}


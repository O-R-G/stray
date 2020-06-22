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
		'name': 'wet-letters',
		'req_url': 'http://stray.o-r-g.net/now'
	}
];

var sDisplay = document.getElementById('display');
var sDisplay_text = document.getElementById('display_text');
var sControl_display = document.getElementById('control_display');

var timer_interval, timer_timeout, timer_control;
var interval = 1000;
var remain = interval;
var current_position, slide_length;

// slideshow control
var speed_min = 10000;
var speed_max = 1;
var speed_interval = 500;
var current_speed = interval / speed_interval;
var pause_start = false;
var slide_start;

var poem_arr;

function handle_msgs(name, response, results_count = false){
	var response = response;
	if(name == 'wet-letters'){
		var poem = response['poem'];
		current_position = response['current_letter'];
		poem_arr = poem.split('');

		// wait until exactly next second to start
		// advance currentLetter as required

		var wait = 1000 - now.getMilliseconds();

		if (wait > 500)
			current_position++;
		current_position++;
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
	sDisplay_text.innerHTML = poem_arr[current_position];
	current_position++;
	if(current_position >= poem_arr.length)
		current_position = 0;
}

for(i = 0 ; i < req_array.length ; i++){
	request_json(req_array[i]['name'], req_array[i]['req_url']);
}
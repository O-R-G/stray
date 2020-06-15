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
		// 'req_url': 'static/data/dummy.json'
	}
];

var now_msg = get_time();
var msgs, // the final msgs for display. array of letters
	msgs_sections = {}, // the kept msgs in the form of opening, mid, ending. it needs to stay array so that it has the flexibility to be updated.
	msgs_temp = []; // the intermediate msgs to hold updated msgs, and wait until the current frame is settled. 
var msgs_array = [],
	msgs_array_temp = [];
var sDisplay = document.getElementById('display');
var sControl_display = document.getElementById('control_display');

var timer_interval, timer_timeout, timer_control;
var interval = 1000;
var remain = interval;
var current_position, slide_length;

var speed_min = 10000;
var speed_max = 1;
var speed_interval = 500;
var current_speed = interval / speed_interval;
var pause_start = false;
var slide_start;

var poem_arr;

function handle_msgs(name, response, results_count = false){
	// console.log('handle_msgs...'+name);
	if(results_count == '')
		results_count = false;
	var response = response;
	console.log(response);
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
			sDisplay.innerHTML = poem_arr[current_position];
 			current_position++;
 			if(current_position >= poem_arr.length)
				current_position = 0;
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
		sDisplay.innerHTML = poem_arr[current_position];
		current_position++;
		if(current_position >= poem_arr.length)
			current_position = 0;
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
		console.log('timeout in slowdown');
		sDisplay.innerHTML = poem_arr[current_position];
		current_position++;
		if(current_position >= poem_arr.length)
			current_position = 0;
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
			sDisplay.innerHTML = poem_arr[current_position];
			current_position++;
			if(current_position >= poem_arr.length)
				current_position = 0;
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
	console.log('next slide');
	console.log(current_position);
	slide_start = new Date();
	slide_start = slide_start.getTime();
	sDisplay.innerHTML = poem_arr[current_position];
	current_position++;
	if(current_position >= poem_arr.length)
		current_position = 0;
}

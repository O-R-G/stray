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
		'name': 'slide',
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
// var img_preload = new Image();
var img_preload = document.createElement('img');

var interval = 1000;

function handle_msgs(name, response, results_count = false){
	// console.log('handle_msgs...'+name);
	if(results_count == '')
		results_count = false;
	var response = response;
	if(name == 'slide'){
		var slide_length = response['slides'];
		var current_position = parseInt(parseInt(slide_length) * Math.random())+1;
		var img_src = format_img_src(current_position);


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
					sDisplay_img.style.height = '100%';
					var extra_width = display_h / img_r - display_w;
					sDisplay_img.style.left = '-'+(extra_width/2)+'px';
				}
				else{
					sDisplay_img.style.width = '100%';
					var extra_height = display_w * img_r - display_h;
					console.log(display_w, img_r);
					sDisplay_img.style.top = '-'+(extra_height/2)+'px';
				}
				var wait = 1000 - now.getMilliseconds();

				if (wait > 500)
					current_position++;
				current_position++;
				img_src = format_img_src(current_position);

				setTimeout(function(){
					sDisplay_img.src = img_src;
		 			current_position++;
		 			if(current_position > slide_length)
		 				current_position = 1;
		 			img_src = format_img_src(current_position);
					setInterval(function(){
						sDisplay_img.src = img_src;
						current_position++;
						img_src = format_img_src(current_position);

						
					}, interval);
				}, wait);
			}
			
		}
		img_preload.src = img_src;
		// wait until exactly next second to start
		// advance currentLetter as required

		
	}
}

function format_img_src(i){
	var output = ''
	if(i<10){
		output = 'media/slide/'+'00'+i+'.jpeg';
	}
	else if(i<100){
		output = 'media/slide/'+'0'+i+'.jpeg';
	}
	else{
		output = 'media/slide/'+i+'.jpeg';
	}

	return output;
}


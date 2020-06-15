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
		'req_url': 'http://wetwords.o-r-g.net/now'
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
var interval = 1000;

function handle_msgs(name, response, results_count = false){
	// console.log('handle_msgs...'+name);
	if(results_count == '')
		results_count = false;
	var response = response;
	if(name == 'wet-letters'){
		var poem = response['poem'];
		var current_position = response['current_letter'];
		var poem_arr = poem.split('');

		// wait until exactly next second to start
		// advance currentLetter as required

		var wait = 1000 - now.getMilliseconds();

		if (wait > 500)
			current_position++;
		current_position++;

		setTimeout(function(){
			sDisplay.innerHTML = poem_arr[current_position];
 			current_position++;
			setInterval(function(){
				sDisplay.innerHTML = poem_arr[current_position];
				current_position++;
				if(current_position >= poem_arr.length)
					current_position = 0;
			}, interval);
		}, wait);
	}
}

function next_letter(arr){
	// do nothing
}


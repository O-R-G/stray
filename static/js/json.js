/*
    request json with local cache compare
*/

function request_json(name, request_url) {
    if (window.XMLHttpRequest) { // Mozilla, Safari, IE7+ ...
	    var httpRequest = new XMLHttpRequest();
	} else if (window.ActiveXObject) { // IE 6 and older
	    var httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
	}
	httpRequest.onreadystatechange = function(){
		
		if (httpRequest.readyState === XMLHttpRequest.DONE) {
			
	      if (httpRequest.status === 200) {	
	      	console.log(httpRequest.responseText);
      		var response = JSON.parse(httpRequest.responseText);
      		
      		if(response){
      			now_timestamp = new Date().getTime();
    			now_timestamp = parseInt(now_timestamp/1000); // ms to s
      			handle_msgs(name, response); // static/js/msg.js
      		}
	      }
	    }
	};
	httpRequest.open('GET', request_url);
	httpRequest.send();
}
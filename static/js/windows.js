var window_text, window_image, window_allcaps, window_audio, window_radio;

var wW = window.innerWidth;
var wH = window.innerHeight;

var popup_top_min = 0.1 * wH;
var popup_top_max = 0.5 * wH;
var popup_left_min = 0.1 * wW;
var popup_left_max = 0.5 * wW;

function popup(chapter, query, type = false, path = false){
	var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
	var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;		

    var window_name = ( isNaN(chapter) ) ? 'STRAY' + '. ' + chapter : 'Chapter ' + chapter + '. ' + type;

    var p = '/'+chapter+'/'+type;
    if(type == 'text')
    {
    	var this_width = 660;
    	var this_height = 700;
    }
    else if(type == 'image')
    {
    	var this_width = 700;
    	var this_height = 700;
    	if(path)
    		p += '/'+path;
    }
    else if(type == 'allcaps')
    {
    	var this_width = 450;
    	var this_height = 300;
		p += '/'+(path-1);
    }
    else if(type == 'audio')
    {
    	var this_width = 200;
    	var this_height = 200;
		p = '/audio';
    }

    query = '?chapter='+chapter+'&section='+type+query;
    
 
    

	if(chapter == 'colophon'){
		var this_param = 'width=650,height=450,top=0,left=0';
		window_text = window.open('/colophon', window_name, this_param);
	}
	else if(chapter == 'radio'){
		var this_param = 'width=600,height=100,top=0,left=0';
		window_radio = window.open('/radio', window_name, this_param);
	}
	else if(chapter == 'audio'){
		var this_param = 'width=100,height=100,top=0,left=0';
		window_radio  = window.open('/audio', window_name, this_param);
	}
	else{
		var this_param = 'width='+this_width+',height='+this_height+',top='+this_top+',left='+this_left;
		// return window.open('/chapter'+query, window_name, this_param);
		return window.open('/chapter'+p, window_name, this_param);
	}
}

function open_chapter(chapter, query = ''){
	// query should be in the format "&query1=value1&query2=value2..."
    window_image = popup(chapter, query, 'image');
    window_text = popup(chapter, query, 'text');
    window_allcaps = popup(chapter, query, 'allcaps');
    setTimeout(function(){
        console.log('popping audio');
        window_audio = popup('audio', '', 'audio');
    }, 5000);
}
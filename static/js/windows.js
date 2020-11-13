var wW = window.innerWidth;
var wH = window.innerHeight;

var popup = [
	{
		'url': '/slide-text',
		'name': 'Text',
		'param': 'width=800,height=600',
		'repeat': 1
	},
	{
		'url': '/slide-image',
		'name': 'Image',
		'param': 'width=1000,height=1000',
		'repeat': 1
	},
	{
		'url': '/letter',
		'name': 'letter',
		'param': 'width=505,height=650',
		'repeat': 1
	}
];
// var popup_w_min = 200;
// var popup_w_max = 750;
// var popup_h_min = 200;
// var popup_h_max = 750;
var popup_top_min = 0.1 * wH;
var popup_top_max = 0.5 * wH;
var popup_left_min = 0.1 * wW;
var popup_left_max = 0.5 * wW;

var popup_dimension_spread = 'width=650,height=450';

function popup_single(chapter, query, type = false, path = false){
	var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
	var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;		

    var window_name = ( isNaN(chapter) ) ? 'STRAY' + '. ' + chapter : 'Chapter ' + chapter + '. ' + type;

    if(type == 'text')
    {
    	var this_width = 300;
    	var this_height = 700;
    }
    else if(type == 'image')
    {
    	var this_width = 600;
    	var this_height = 600;
    }

    query = '?'+query+'&section='+type;
    var p = '/'+chapter+'/'+type;
    if(path)
    	p += '/'+path;

	if(chapter == 'colophon'){
		var this_param = 'width=650,height=450,top=0,left=0';
		window_1 = window.open('/colophon', window_name, this_param);
	}
	else if(chapter == 'radio'){
		var this_param = 'width=600,height=100,top=0,left=0';
		window_1 = window.open('/radio', window_name, this_param);
	}
	else{
		var this_param = 'width='+this_width+',height='+this_height+',top='+this_top+',left='+this_left;
		// return window.open('/chapter'+query, window_name, this_param);
		return window.open('/chapter'+p, window_name, this_param);
	}
}

function popup_double(chapter, query = ''){
	// query should be in the format "&query1=value1&query2=value2..."
    var query_temp = 'chapter='+chapter+query;
    window_1 = popup_single(chapter, query_temp, 'image');
    window_2 = popup_single(chapter, query_temp, 'text');
    // window_3 = popup_single(chapter, query_temp, 'audio');
}
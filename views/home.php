<script type="text/javascript">
	var wW = window.innerWidth;
	var wH = window.innerHeight;

	var popup = [
		{
			'url': '/slide-text',
			'name': 'slide-text',
			'param': 'width=650,height=450',
			'repeat': 1
		},
		{
			'url': '/letter',
			'name': 'letter',
			'param': 'width=505,height=650',
			'repeat': 1
		}
	];
	var popup_w_min = 200;
	var popup_w_max = 750;
	var popup_h_min = 200;
	var popup_h_max = 750;
	var popup_top_min = 0.1 * wH;
	var popup_top_max = 0.5 * wH;
	var popup_left_min = 0.1 * wW;
	var popup_left_max = 0.5 * wW;

	var popup_dimension_spread = 'innerWidth=650,innerHeight=450';

	// for(i = 0; i < popup.length ; i++){
	// 	for(j = 0; j < popup[i]['repeat']; j++){
	// 		var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
	// 		var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;
	// 		var this_param = popup[i]['param']+',top='+this_top+',left='+this_left;
	// 		window.open(popup[i]['url'], popup[i]['name']+j, this_param);
	// 	}
	// }

    function popup_single(i,query){
		var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
		var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;
		
		if(i == 'colophon'){
			var this_param = 'width=650,height=450,top=0,left=0';
			window.open('/colophon', i, this_param);
		}
		else{
			var this_param = popup[i]['param']+',top='+this_top+',left='+this_left;
			window.open(popup[i]['url']+query, popup[i]['name'], this_param);
		}
	}

	function popup_spread(i,query){
		// text
		// var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
		// var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;
		var this_top = -100;
		var this_left = 0;
		var this_param = popup_dimension_spread+',top='+this_top+',left='+this_left;
		window.open('/slide-text'+query+'&section=text', 'Chapter '+i+'. Text', this_param);

		// image
		var this_top = -100;
		var this_left = 650;
		var this_param = popup_dimension_spread+',top='+this_top+',left='+this_left;
		window.open('/slide-text'+query+'&section=image', 'Chapter '+i+'. Image', this_param);
	}
	
</script>
<div id="home_container">
	<div id = 'colophon_container'>
		<div class = 'colophon_col col_left'>
            <b>VERY MUCH IN PROGRESS . . .</b><br><br>
            1. <a href='javascript:popup_spread(0,"?chapter=1&type=realtime");'>STRAY</a><a href = 'javascript:popup_spread(1,"?chapter=1&type=static");'>*</a><br>
            2. <a href='javascript:popup_spread(0,"?chapter=2&type=realtime");'>SEVEN SLEEPERS</a><a href = 'javascript:popup_spread(2,"?chapter=2&type=static");'>*</a><br>
            3. <a href='javascript:popup_spread(0,"?chapter=3&type=realtime");'>STEREOCILIA</a><a href = 'javascript:popup_spread(3,"?chapter=3&type=static");'>*</a><br>
            6. <a href='javascript:popup_spread(0,"?chapter=6&type=realtime");'>SPLAY ANTHEM</a><a href = 'javascript:popup_spread(6,"?chapter=6&type=static");'>*</a><br>
            8. <a href='javascript:popup_spread(0,"?chapter=8&type=realtime");'>WET WORDS IN A HOT FIELD<a href = 'javascript:popup_spread(8,"?chapter=8&type=static");'>*</a></a><br><br>
            <a href='javascript:popup_single("colophon", "");'>Colophon</a>
		</div>
	</div>
</div>   
<!-- <script src='/static/js/json.js'></script> -->
<!-- <script src='/static/js/msgs.js'></script> -->


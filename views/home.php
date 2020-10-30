<script type="text/javascript">
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
	var popup_w_min = 200;
	var popup_w_max = 750;
	var popup_h_min = 200;
	var popup_h_max = 750;
	var popup_top_min = 0.1 * wH;
	var popup_top_max = 0.5 * wH;
	var popup_left_min = 0.1 * wW;
	var popup_left_max = 0.5 * wW;

	var popup_dimension_spread = 'width=650,height=450';

    function popup_single(i, chapter, query){
		var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
		var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;		

        var window_name = ( chapter == '0' ) ? 'STRAY' + '. ' + popup[i]['name'] : 'Chapter ' + chapter + '. ' + popup[i]['name'];

		if(chapter == 'colophon'){
			var this_param = 'width=650,height=450,top=0,left=0';
			window_1 = window.open('/colophon', 'Colophon', this_param);
		}
		else{
			var this_param = popup[i]['param']+',top='+this_top+',left='+this_left;
			return window.open('/slide-text'+query, window_name, this_param);
		}
	}

	function popup_double(chapter, query){
        text_query = query+'&section=text';
        image_query = query+'&section=image';
        window_1 = popup_single(1, chapter, image_query);
        window_2 = popup_single(0, chapter, text_query);
        
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
            1. <a href='javascript:popup_double(1,"?chapter=1&type=individual");'>STRAY</a><br>
            2. <a href='javascript:popup_double(2,"?chapter=2&type=individual");'>SEVEN SLEEPERS</a><br>
            3. <a href='javascript:popup_double(3,"?chapter=3&type=individual");'>STEREOCILIA</a><br>
            6. <a href='javascript:popup_double(6,"?chapter=6&type=individual");'>SPLAY ANTHEM</a><br>
            8. <a href='javascript:popup_double(8,"?chapter=8&type=individual");'>WET WORDS IN A HOT FIELD</a><br><br>
            <a href='javascript:popup_single(0, "colophon", "");'>Colophon</a><br>
            <a href='javascript:popup_double(0, "?type=entire");'>Autoplay</a>
		</div>
	</div>
</div>   
<!-- <script src='/static/js/json.js'></script> -->
<!-- <script src='/static/js/msgs.js'></script> -->


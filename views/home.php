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
	// var popup_w_min = 200;
	// var popup_w_max = 750;
	// var popup_h_min = 200;
	// var popup_h_max = 750;
	var popup_top_min = 0.1 * wH;
	var popup_top_max = 0.5 * wH;
	var popup_left_min = 0.1 * wW;
	var popup_left_max = 0.5 * wW;

	var popup_dimension_spread = 'width=650,height=450';

    function popup_single(chapter, query, type = false){
		var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
		var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;		

        var window_name = ( chapter == '0' ) ? 'STRAY' + '. ' + type : 'Chapter ' + chapter + '. ' + type;

        if(type == 'text')
        {
        	var this_width = 200;
        	var this_height = 600;
        }
        else if(type == 'image')
        {
        	var this_width = 400;
        	var this_height = 400;
        }

        query = '?'+query+'&section='+type;

		if(chapter == 'colophon'){
			var this_param = 'width=650,height=450,top=0,left=0';
			window_1 = window.open('/colophon', 'Colophon', this_param);
		}
		else{
			var this_param = 'width='+this_width+',height='+this_height+',top='+this_top+',left='+this_left;
			return window.open('/chapter'+query, window_name, this_param);
		}
	}

	function popup_double(chapter, query = ''){
		// query should be in the format "&query1=value1&query2=value2..."
        var query_temp = 'chapter='+chapter+query;
        window_1 = popup_single(chapter, query_temp, 'image');
        window_2 = popup_single(chapter, query_temp, 'text');
        // window_3 = popup_single(chapter, query_temp, 'audio');
    }
	
</script>
<div id="home_container">
	<div id = 'colophon_container'>
		<div class = 'colophon_col col_left'>
            <b>VERY MUCH IN PROGRESS . . .</b><br><br>
            1. <a href='javascript:popup_double(1);'>STRAY ERR</a><br>
            2. <a href='javascript:popup_double(2);'>SEVEN SLEEPERS</a><br>
            3. <a href='javascript:popup_double(3);'>STEREOCILIA</a><br>
            4. <a href='javascript:popup_double(4);'>SPLAY ANTHEM</a><br>
            5. <a href='javascript:popup_double(5);'>A GRAPHIC TONE</a><br>
            6. <a href='javascript:popup_double(6);'>WET WORDS IN A HOT FIELD</a><br><br>
            <a href='javascript:popup_single(0, "colophon", "");'>Colophon</a><br>
            <a href='javascript:popup_double(0, "?type=entire");'>Autoplay</a>
		</div>
	</div>
</div>   
<!-- <script src='/static/js/json.js'></script> -->
<!-- <script src='/static/js/msgs.js'></script> -->


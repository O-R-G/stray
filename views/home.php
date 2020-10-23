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

	for(i = 0; i < popup.length ; i++){
		for(j = 0; j < popup[i]['repeat']; j++){
			var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
			var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;
			var this_param = popup[i]['param']+',top='+this_top+',left='+this_left;
			window.open(popup[i]['url'], popup[i]['name']+j, this_param);
		}
	}

    function popup_single(i,query){
		var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
		var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;
		var this_param = popup[i]['param']+',top='+this_top+',left='+this_left;
		window.open(popup[i]['url']+query, popup[i]['name'], this_param);
	}
	
</script>
<div id="home_container">
	<div id = 'colophon_container'>
		<div class = 'colophon_col col_left'>
            <b>VERY MUCH IN PROGRESS . . .</b><br><br>
            1. <a href='javascript:popup_single(0,"?chapter=1");'>STRAY</a><br>
            2. <a href='javascript:popup_single(0,"?chapter=2");'>SEVEN SLEEPERS</a><br>
            3. <a href='javascript:popup_single(0,"?chapter=3");'>STEREOCILIA</a><br>
            6. <a href='javascript:popup_single(0,"?chapter=6");'>SPLAY ANTHEM</a><br>
            8. <a href='javascript:popup_single(0,"?chapter=8");'>WET WORDS IN A HOT FIELD</a>
		</div>
	</div>
</div>   
<!-- <script src='/static/js/json.js'></script> -->
<!-- <script src='/static/js/msgs.js'></script> -->


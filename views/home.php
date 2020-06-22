<?  
	
?>
<script type="text/javascript">
	var wW = window.innerWidth;
	var wH = window.innerHeight;

	var popup = [
		{
			'url': '/wetwords-image',
			'name': 'wetwords-image',
			'param': '',
			'repeat': 1
		},
		{
			'url': '/wetwords-slide',
			'name': 'wetwords-slide',
			'param': '',
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
			
			var this_w = parseInt( Math.random() * (popup_w_max - popup_w_min)) + popup_w_min;
			var this_h = parseInt( Math.random() * (popup_h_max - popup_h_min)) + popup_h_min;
			var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) +  + popup_top_min;
			var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) +  + popup_left_min;
			var this_param = 'width='+this_w+',height='+this_h+',top='+this_top+',left='+this_left;
			console.log();
			window.open(popup[i]['url'], popup[i]['name']+j, this_param);
		}
	}
	
</script>
<div id = 'control_display'></div>
<div id="display"><div id = 'display_text'></div></div>   
<script src='/static/js/json.js'></script>
<script src='/static/js/msgs.js'></script>


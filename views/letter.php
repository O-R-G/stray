<?  
	$letter_image_filenames = scandir('media/letters');
	$filenum_arr = array();
	foreach($letter_image_filenames as $filename){
		if(substr($filename, 0, 1) != '.'){
			$this_key = explode('-', $filename);
			$this_key = $this_key[0];
			if(isset($filenum_arr[$this_key]))
				$filenum_arr[$this_key] ++;
			else
				$filenum_arr[$this_key] = 1;
		}
	}
?>
<div id = 'control_display'></div>
<div id="display"><img id = 'display_img' src = ''></div>
<script>
	var this_page = 'letter';
	var filenum_arr = <? echo json_encode($filenum_arr); ?>;
</script>
<script src='/static/js/json.js'></script>
<script src='/static/js/msgs.js'></script>
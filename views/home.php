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
	var filenum_arr = <? echo json_encode($filenum_arr); ?>;
	window.open('/wetwords-image', 'wetwords-image', 'top=0,left=0,width=200,height=200, resizable=no,scrollbars=no');
	window.open('/wetwords-slide', 'wetwords-slide', 'top=0,left=200,width=200,height=200, resizable=no,scrollbars=no');
</script>
<script src='<? echo $current_directory; ?>static/js/json.js'></script>
<script src='<? echo $current_directory; ?>static/js/msgs.js'></script>


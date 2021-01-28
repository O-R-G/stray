<?
	$print_id = end($oo->urls_to_ids(array('print')));
	$print_text = $oo->get($print_id)['body'];
?>
<div id = 'measure-container'>
	<section id="print-content-text" class = 'print-content'>
		<div id = 'text-container' class = 'window-container'><?= $print_text; ?></div>
	</section>
</div>

<script>
	var measure_container = document.getElementById('measure-container');
	var print_content_text = document.getElementById('print-content-text');
	var unit = 'mm';
	var w = 210;
	var h = 297;
	var margin_top = 17.5;
	var margin_inner = 30;
	var margin_bottom = 17.5;
	var margin_outer = 10;
	var inner_w = w - margin_inner - margin_outer;
	var inner_h = h - margin_top - margin_bottom;
	print_content_text.style.width = inner_w+'mm';
	print_content_text.style.height = inner_h+ 'mm';
	print_content_text.style.backgroundColor = '#fff';
	measure_container.style.backgroundColor = 'blue';
</script>
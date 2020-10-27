<?  
    $chapter = $_GET['chapter'];
    // echo $chapter;
    $section = $_GET['section'];
    $type = $_GET['type'];
?>
<div id = 'control_display'></div>
<div id="display"><img id = 'display_img' src = ''></div>
<script>
	function getParameterByName(name, url = window.location.href) {
	    name = name.replace(/[\[\]]/g, '\\$&');
	    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, ' '));
	}
	var template = 'slide-text';
	// var chapter = <?= $chapter; ?>;
	// var section = '<?= $section; ?>';
	// var type = '<?= $type; ?>';
	var chapter = getParameterByName('chapter');
	var section = getParameterByName('section');
	var type = getParameterByName('type');
    // console.log(chapter);
</script>
<script src='/static/js/section.js'></script>
<script src='/static/js/json.js'></script>
<script src='/static/js/msgs.js'></script>


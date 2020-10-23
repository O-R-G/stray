<?  
    $chapter = $_GET['chapter'];
    echo $chapter;
?>
<div id = 'control_display'></div>
<div id="display"><img id = 'display_img' src = ''></div>
<script>
	var template = 'slide-text';
	var chapter = <?= $chapter; ?>;
    console.log(chapter);
</script>
<script src='/static/js/json.js'></script>
<script src='/static/js/msgs.js'></script>


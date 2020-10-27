<?  
    $chapter = $_GET['chapter'];
    // echo $chapter;
    $section = $_GET['section'];
    $type = $_GET['type'];
?>
<div id = 'control_display'></div>
<div id="display"><img id = 'display_img' src = ''></div>
<script>
	var template = 'slide-text';
	var chapter = <?= $chapter; ?>;
	var section = '<?= $section; ?>';
	var type = '<?= $type; ?>';
    // console.log(chapter);
</script>
<script src='/static/js/section.js'></script>
<script src='/static/js/json.js'></script>
<script src='/static/js/msgs.js'></script>


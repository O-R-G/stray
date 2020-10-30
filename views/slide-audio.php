<?
$filename = $_GET['audio'];
$filepath = '/media/audio/'.$filename;
?>
<div id = 'audio_container'>
	<audio src = '<?= $filepath; ?>' playsinline controls autoplay></audio>
</div>
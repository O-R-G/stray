<?
// $filename = $_GET['audio'];
$filename = [];
$filepath = '/media/audio/'.$filename;
?>
<div id = 'audio_container'>
	<audio id = 'audio' src = '/media/audio/B5.Lone.mp3' playsinline controls autoplay></audio>
</div>
<script>
	var filenames = ['B5.Lone', 'NATE_Andoumboulou50_30minloop', 'NATE_DogonEclipse_30minloop', 'SUSAN_HUMAN_30minloop'];
	var audio_idx = 0;
	var filepath = '/media/audio/' + filenames[audio_idx] + '.mp3';
	var sAudio = document.getElementById('audio');
	sAudio.addEventListener('ended',function(){
		audio_idx++;
		if(audio_idx < filenames.length){
			filepath = '/media/audio/' + filenames[audio_idx] + '.mp3';
			sAudio.src = filepath;
			sAudio.play();
		}
		
	});
</script>
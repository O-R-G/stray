<?
$filename = $_POST['image-filename'];
$src = 'media/jpg/original/'.$filename;
$imagesize = getimagesize($src);
$image_r = $imagesize[1] / $imagesize[0];
$resize_w = 1000;
$resize_h = $resize_w * $image_r;
?>
<div id = 'zoom-in-container'><img src = '<?= $src; ?>'></div>
<script>
	var resize_w = <?= $resize_w; ?>;
	var resize_h = <?= $resize_h; ?>;
	var resizeViewPort = function(width, height) {
	    if (window.outerWidth) {
	        window.resizeTo(
	            width + (window.outerWidth - window.innerWidth),
	            height + (window.outerHeight - window.innerHeight)
	        );
	    } else {
	        window.resizeTo(500, 500);
	        window.resizeTo(
	            width + (500 - document.body.offsetWidth),
	            height + (500 - document.body.offsetHeight)
	        );
	    }
	};
	resizeViewPort(resize_w, resize_h+1);
</script>
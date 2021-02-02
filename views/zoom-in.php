<?
$filename = $_GET['filename'];
$src = 'media/jpg/original/'.$filename;
$imagesize = getimagesize($src);
$image_r = $imagesize[1] / $imagesize[0];
$image_w = $imagesize[0];
$image_h = $imagesize[1];
?>
<div id = 'zoom-in-container'><img src = '<?= $src; ?>'></div>
<script>
	var image_w = <?= $image_w; ?>;
	var image_h = <?= $image_h; ?>;
	var image_r = <?= $image_r; ?>;
	var w_max = screen.availWidth - 100;
	var h_max = screen.availHeight - 100;
	var resize_w, resize_h;

	if( image_w > w_max && 
		image_h > h_max )
	{
		if( image_r > h_max / w_max )
		{
			resize_h = h_max;
			resize_w = h_max / image_r;
		}
		else
		{
			resize_w = w_max;
			resize_h = w_max * image_r;
		}
	}
	else if(image_w > w_max)
	{
		resize_w = w_max;
		resize_h = w_max * image_r;
	}
	else if(image_h > h_max)
	{
		resize_h = h_max;
		resize_w = h_max / image_r;
	}
	else
	{
		resize_w = image_w;
		resize_h = image_h;
	}
	resize_w = 4*resize_w/5;
	resize_h = 4*resize_h/5;
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
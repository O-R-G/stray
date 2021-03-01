var throttled = false;
var resize_delay = 250;

if(window_btn != null)
{
	function resize_window_btn(btns, img_r){
		var current_wH = window.innerHeight;
		var current_image_h = current_wH - 40;
		var current_image_w = current_image_h / img_r;
		[].forEach.call(btns, (el, i)=>{
			el.style.width = image_w + 'px';
			if(el.id == 'duo_btn')
			{
				el.addEventListener('click', ()=>open_duo());
			}
			else if(el.id == 'mobile_btn')
			{
				el.addEventListener('click', ()=>{popup('mobile')});
			}
		});
	}

	window.addEventListener('resize', function(){
		if (!throttled) {
		    // actual callback action
		    resize_window_btn(window_btn, image_r);
		    // we're throttled!
		    throttled = true;
		    // set a timeout to un-throttle
		    setTimeout(function() {
		      throttled = false;
		    }, resize_delay);
		  }
	});
}
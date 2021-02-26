var window_text, window_image, window_allcaps, window_audio, window_radio;

var wW = window.innerWidth;
var wH = window.innerHeight;

var popup_top_min = 0.1 * wH;
var popup_top_max = 0.5 * wH;
var popup_left_min = 0.1 * wW;
var popup_left_max = 0.5 * wW;

var ticking = false;
var current_scroll = false;
var scroll_timer = null;

function popup(name, param =false){
	var this_top = parseInt( Math.random() * (popup_top_max - popup_top_min)) + popup_top_min;
	var this_left = parseInt( Math.random() * (popup_left_max - popup_left_min)) + popup_left_min;		
    var window_name = 'STRAY. ';
    var name_temp = name;
    var name_cat = '';
    if( name.indexOf('/') !== false )
    {
        name_cat = name_temp.substring(0, name_temp.indexOf('/'));
        console.log('cat = '+name_cat);
        name_temp = name_temp.substring(name_temp.indexOf('/'));
        window_name += name_cat.substring(0, 1).toUpperCase() + name_cat.substring(1);
    }
    window_name += name_temp.substring(0, 1).toUpperCase() + name_temp.substring(1);

    console.log('window_name = '+window_name);

	if(name == 'colophon'){
		var this_param = 'width=650,height=450,top='+this_top+',left='+this_left;
		window_text = window.open('/colophon', window_name, this_param);
	}
	
    else if(name == 'text'){
        var this_param = 'width=800,height=700,top='+this_top+',left='+this_left+',scrollbars=yes';
        // return window.open('/chapter'+query, window_name, this_param);
        return window.open('/text', 'STRAY. TEXT', this_param);
    }
    else if(name == 'image' || name == 'mobile'){
        var this_param = 'width=800,height=700,top='+this_top+',left='+this_left+',scrollbars=yes';
        // return window.open('/chapter'+query, window_name, this_param);
        return window.open('/image', 'STRAY. IMAGE', this_param);
    }
    else if(name == 'print'){
        var this_param = 'width=800,height=700,top='+this_top+',left='+this_left+',scrollbars=yes';
        // return window.open('/chapter'+query, window_name, this_param);
        return window.open('/print', 'STRAY. PRINT', this_param);
    }
    else if(name == 'zoom')
    {
        var this_param = 'resizable,width=800,height=700,top='+this_top+',left='+this_left+',scrollbars=yes';
        // return window.open('/chapter'+query, window_name, this_param);
        return window.open('/zoom-in?filename='+param, 'STRAY. ZOOM-IN', this_param);
    }
    // else if(name == 'radio'){
    //     var this_param = 'width=400,height=520,top='+this_top+',left='+this_left;
    //     window_radio = window.open('/radio', window_name, this_param);
    // }
    // else if(name == 'audio'){
    //     var this_param = 'width=100,height=100,top='+this_top+',left='+this_left;
    //     window_radio  = window.open('/audio', window_name, this_param);
    // }
    else{
		var this_param = 'width=650,height=450,top='+this_top+',left='+this_left;
		// return window.open('/chapter'+query, window_name, this_param);
		return window.open('/'+name, window_name, this_param);
	}
}

function open_chapter(chapter, query = ''){
	// query should be in the format "&query1=value1&query2=value2..."
    window_image = popup(chapter, query, 'image');
    window_allcaps = popup(chapter, query, 'allcaps');
    window_text = popup(chapter, query, 'text');
    window_audio = popup('audio', '', 'audio');
    // setTimeout(function(){
    //     console.log('popping audio');
    //     window_audio = popup('audio', '', 'audio');
    // }, 5000);
}
function open_duo(){
    console.log('open duo');
    window_image = popup('image');
    window_text = popup('text');
    var window_text_top = 0;
    var window_image_top = 0;
    var window_text_height = 0;
    var window_image_height = 0;

    window_text.onload = function(){
        console.log('text is onload');
        window_text.onscroll = function(){
            if(current_scroll != 'image'){
                current_scroll = 'text';
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        window_text_top = window_text.scrollY;
                        window_image.scrollTo(0,window_text_top);
                        if(scroll_timer !== null)
                            clearTimeout(scroll_timer);
                        scroll_timer = setTimeout(function(){
                            current_scroll = false;
                        }, 150);
                    });
                    ticking = true;
                }
                ticking = false;
            }
        };
    };
    window_image.onload = function(){
        window_image.onscroll = function(){
            // console.log(current_scroll);
            if(current_scroll != 'text'){
                current_scroll = 'image';
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        window_image_top = window_image.scrollY;
                        window_text.scrollTo(0,window_image_top);
                        if(scroll_timer !== null)
                            clearTimeout(scroll_timer);
                        scroll_timer = setTimeout(function(){
                            current_scroll = false;
                        }, 150);
                    });
                    ticking = true;
                }
                ticking = false;
            }
        };
        // var imgs = window_image.document.querySelectorAll('#image-container img');
        
        // [].forEach.call(imgs, function(el, i){
        //     el.addEventListener('click', function(){
        //         console.log('click');
        //         var thisSrc = el.src;
        //         if(thisSrc !== null)
        //         {
        //             var last_slash_pos = thisSrc.lastIndexOf('/');
        //             var thisFilename = thisSrc.substring(last_slash_pos+1);
        //             // sFilenameInput.value = thisFilename;
        //             // sFilenameForm.submit();
        //             window_zoom = popup('zoom', thisFilename);
        //         }
        //     });
        // });
    };
}

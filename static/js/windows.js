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

var window_top = window.screenTop || window.screenY;
var window_left = window.screenLeft || window.screenX;

function popup(name, param =false){
    console.log('popup: '+name);

    let window_top = window.screenTop || window.screenY;
    let window_left = window.screenLeft || window.screenX;
    let window_width = window.innerWidth;
    let window_height = window.innerHeight;

    var popup_name = 'STRAY. ';
    var name_temp = name;
    var name_cat = '';
    if( name.indexOf('/') !== false )
    {
        name_cat = name_temp.substring(0, name_temp.indexOf('/'));
        name_temp = name_temp.substring(name_temp.indexOf('/'));
        popup_name += name_cat.substring(0, 1).toUpperCase() + name_cat.substring(1);
    }
    popup_name += name_temp.substring(0, 1).toUpperCase() + name_temp.substring(1).toUpperCase();

	if(name == 'colophon' || name == 'afterword' || name == 'instructions-for-use'){
        let popup_width = 645;
        let popup_height = 450;
        let popup_top = window_top;
        let popup_left = window_left + ( window_width - popup_width ) / 2;
		let this_param = 'width='+popup_width+',height='+popup_height+',top='+popup_top+',left='+popup_left+',scrollbars=yes';

		window_text = window.open('/appendix/'+name, popup_name, this_param);
	}
	else if(name == 'text' || name == 'image'){
        let popup_width = 400;
        let popup_height = 400;
        let popup_top = window_top;
        // let popup_left = name == 'image' ? window_left + ( window_width / 2 ) - popup_width : window_left + ( window_width  / 2 ) + 10;
        let popup_left = name == 'image' ? 0 : 200;
        let this_param = 'width='+popup_width+',height='+popup_height+',top='+popup_top+',left='+popup_left+',scrollbars=yes';

        return window.open('/'+name, popup_name, this_param);
    }
    else if(name == 'mobile'){
        var this_param = '';
        let popup_name = 'STRAY. IMAGE';
        
        return window.open('/'+name, popup_name, this_param);
    }
    else if(name == 'print' || name == 'preview' ){
        let popup_width = 900;
        let popup_height = 600;
        let popup_top = window_top;
        let popup_left = window_left + ( window_width - popup_width ) / 2;
        let this_param = 'width='+popup_width+',height='+popup_height+',top='+popup_top+',left='+popup_left+',scrollbars=yes';

        return window.open('/'+name, popup_name, this_param);
    }
    else if(name == 'zoom')
    {
        let popup_width = 800;
        let popup_height = 700;
        let popup_top = window_top;
        let popup_left = window_left + ( window_width - popup_width ) / 2;
        if(popup_left < 0)
            popup_left = 0;
        let this_param = 'width='+popup_width+',height='+popup_height+',top='+popup_top+',left='+popup_left+',scrollbars=yes';

        // return window.open('/chapter'+query, popup_name, this_param);
        return window.open('/zoom-in?filename='+param, 'STRAY. ZOOM-IN', this_param);
    }
    else{
        let popup_width = 645;
        let popup_height = 450;
        let popup_top = window_top;
        let popup_left = window_left + ( window_width - popup_width ) / 2;
        let this_param = 'width='+popup_width+',height='+popup_height+',top='+popup_top+',left='+popup_left+',scrollbars=yes';

		// return window.open('/chapter'+query, popup_name, this_param);
		return window.open('/'+name, popup_name, this_param);
	}
}

function open_chapter(chapter, query = ''){
	// query should be in the format "&query1=value1&query2=value2..."
    window_image = popup(chapter, query, 'image');
    window_allcaps = popup(chapter, query, 'allcaps');
    window_text = popup(chapter, query, 'text');
    // window_audio = popup('audio', '', 'audio');
    // setTimeout(function(){
    //     console.log('popping audio');
    //     window_audio = popup('audio', '', 'audio');
    // }, 5000);
}
var window_image;
var window_text;
var douIsOpened = false;
function open_duo(){
    console.log('open_duo');
    window_image = popup('image');
    window_text = popup('text');

    var window_text_top = 0;
    var window_image_top = 0;
    var window_text_height = 0;
    var window_image_height = 0;
    if(!douIsOpened)
    {
        douIsOpened = true;
        window.addEventListener("message", (event) => {
          try {
            var message = JSON.parse(event.data);
            // console.log(message);
            if(message['status'] == 'loaded')
            {
                if(message['window'] == 'text'){
                    console.log('text is loaded');
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
                }
                else if(message['window'] == 'image'){
                    console.log('image is loaded');
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
                }
            }
          } catch(error) {
            console.log(error);
            return;
          }
        }, false);
    }
    
    /*
    window_text.onload = function(){
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
    */
}

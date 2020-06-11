function call_request_json(){
	// console.log('call_request_json');
	now = new Date();
	now_hr = now.hour();
	now_min = now.minute();
    for(i = 0 ; i < req_array.length ; i++){
    	if(req_array[i]['name'] == 'train')
    		req_array[i]['req_url'] = "https://mtaapi.herokuapp.com/times?hour="+now_hr+"&minute="+now_min;
    	request_json(req_array[i]['name'], req_array[i]['req_url'], req_array[i]['data_type'], req_array[i]['results_count'], req_array[i]['use_header'], req_array[i]['cache_lifecycle'] );
    }
}

function call_update_cache_mtime(){
	for(i = 0 ; i < req_array.length ; i++){
    	update_cache_mtime(req_array[i]['name'], req_array[i]['data_type']);
    }
}

call_request_json();


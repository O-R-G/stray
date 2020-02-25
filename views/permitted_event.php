<?
    // https://data.cityofnewyork.us/City-Government/NYC-Permitted-Event-Information/tvpp-9vvx

    
    $today = date("Y-m-d")."T".date("h:i:s");
    $tomorrow = mktime(0, 0, 0, date("m"), date("d")+1,   date("Y"));
    $tomorrow = date("Y-m-d", $tomorrow)."T00:00:00";
    $q = urlencode(" between '".$today."' and '".$tomorrow."'");
    
    $req_url = 'https://data.cityofnewyork.us/resource/tvpp-9vvx.json?$where=start_date_time'.$q;
    $results = file_get_contents($req_url);
	$results_decoded = json_decode($results, true);

    $output_permitted_event = array(
        "event_name" => $results_decoded[0]["event_name"],
        "event_start_time" => date("m/d h:i", strtotime ($results_decoded[0]["start_date_time"])),
        "event_end_time" => date("m/d h:i", strtotime ($results_decoded[0]["end_date_time"])),
        "event_location" => $results_decoded[0]["event_location"]
    );

    /* 
        relevant keys: 
        event_name, 
        start_date_time, 
        end_date_time, 
        event_location
    */
?>

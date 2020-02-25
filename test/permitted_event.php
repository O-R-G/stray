<!DOCTYPE html>
<html>
<head></head>
<body>
<?
    // https://data.cityofnewyork.us/City-Government/NYC-Permitted-Event-Information/tvpp-9vvx
    // $now_test = new DateTime();

    // $now_test = $milliseconds = round(microtime(true) * 1000);
    // $now_test = $now_test -> format('m-d');
// ?$where=date_extract_m(date)%20between%20%275%27%20and%20%276%27
    $today = date("Y-m-d")."T".date("h:i:s");
    // $now_2 = new DateTime();
    $tomorrow = mktime(0, 0, 0, date("m"), date("d")+1,   date("Y"));
    $tomorrow = date("Y-m-d", $tomorrow)."T00:00:00";
    // var_dump($now_2);
    // $now_d = date('d');
    $q = urlencode(" between '".$today."' and '".$tomorrow."'");
    // echo $q;
    // https://data.cityofnewyork.us/resource/tvpp-9vvx.json?$where=start_date_time+between+2020%2F02%2F25+and+2020%2F03%2F03

    // https://data.cityofnewyork.us/resource/tvpp-9vvx.json?$where=date_extract_m(start_date_time)%20between%20%275%27%20and%20%276%27
    // https://data.cityofnewyork.us/resource/tvpp-9vvx.json?=date_extract_m(start_date_time)+between+2+and+3
    $req_url = 'https://data.cityofnewyork.us/resource/tvpp-9vvx.json?$where=start_date_time'.$q;
    // echo $req_url;
    $results = file_get_contents($req_url);
	$results_decoded = json_decode($results, true);
    print_r($results_decoded[0]);

    $output_permitted_event = array(
        "event_name" => $results_decoded[0]["event_name"],
        "event_start_time" => date("m/d, h:i", strtotime ($results_decoded[0]["start_date_time"])),
        "event_end_time" => date("m/d, h:i", strtotime ($results_decoded[0]["end_date_time"])),
        "event_location" => $results_decoded[0]["event_location"]
    );
    print_r($output_permitted_event);
    /* 
        relevant keys: 
        agency, 
        business_title, 
        work_location, 
        division_work_unit, 
        posting_date,
        job_id
    */
?>
</body>
</html>

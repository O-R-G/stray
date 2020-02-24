<!DOCTYPE html>
<html>
<head></head>
<body>
<?
    // https://data.cityofnewyork.us/City-Government/NYC-Permitted-Event-Information/tvpp-9vvx
    $now_test = new DateTime();

    $now_test = $milliseconds = round(microtime(true) * 1000);
    // $now_test = $now_test -> format('Y-m-d\TH:i:s');
    // $now_test = $now_test -> getTimetamp();
    // $now_test = $now_test.".000";
    // $now_test = new DateTime("2020-02-24T22:35:57.000");
    // echo $now_test;
    // $now_test = 
    // $query = urlencode(""."$now_test");
    // single quote to make $order NOT a php variable 
    $req_url = "https://data.cityofnewyork.us/resource/tvpp-9vvx.json?start_date_time>=".$now_test;
    $results = file_get_contents($req_url);
	$results_decoded = json_decode($results, true);

    // extracting the first 10 vals
    $output = array_slice($results_decoded, 0,9);
    $output = $results_decoded[0]["start_date_time"];
    // foreach($output as $job){
    //     echo nl2br($job["business_title"]."\n");
    // }
    print_r($output);
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

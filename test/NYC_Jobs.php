<!DOCTYPE html>
<html>
<head></head>
<body>
<?
    // https://data.cityofnewyork.us/City-Government/NYC-Jobs/kpav-sd4t

    // single quote to make $order NOT a php variable 
    $req_url = 'https://data.cityofnewyork.us/resource/kpav-sd4t.json?$order=posting_date+DESC';
    $results = file_get_contents($req_url);
	$results_decoded = json_decode($results, true);

    // extracting the first 10 vals
    $output = array_slice($results_decoded, 0,9);
    foreach($output as $job){
        echo nl2br($job["business_title"]."\n");
    }

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

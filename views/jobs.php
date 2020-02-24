<?
    // https://data.cityofnewyork.us/City-Government/NYC-Jobs/kpav-sd4t

    // single quote to make $order NOT a php variable 
    $req_url = 'https://data.cityofnewyork.us/resource/kpav-sd4t.json?$order=posting_date+DESC';
    $results = file_get_contents($req_url, false);
	$results_decoded = json_decode($results, true);

    // extracting the first 10 vals
    // $output = array_slice($results_decoded, 0,9);

    // using the first val
    $results_decoded = $results_decoded[0];

    $output_jobs = array(
        // Make the agency name sentance case
        "job_agency" => ucwords(strtolower($results_decoded["agency"])),
        "job_title" => $results_decoded["business_title"],
        "job_division" => $results_decoded["division_work_unit"],
        "job_location" => $results_decoded["work_location"]
    );

?>

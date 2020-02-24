<?

    $now_hr = date(h);
    $now_min = date(i);

    // composing url with query
    $req_url = "http://mtaapi.herokuapp.com/times?hour=".$now_hr."&minute=".$now_min;
    $results = file_get_contents($req_url, false, $context);
	  $results_decoded = json_decode($results, true);
    $output_train = array();
    $numItems = count($results_decoded["result"]);

    // looping through every val
    // foreach($results_decoded["result"] as $arriving_train){
    //     $output_train .= $arriving_train["name"]." ";
    //     echo $output_train;
    // }

    // Wei: Instead of using every coming train, the first val is used juest for demo,
    // for there are about 200 vals at the time I ran it.
    $output_train = $results_decoded["result"][0]["name"];

?>

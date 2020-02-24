<?

    $now_hr = date(h);
    $now_min = date(i);
    // echo $now_hr.":".$now_min;
    // $req_url = "http://mtaapi.herokuapp.com/stop?id=120S";
    $req_url = "http://mtaapi.herokuapp.com/times?hour=".$now_hr."&minute=".$now_min;
    $results = file_get_contents($req_url, false, $context);
	  $results_decoded = json_decode($results, true);
    $output_train = array();
    $numItems = count($results_decoded["result"]);
    // foreach($results_decoded["result"] as $arriving_train){
    //     // $arriving_train2 = array(
    //     //     "arrival" => (string)$arriving_train["arrival"],
    //     //     "name" => (string)$arriving_train["name"]
    //     // );
    //     // array_push($output_train, $arriving_train2.", ");
    //     // the api doesn't say which train is arriving. 
    //     // if(++$i === 1){
    //     //   $output_train .= $arriving_train["name"];
    //     // }else{
    //     //   $output_train .= ", ".$arriving_train["name"];
    //     // }
    //     $output_train .= $arriving_train["name"]." ";

    //     echo $output_train;
    // }

    $output_train = $results_decoded["result"][0]["name"];

?>

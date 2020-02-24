<?
require_once('./views/head.php');  

// get time
date_default_timezone_set("America/New_York");
$now = date("h:i:sa");
    
// get temperature
require_once('./views/temp.php');
require_once('./views/train.php');
require_once('./views/jobs.php');

// assemble $msg
$msg  = 'New York Consolidated . . . ';
$msg .= $now;
$msg .= ' currently ' . $output['wind_string'];
$msg .= ' /// Currently ' . $output['temp_f'] . ' degrees.';
$msg .= ' There are trains arriving at: ' . $output_train.".";
$msg .= ' ' . $output_jobs["job_agency"] . ' is hiring ' . $output_jobs["job_title"] . " at " . $output_jobs["job_division"] . ", " . $output_jobs["job_location"] . ".";

$msg .= ' 0 1 2 3 4 5 6 7 8 9 Have a nice day.';

$msg = $output_jobs["job_agency"] . ' is hiring ' . $output_jobs["job_title"] . " at " . $output_jobs["job_division"] . ", " . $output_jobs["job_location"] . ".";
?>

<div id="mask">
    <div id="scroller"></div>   
</div>   
    
<script src="./static/js/scroller.js"></script>
<script>        
    Scroller.init('scroller', 120,7);
    Scroller.enqueue('<?= $msg; ?>');
    Scroller.start();
</script>

</html>
</body>

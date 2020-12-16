<?
$name = $item['name1'];
$deck = $item['deck'];
$body = $item['body'];
$notes = $item['notes'];
$date = $item['begin'];
$find = '/<div><br><\/div>/';
$replace = '';
$body = preg_replace($find, $replace, $body); 

?><section id="main">
    <div id='content'>
        <div id='columns'><?
            echo $body;
            if ($date) {
                ?><div id='notes' class='mono'><?
                    echo date("F j, Y", strtotime($date));
                    echo '<br/>';
                    echo $deck;
                    echo '<br/><br/>';
                    echo $notes;
                ?></div><?
            }
        ?></div>
    </div>
</section>

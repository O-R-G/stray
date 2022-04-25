<?
function set_cookie($name=null, $value=null, $expires=null, $path="/")
{
	if(!empty($value))
	{
		setcookie($name, $value, $expires, $path);
	}
}

function get_cookie($name)
{
	if(isset($_COOKIE[$name]))
		return $_COOKIE[$name];
	else
		return null;
}
if(!function_exists('mb_str_split'))
{
	function mb_str_split( $string ) {
	    # Split at all position not after the start: ^
	    # and not before the end: $
	    return preg_split('/(?<!^)(?!$)/u', $string );
	}
}
function getPlainRadioText($escape = false){
	global $oo;
	$temp = $oo->urls_to_ids(array('text-radio'));
	$text_id = end($temp);
	$text_item = $oo->get($text_id);
	$text_raw = strip_tags($text_item['body']);
	$text_raw = str_replace("&nbsp;", " ", $text_raw);

	$text = $text_raw;
	while(ord(substr($text, strlen($text)-1)) == 9  || 
		  ord(substr($text, strlen($text)-1)) == 10  || 
		  ord(substr($text, strlen($text)-1)) == 13)
	{
		$text = substr($text, 0, strlen($text)-1);
	}
	while(ord(substr($text, 0, 1)) == 9  || 
		  ord(substr($text, 0, 1)) == 10  || 
		  ord(substr($text, 0, 1)) == 13)
	{
		$text = substr($text, 1);
	}
	if($escape)
		$text = htmlspecialchars($text, ENT_QUOTES);
	return $text;
}
?>
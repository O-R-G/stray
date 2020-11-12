<?
$chapter = $_GET['chapter'];
$section = $_GET['section'];

if($section == 'text')
{
	
	if($chapter == 1)
	{
		$chapter_id = end($oo->urls_to_ids(array('stray-err')));
		$item = $oo->get($chapter_id);
		echo $item['deck'];
	}
}
else if($section == 'image')
{
	var_dump('image');
}
?>
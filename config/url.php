<?php
/* 
	class for dealing with URLS	
*/
class URL extends URL_Base
{	
	function __construct()
	{
		global $oo;
		
		// nginx-specific
		$urls = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$urls = explode('/', $urls);
		$urls = array_slice($urls, 1);
		
		// check that the object that this URL refers to exists
		try
		{
			$ids = $oo->urls_to_ids($urls);
		}
		catch(Exception $e)
		{
			$urls = array_slice($urls, 0, $e->getMessage());
			$ids = $oo->urls_to_ids($urls);
			if($urls)
				header("Location: ".$host."/".implode("/", $urls));
		}
		$id = end($ids);
		if(!$id)
			$id = 0;
		if(sizeof($ids) == 1 && empty($ids[0]))
			unset($ids);
			
		$this->urls = $urls;
		$this->url = $urls[count($urls)-1];
		$this->ids = $ids;
		$this->id = $id;
	}
	
	public function parents()
	{
		global $oo;
		global $admin_path;
		$urls = $this->urls;
		$ids = $this->ids;
		$parents[] = "";
		
		for($i = 0; $i < count($urls)-1; $i++)
		{
			$parents[$i]['url'] = $admin_path."browse/";
			for($j = 0; $j < $i + 1; $j++)
			{
				$parents[$i]['url'].= $urls[$j];
				if($j < $i)
					$parents[$i]['url'].= "/";
			}
			$parents[$i]["name"] = $oo->name($ids[$i]);
		}
		if($parents[0] == "")
			unset($parents);
		return $parents;
	}
}

?>

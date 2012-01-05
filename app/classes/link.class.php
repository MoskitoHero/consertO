<?php
/**
* 
*/

class Link
{
	
	function build($module=nul, $controller=null, $action=null, $params=array())
	{
		$return = APP_ROOT_URL;
		$arr = array($module, $controller, $action);
		if(is_array($params)){
			$arr = array_merge($arr, $params);
		}
		foreach ($arr as $k => $v) {
			if ( isset($v) && $v != "" ) {
				$return .= $v . DS;
			}
		}
		return $return;
	}
}

?>
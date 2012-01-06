<?php
/**
* 
*/

class Link
{
	
	function build($module=null, $controller=null, $action=null, $params=array())
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
	function buildHtmlLink($text, $options=array(), $module=null, $controller=null, $action=null, $params=array())
	{
		$link = $this->build($module, $controller, $action, $params);
		$opt = "";
		foreach ( $options as $k => $v ) {
			$opt .= $k . "=\"" . $v . "\" ";
		}
		$return = "<a " . $opt . ">" . $text . "</a>";
		return $return;
	}
}

?>
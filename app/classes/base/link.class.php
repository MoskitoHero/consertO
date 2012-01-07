<?php
/**
* 
*/

namespace base;

class Link extends Main

{	
	private static $instance;
	
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
		$return = "<a href=\"" . $link . "\"" . $opt . ">" . $text . "</a>";
		return $return;
	}
	public static function singleton()
    {
        if (!isset(self::$instance)) {
            //echo 'Creating new instance of : ';
            $className = __CLASS__;
            //echo $className;
            self::$instance = new $className;
        }
        return self::$instance;
    }
    
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        trigger_error('Unserializing is not allowed.', E_USER_ERROR);
    }
}

?>
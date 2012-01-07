<?php
/**
* 
*/

namespace base;

class Session extends Main

{
	private static $instance;

	public $var;
	
	function __construct()
	{
		$a = session_id();
		if ( empty($a) ) {
			session_start();
		}
		$this->var = $this->getObject();
		return session_id();
	}
	
	function setVar($var_name, $value) {
		if ($_SESSION[$var_name] = $value) {
			return true;
		} else {
			return false;
		}
	}
	
	function getVar($var) {
		if ( isset( $_SESSION[$var] ) ) {
			return $_SESSION[$var];
		} else {
			return false;
		}
	}
	
	function getObject() {
		if (!empty($_SESSION)) {
			$data = false;
			foreach ($_SESSION as $k => $v) {
				$data -> {$k} = $v;
			}
			return $data;
		}
		return false;
	}
	
	function unsetVar($var) {
		if ( isset( $_SESSION[$var] ) ) {
			unset($_SESSION[$var]);
			$this->var = $this->getObject();
			return true;
		} else {
			return false;
		}
	}
	
	function destroy() {
		$a = session_id();
		if ( ! empty($a) ) {
			session_destroy();
			return true;
		}
		return false;
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
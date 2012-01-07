<?php
/**
* 
*/

namespace base;

class Main

{	

	private static $instance;

	
	function dump(){
		echo "<h1>" . get_class($this) . " :</h1><p><pre>";
		var_dump($this);
		echo "</pre></p><p>&nbsp;</p>";
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
<?php
/**
* 
*/

namespace base;

class Auth extends Main

{

	private static $instance;
	
	function __construct() {
		$this->session = \base\Session::singleton();
	}
	
	function sessionStarted()
	{
		if (!$this->session->var->session_exists){
			//$this->session->setVar("session_exists",true);
			//echo "session don't e";
			return false;
		} else {
			//echo "session e";
			//$this->session->setVar("session_exists",false);
			return true;
		}
	}
	
	function checkLevel() {
		
	}
	
	function getUserRights($access_lvl) {
		if ($access_lvl > 0) {
			// Visitor is trying to access a restricted area
			if ( $this->sessionStarted() ) {
				 //echo "Visitor is a user";
				// Let's check he's allowed to access this area
				$u_lvl = $this->session->var->u_lvl;
				$id = $this->session->var->u_id;
				$user = \R::load('user', $id);
				if (!$user->id) { //echo  "user not found";
					$this->driveOut('');
				} else { 
					if ($user->lvl < $access_lvl) { //echo "user has no rights to see this";
						$this->driveOut('');
					} else {
						 //echo "User can access this";
					}
				}
			} else {
				//echo "not logged in";
				// Let's send the visitor to the login form
				$this->driveOut('login'); //$this->driveOut('login/');
			}
		}
	}
	
	function driveOut($path="") {
		header("location:" . APP_ROOT_URL . $path);
	}
	
	function destroy() {
		return session_destroy();
	}
	
	function logout() {
		$this->destroy();
		$this->driveOut();
	}
	
	function login($u_id, $u_lvl=0) {
		$_SESSION["session_exists"] = true;
		$this->session->setVar("session_exists",true);
		$this->session->setVar("u_lvl",$u_lvl);
		$this->session->setVar("u_id",$u_id);
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
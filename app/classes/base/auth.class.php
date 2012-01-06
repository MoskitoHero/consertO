<?php
/**
* 
*/

namespace base;

class Auth  extends Main

{
	function __construct() {
		$this->session = new Session();
	}
	
	function sessionStarted()
	{
		//var_dump($_SESSION);
		if (!$this->session->session_exists){
			//$this->session->setVar("session_exists",true);
			return false;
		} else {
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
				// Visitor is a user
				// Let's check he's allowed to access this area
				$u_lvl = $this->session->u_lvl;
				$id = $this->session->u_id;
				$user = R::load('user', $id);
				if (!$user->id) { // user not found
					$this->driveOut('');
				} else { 
					if ($user->lvl < $access_lvl) { // user has no rights to see this
						$this->driveOut('');
					} else {
						// User can access this
					}
				}
			} else {
				// Let's send the visitor to the login form
				$this->driveOut('login'); //$this->driveOut('login/');
			}
		}
	}
	
	function driveOut($path="") {
		$_SESSION["notice_keep"] = true;
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
		$this->session->setVar("sesssion_exists",true);
		$this->session->setVar("u_lvl",$u_lvl);
		$this->session->setVar("u_id",$u_id);
	}
}
?>
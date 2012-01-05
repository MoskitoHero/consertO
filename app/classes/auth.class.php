<?php
/**
* 
*/

class Auth
{
	
	function sessionStarted()
	{
		//var_dump($_SESSION);
		if (!$_SESSION["session_exists"]){
			//$_SESSION["session_exists"] = true;
			return false;
		} else {
			//$_SESSION["session_exists"] = false;
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
				$u_lvl = $_SESSION['u_lvl'];
				$id = $_SESSION['u_id'];
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
				$this->driveOut(''); //$this->driveOut('login/');
			}
		}
	}
	
	function driveOut($path="") {
		//header("method:GET");
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
		$_SESSION["u_id"] = $u_id;
		$_SESSION["u_lvl"] = $u_lvl;
	}
}
?>
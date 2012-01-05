<?php
/**
* 
*/

class Auth
{
	
	function getStatus()
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
			if ( $this->getStatus() ) {
				// Visitor is a user
				// Let's check he's allowed to access this area
				$u_lvl = $_SESSION['u_lvl'];
				$id = $_SESSION['u_id'];
				$user = R::load('user', $id);
				if (!$user->id) {
					//echo "User not found";
					$this->driveOut('');
				} else {
					if ($user->lvl < $access_lvl) {
						//echo "User has no rights to see this";
						$this->driveOut('');
					} else {
						//echo "Cool";
					}
				}
			} else {
				// Let's send the visitor to the login form
				$this->driveOut(''); //$this->driveOut('login/');
			}
		}
	}
	
	function driveOut($path="") {
		header("location:" . APP_ROOT_URL . $path);
	}
	
	function destroy() {
		if ($_SESSION["pid"]){
			return session_destroy();
		} else {
			return false;
		}
	}
	
	function logout() {
		$this->destroy();
		$this->driveOut();
	}
	
	function login() {
		$_SESSION["session_exists"] = true;
		$this->driveOut("admin/");
	}
}
?>
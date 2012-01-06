<?php
/**
* 
*/
namespace root;

class loginController extends \base\Controller
{
	
	function index()
	{
		if ( \Auth::sessionStarted() == false ) {
		    return(array("form_url" =>  \Link::build('login', 'login')) );
		} else {
			\Auth::driveOut();
		}
	}
	
	function login($params)
	{
			unset($params['submit']);
			$all = \R::getAll( 'select * from user WHERE username = ? ', array($params['username']) );
			if ( crypt( $params['pass'], $all[0]["pass"]) == $all[0]["pass"] ) { 
				\Auth::login($all[0]["id"],$all[0]["lvl"]);
				\Auth::driveOut();
			} else { 
				$_SESSION["notice"] = "bad credentials";
				\Auth::driveOut('login');
			}
	}
	
	function create($params)
	{
			unset($params['submit']);
			if ( strlen($params['pass']) > 5 && $params['pass'] === $params['pass_confirm']) {
				$all = \R::getAll( 'select * from user WHERE username = ? ', array($params['username']) );
				if ( !empty($all) ) {
				$_SESSION["notice"] =  "user already exists";
				return array();
				} else {
					unset($params['pass_confirm']);
					$user = \R::dispense( 'user' );
					$user->username = $params['username'];
					$user->pass = crypt($params['pass']);
					$user->lvl = $params['lvl'];
					$id = \R::store($user);
					$_SESSION["notice"] = "user account created";
					return array();
				}
			} else {
				$_SESSION["notice"] = "passwords don't match or password is too short<br/>
										<a href=' ".
										\Link::build('login', 'register')
										."'>Try again.</a>";
				return array();
			}
	}
	
	function register()
	{
		if ( \Auth::sessionStarted() == false ) {
		    return(array("form_url" =>  \Link::build('login', 'create')) );
		} else {
			\Auth::driveOut();
		}
	}
}

?>
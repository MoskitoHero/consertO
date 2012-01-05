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
			if ($all[0]["pass"]== $params["pass"]) {
			// if ( crypt( $params['pass'], $all[0]["pass"]) == $all[0]["pass"] ) { 
				\Auth::login($all[0]["id"],$all[0]["lvl"]);
				\Auth::driveOut();
			} else { 
				\Auth::driveOut('login');
			}
	}
}

?>
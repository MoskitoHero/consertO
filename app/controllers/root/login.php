<?php
/**
* 
*/
namespace root;

class loginController extends \base\Controller
{
	public $components = array(
		"base\Auth" => "auth",
		"base\Session" => "session",
		"base\Link" => "link"
	);
	
	function index()
	{
		if ( $this->auth->sessionStarted() == false ) {
		    return(array("form_url" =>  $this->link->build('login', 'login')) );
		} else {
			$this->auth->driveOut();
		}
	}
	
	function login($params)
	{
			unset($params['submit']);
			$all = \R::getAll( 'select * from user WHERE username = ? ', array($params['username']) );
			if ( crypt( $params['pass'], $all[0]["pass"]) == $all[0]["pass"] ) { 
				$this->auth->login($all[0]["id"],$all[0]["lvl"]);
				$this->auth->driveOut();
			} else { 
				$this->session->setVar("notice", "bad credentials");
				$this->auth->driveOut('login');
			}
	}
	
	function create($params)
	{
			unset($params['submit']);
			if ( strlen($params['pass']) > 5 && $params['pass'] === $params['pass_confirm']) {
				$all = \R::getAll( 'select * from user WHERE username = ? ', array($params['username']) );
				if ( !empty($all) ) {
				$this->session->setVar("notice", "user already exists");
				$this->auth->driveOut('login/register');
				} else {
					unset($params['pass_confirm']);
					$user = \R::dispense( 'user' );
					$user->username = $params['username'];
					$user->email = $params['email'];
					$user->pass = crypt($params['pass']);
					$user->lvl = $params['lvl'];
					$id = \R::store($user);
					$this->session->setVar("notice", "user account created");
					$this->auth->driveOut('login');
				}
			} else {
				$this->session->setVar("notice", "passwords don't match or password is too short<br/>"
										. $this->link->buildHtmlLink("Try again.", array(), 'login', 'register')
										);
				$this->auth->driveOut('login/register');
			}
	}
	
	function register()
	{
		if ( $this->auth->sessionStarted() == false ) {
		    return(array("form_url" =>  $this->link->build('login', 'create')) );
		} else {
			$this->auth->driveOut();
		}
	}
}

?>
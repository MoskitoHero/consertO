<?php
namespace base;


set_include_path(dirname(__FILE__).'/app/classes/');
spl_autoload_extensions('.class.php,.php');
spl_autoload_register();


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
$request = Request::createFromGlobals();
echo $request->getPathInfo();
$response = new Response('Not Found', 404, array('Content-Type' => 'text/plain'));
$response->send();

Class App
{

	private static $instance;
	
	function __construct()
	{
		$this->t = new \base\alpha\Two();
	}
	
	function play()
	{
		echo "Play Yvette";
	}
	public static function singleton()
    {
        if (!isset(self::$instance)) {
            echo 'Creating new instance of : ';
            $className = __CLASS__;
            echo $className;
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

namespace base\alpha;

Class One Extends \base\App

{
	function __construct()
	{
		echo "Class One loaded";
		parent::play();
	}
}

namespace base\alpha;

Class Two Extends One
{
	
}

use App;
$a = new \base\alpha\Two();
echo "off";
$a->play();
$b = new \base\App();
echo count(get_declared_classes());
?>
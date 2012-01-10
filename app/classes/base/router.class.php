<?php
/**
* 
*/

namespace base;

class Router extends Main

{
	private $config; // xml config file object
	public $current; // array
	public $module; // string
	public $controller; // string
	public $id; // string
	public $params; // array
	public $access_lvl; //string
	private $ssl; // boolean
	public $status;
	public $method; // GET, POST, PUT, DELETE
	
	private static $instance;
	
	function __construct()
	{
		$this->session = Session::singleton();
		$yaml = new \base\yaml\sfYamlParser();
		$this->yamlConfig = $yaml->parse(file_get_contents(APP_ROOT_DIR . '/config/routes.yml'));
		$base = str_replace('index.php','',$_SERVER['PHP_SELF']);
		if($base!="/"){
			$str_path = str_replace($base,'',$_SERVER['REQUEST_URI']);
		} else {
			$str_path = $_SERVER['REQUEST_URI'];
		}
		$str_path = str_replace('?' . $_SERVER['REDIRECT_QUERY_STRING'],'',$str_path);
		$this->current = explode('/',$str_path);
		$this->ssl = false;
		foreach ($this->yamlConfig as $r=>$v){
			if ($this->current[0] == $v["path"]){
				$this->module = $r;
				$this->access_lvl = $v["security"]["access_lvl"];
				$this->ssl = $v["security"]["ssl"];
				array_shift($this->current);
			}
		}
		if (empty($this->module)){
			$this->module = 'root';
		}
		$this->sslRedirect();
		$this->status = found;
		$this->parseURL();
		return true;
	}
	
	function parseURL() {
		$this->controller = ($this->current[0]=="")?"default":$this->current[0];
		array_shift($this->current);
		$this->action = ($this->current[0]=="")?"index":$this->current[0];
		if (preg_match('/\d/',$this->action) != 0) {
			$this->id = $this->action;
			$this->action = "index";
			array_shift($this->current);
		} else {
			array_shift($this->current);
			$this->id = ($this->current[0]=="")?"":$this->current[0];
		}
		$this->params = array_merge($this->current, $this->parseHttpMethod());
		if ($this->action=="delete"){$this->method = "DELETE";}
		if ($this->action=="update"){$this->method = "PUT";}
		$this->session->setVar("route", 
								array(	"module" => 	$this->module,
								"controller" =>	$this->controller,
								"action" => $this->action,
								"id" => $this->id,
								"method" => $this->method
							) );
	}
	
	function parseHttpMethod() {
		$this->method = $_SERVER["REQUEST_METHOD"];
		switch($this->method) {
			case "GET":
				$return = $_GET;
				break;
			case "POST":
				$return = $_POST;
				break;
			default:
				$return = array();
				break;
		}
		return $return;
	}
	
	private function printError($msg) {
		echo "<div class='SkinAndBonesFatal' style='color:red'>FATAL ERROR: <br/>";
		echo "" . $msg . "</div>";
	}
	
	private function sslRedirect(){
		$req_uri =  str_replace('//','/',$_SERVER['REQUEST_URI']);
		if ($this->ssl && $_SERVER["HTTPS"]!= 'on'){
			$redirection = "https://" . $_SERVER['HTTP_HOST'] . $req_uri;
			header("Location:".$redirection);
		} elseif (!$this->ssl && $_SERVER["HTTPS"]== 'on')  {
			$redirection = "http://" . $_SERVER['HTTP_HOST'] . $req_uri;
			header("Location:".$redirection);
		}
	}
	
	function callUpRoute() {
		$c_filepath = APP_ROOT_DIR . '/app/controllers/' . $this->module . '/' . $this->controller . '.php';
		$v_filepath = APP_ROOT_DIR . '/app/views/' . $this->module . '/' . $this->controller . '/' . $this->action . '.twig';
		if (file_exists($c_filepath)){
			require_once($c_filepath);
			$classname = 'base\\' . $this->module . '\\' . $this->controller . 'Controller';
			$this->c = new $classname();
			$this->c->loadComponents($this->c->components);
			if (file_exists($v_filepath)) { 
				// We've got a view for this !
				$this->session->setVar("display_sidebar", true); // display the sidebar by defaut
				$t_dirpath = APP_ROOT_DIR . '/app/views/';
				$t_filename = $this->module . '/' . $this->controller . '/' . $this->action . ".twig";
				$siteConfig = \base\siteConfig::singleton();
				$loader = new \	Twig_Loader_Filesystem($t_dirpath);
				$twig = new \Twig_Environment($loader);
				$tweeg = new \base\Tweeg();
				$twig->addExtension(new \base\Tweeg());
				$twig->addFunction('erase_notice', new \Twig_Function_Method($tweeg, 'eraseNotice'));
				$twig->addFunction('show_sidebar', new \Twig_Function_Method($tweeg, 'showSidebar'));
				echo $twig->render('__skeleton/header.twig', $siteConfig->getHeaderConfig());
				echo $twig->render('__skeleton/notice.twig', array("notice" =>  $_SESSION["notice"]) );
				call_user_func( array( $this->c, $this->action ), $this->params );
				echo $twig->render('__skeleton/footer.twig', $siteConfig->getFooterConfig());
			} else {
				// No view for this controller. Just extecute it. No need to add header, footer, etc.
				call_user_func( array( $this->c, $this->action ), $this->params );
			}
		} else {
			$siteConfig = \base\siteConfig::singleton();
			$config = $siteConfig->getGlobalConfig();
			print_r($config);
			if ($config["debug"]) {
				$this->create404("Controller doesn't exist in filesystem. Please create one here: " . $c_filepath);
			} else {
				$this->create404("Page doesn't exist");
			}
			return false;
		}
		return true;
	}
	
	function create404($msg="") {
		$this->status = '404';
		$t_dirpath = APP_ROOT_DIR . '/app/views/';
		$siteConfig = \base\siteConfig::singleton();
		$loader = new \Twig_Loader_Filesystem($t_dirpath);
		$twig = new \Twig_Environment($loader);
		echo $twig->render('__skeleton/header.twig', $siteConfig->getHeaderConfig());
		$this->printError($msg);
		echo $twig->render('__skeleton/footer.twig', $siteConfig->getFooterConfig());
		return true;
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
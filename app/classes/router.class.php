<?php
/**
* 
*/

class Router
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
	
	function __construct()
	{
		//$this->config = simplexml_load_file(APP_ROOT_DIR .'/config/routes.xml');
		$json = file_get_contents(APP_ROOT_DIR .'/config/routes.json');
		$this->jsonConfig = json_decode($json);
		$base = str_replace('index.php','',$_SERVER['PHP_SELF']);
		$str_path = str_replace($base,'',$_SERVER['REQUEST_URI']);
		$this->current = explode('/',$str_path);
		$this->ssl = false;
		foreach ($this->jsonConfig->routes as $r=>$v){
			if ($this->current[0] == $v->path){
				$this->module = $v->name;
				$this->access_lvl = $v->security->access_lvl;
				$this->ssl = $v->security->ssl;
				array_shift($this->current);
			}
		}
		if (empty($this->module)){
			$this->module = 'root';
		}
		$this->sslRedirect();
		$this->status = found;
		$this->controller = ($this->current[0]=="")?"default":$this->current[0];
		array_shift($this->current);
		$this->action = ($this->current[0]=="")?"index":$this->current[0];
		array_shift($this->current);
		$this->id = ($this->current[0]=="")?"":$this->current[0];
		$this->params = $this->current;
		return true;
	}
	
	
	function debugRoute(){
		return $this;
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
		$v_filepath = APP_ROOT_DIR . '/app/views/' . $this->module . '/' . $this->controller . '/' . $this->action . '.tpl';
		if (file_exists($c_filepath)){
			require_once($c_filepath);
			$controller_array = call_user_func( $this->module . '\\' . $this->controller . 'Controller::' . $this->action , $this->params);
			if (file_exists($v_filepath)){
				$t_dirpath = APP_ROOT_DIR . '/app/views/';
				$t_filename = $this->module . '/' . $this->controller . '/' . $this->action . ".tpl";
				$siteConfig = new siteConfig();
				$loader = new Twig_Loader_Filesystem($t_dirpath);
				$twig = new Twig_Environment($loader);
				echo $twig->render('__skeleton/header.tpl', $siteConfig->getHeaderConfig());
				if (!empty($controller_array)){
					echo $twig->render($t_filename, $controller_array);
				} else {
					echo $twig->render($t_filename);
				}
				echo $twig->render('__skeleton/footer.tpl', $siteConfig->getFooterConfig());
			} 	else {
					$this->create404("View doesn't exist in filesystem. Please create one here: " . $v_filepath);
					return false;
				}
		} else {
			$this->create404("Controller doesn't exist in filesystem. Please create one here: " . $c_filepath);
			return false;
		}
		return true;
	}
	
	function create404($msg="") {
		$this->status = '404';
		$this->printError($msg);
		return false;
	}
}
?>
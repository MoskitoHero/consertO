<?php
/// Work out the URL
function url(){
	$pr = $_SERVER['HTTPS'] ? "https" : "http";
	$u = str_replace('index.php','',$_SERVER['PHP_SELF']);
	return $pr . "://" . $_SERVER['HTTP_HOST'] . $u ;
}
$base = url();
define ('APP_ROOT_URL', $base);
define ('APP_ROOT_DIR', dirname(__FILE__));
define ('DS', '/');

/// Include paths for Autoload
set_include_path(dirname(__FILE__).'/app/classes/');
spl_autoload_extensions('.class.php');
spl_autoload_register();

/// Get site Config
$siteConfig = \base\siteConfig::singleton();
$config = $siteConfig->getGlobalConfig();

/// Load Twig
require_once APP_ROOT_DIR . '/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

/// Load Redbean
require_once(APP_ROOT_DIR . '/lib/RedBeanPHP/RedBean/redbean.class.php');
R::setup('mysql:host=' . $config["database"]->server . 
			';dbname=' . $config["database"]->dbname,
			$config["database"]->user , 
			$config["database"]->pass 
		);

// Load base controller class
require_once('app/controllers/controller.php');

/// Load router (here we go !)
require_once('app/core/router.php');

/// Print out debug data if set to true in config.
if ($config["debug"]){
	echo "<div id='WinterBreezeDebug'><pre>";
	print_r($debug_dump);
	echo "</pre></div>";
}
?>
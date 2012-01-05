<?php
session_start();
$debug = false;
//var_dump($_SERVER);
function url(){
	$pr = $_SERVER['HTTPS'] ? "https" : "http";
	$u = str_replace('index.php','',$_SERVER['PHP_SELF']);
	return $pr . "://" . $_SERVER['HTTP_HOST'] . $u ;
}
$base = url();
define ('APP_ROOT_URL', $base);
define ('APP_ROOT_DIR', dirname(__FILE__));
set_include_path(dirname(__FILE__).'/app/classes/');
spl_autoload_extensions('.class.php');
spl_autoload_register();
require_once APP_ROOT_DIR . '/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
require_once(APP_ROOT_DIR . '/lib/RedBeanPHP/RedBean/redbean.class.php');
R::setup('mysql:host=localhost;dbname=test','root','2719FZK');
//$siteConfig = new siteConfig();
//$viewsPath = APP_ROOT_DIR . '/app/views/';
//$mainLoader = new Twig_Loader_Filesystem($viewsPath);
//$mainTwig = new Twig_Environment($mainLoader);
//echo $mainTwig->render('__skeleton/header.tpl', $siteConfig->getHeaderConfig());
require_once('app/controllers/controller.php');
require_once('app/core/router.php');
//echo $mainTwig->render('__skeleton/footer.tpl', $siteConfig->getFooterConfig());

/*
$user = R::dispense( 'user' );
$user->username = 'admin';
$user->pass = '2719FZK';
$user->lvl = '10';
$_SESSION['u_lvl'] = $user->lvl;
$id = R::store($user);
$_SESSION['u_id'] = $id;
var_dump($_SESSION);*/
?>
<?php
if ($debug){
	echo "<div id='WinterBreezeDebug'><pre>";
	print_r($debug_dump);
	echo "</pre></div>";
}

?>
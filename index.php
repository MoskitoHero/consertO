<?php
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
require_once('app/controllers/controller.php');
require_once('app/core/router.php');
$blog = R::dispense( 'blog' );
$blog->title = 'Boost development with RedBeanPHP';
$blog->author = 'Charles Xavier'; 
$id = R::store($blog);
?>
<?php
if ($debug){
	echo "<div id='WinterBreezeDebug'><pre>";
	print_r($debug_dump);
	echo "</pre></div>";
}

?>
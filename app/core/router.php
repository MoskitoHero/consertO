<?php
// File should be renamed

// Init Classes
$appSession = new base\Session();
$appRouter = new base\Router();
$auth = new base\Auth();
$link = new base\Link();

// Check user Auth
$auth->getUserRights($appRouter->access_lvl);

// Go !!!
$appRouter->callUpRoute();

// Debug information
$debug=false;
if ($debug) {
	echo '<pre>';
	print_r($GLOBALS);
	echo '</pre>';
}
?>
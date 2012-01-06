<?php

//var_dump($_SERVER);

// Init Classes
$appSession = new Session();
//$appSession->unsetVar($var["r"]);
//$appSession->dump();
$appRouter = new Router();
$auth = new Auth();
$link = new Link();

// Check user Auth
$auth->getUserRights($appRouter->access_lvl);

// Go !!!
$appRouter->callUpRoute();

// Debug information
if ($debug) {
	$debug_dump['Router'] = $appRouter->debugRoute();
}
?>
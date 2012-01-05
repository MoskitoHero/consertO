<?php
$appRouter = new Router();
$auth = new Auth();
$auth->getUserRights($appRouter->access_lvl);
if($appRouter->controller == "logout") {
	$auth->logout();
}
if($appRouter->controller == "login") {
	$auth->login();
}
$appRouter->callUpRoute();
if ($debug) {
	$debug_dump['Router'] = $appRouter->debugRoute();
}
?>
<?php
$appRouter = new Router();
$appRouter->callUpRoute();
if ($debug) {
	$debug_dump['Router'] = $appRouter->debugRoute();
}
?>
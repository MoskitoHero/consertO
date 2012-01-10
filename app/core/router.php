<?php
// File should be renamed

// Init Classes
$appSession = \base\Session::singleton();
$appRouter = \base\Router::singleton();
$auth = \base\Auth::singleton();
$link = new base\Link();

// Check user Auth
$auth->getUserRights($appRouter->access_lvl);

// Go !!!
$appRouter->callUpRoute();
?>
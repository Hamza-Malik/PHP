<?php

require '../autoload.php';
$routes = new \Ijdb\Controllers\Routes();
$entryPoint = new \CSY2028\EntryPoint($routes);
$entryPoint->run();

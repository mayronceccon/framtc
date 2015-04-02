<?php

include 'vendor/autoload.php';
include 'config.php';
include 'bootstrap.php';

use \Application\Application;

$application = new Application();
$application->init();
?>
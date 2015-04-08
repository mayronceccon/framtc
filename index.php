<?php

include 'vendor/autoload.php';
include 'config.php';
include 'bootstrap.php';

use \Application\Application;

Analog::handler('logs/logs.log'); // https://github.com/jbroadway/analog
Application::init();
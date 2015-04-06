<?php
ini_set('default_charset', 'UTF-8');

date_default_timezone_set('America/Sao_Paulo');

$erro = true;

if($erro){
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
}else{
	ini_set('display_errors',0);
	ini_set('display_startup_erros',0);
}

error_reporting(E_ALL);

$cfg_protocol = (@$_SERVER['HTTPS'] == 'on') ? 'https' : 'http';
$cfg_site = $cfg_protocol . '://' . $_SERVER['HTTP_HOST'] . '/' . basename(dirname(__FILE__)) . '/';
$cfg_dir = dirname(__FILE__) . '/';

define('__PATH__', $cfg_dir);
define('__SITE__', $cfg_site);
define('DS', DIRECTORY_SEPARATOR);
define('__CSS__', __SITE__ . "static/css/");
define('__JS__', __SITE__ . "static/js/");
define('__IMG__', __SITE__ . "static/img/");


//development OR production
define('APPLICATION_ENV', 'development');
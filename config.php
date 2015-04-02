<?php
//Mostrar erros na tela
ini_set('display_errors', 1);

//reportar qualquer erro
error_reporting(E_ALL);

global $database;

$cfg_protocol = (@$_SERVER['HTTPS'] == 'on') ? 'https' : 'http';
$cfg_site = $cfg_protocol . '://' . $_SERVER['HTTP_HOST'] . '/' . basename(dirname(__FILE__)) . '/';
$cfg_dir = dirname(__FILE__) . '/';

define('__PATH__', $cfg_dir);
define('__SITE__', $cfg_site);
define('DS', DIRECTORY_SEPARATOR);
define('__CSS__', __SITE__ . "static/css/");
define('__JS__', __SITE__ . "static/js/");
define('__IMG__', __SITE__ . "static/img/");

$database = array(
	'user'		=> "mayron",
	'password' 	=> "M@yron151290",
	'dbname' 	=> "framtc",
	'host' 		=> "localhost",
	'type' 		=> "pgsql"
);

use \Routes\Routes;

$rotas = array(
	'/' 			=> array('as' => 'index', 'controller' => 'IndexController', 'action' => 'indexAction'),
	'index/' 		=> array('as' => 'index_1', 'controller' => 'IndexController', 'action' => 'indexAction'),
	'index/index' 	=> array('as' => 'index_2', 'controller' => 'IndexController', 'action' => 'indexAction'),
	'index/produto' => array('as' => 'produtos', 'controller' => 'IndexController', 'action' => 'produtoAction'),
	'index/contato' => array('as' => 'contato', 'controller' => 'IndexController', 'action' => 'contatoAction'),
);
Routes::setRoutes($rotas);
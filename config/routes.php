<?php
$routes = array(
	'/' 			=> array('as' => 'index', 'controller' => 'IndexController', 'action' => 'indexAction'),
	'index/' 		=> array('as' => 'index_1', 'controller' => 'IndexController', 'action' => 'indexAction'),
	'index/index' 	=> array('as' => 'index_2', 'controller' => 'IndexController', 'action' => 'indexAction'),
	'index/produto' => array('as' => 'produtos', 'controller' => 'IndexController', 'action' => 'produtoAction'),
	'index/contato' => array('as' => 'contato', 'controller' => 'IndexController', 'action' => 'contatoAction'),
	'index/popular' => array('as' => 'popular', 'controller' => 'IndexController', 'action' => 'popularAction')
);
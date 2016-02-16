<?php
include 'vendor/autoload.php';
include 'config.php';
include 'bootstrap.php';

//use \Application\Application;

Analog::handler('logs/logs.log'); // https://github.com/jbroadway/analog

$app = new \Slim\Slim();
$app->get('/', function () {
    echo "Hello, ";
});

$app->get('/:pagina', function ($pagina) {
    echo "Hello, ";
});

//Dados
//$app->get('/dados/:placa(/:limite)(/:data_inicio)(/:data_fim)', 'Controllers\ControllerPosicoes:buscaDadosXML');

//404
$app->notFound(function () use ($app) {
    echo json_encode(array('erro' => -3, 'mensagem' => utf8_encode('Url não encontrada.')));
});

$app->run();


//Application::init();

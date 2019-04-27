<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/all', function (Request $request, Response $response) {
	   	$mapper = new OutlawMapper($this->db);
	    $cards = $mapper->getCards();
	    return $response->withJson($cards);
	});

	$app->get('/jsontest', function ($request, $response, $args) {
	    $response = $response->withJson(['foo' => 'bar']);
	    return $response;
	});

	$app->get('/{id}', function (Request $request, Response $response, $args) {
		$id = (int) $args['id'];
		$mapper = new CardMapper($this->db);
		$card = $mapper->getCardById($id);
		return $response->withJson($card);
	});

	$app->get('/code/{code}', function (Request $request, Response $response, $args) {
		$code = (int) $args['code'];
		$mapper = new CardMapper($this->db);
		$card = $mapper->getCardByCode($code);
		return $response->withJson($card);
	});

	$app->get('/name/{name}', function (Request $request, Response $response, $args) {
		$name = (int) $args['name'];
		$mapper = new CardMapper($this->db);
		$cards = $mapper->getCardByName($name);
	    return $response->withJson($cards);
	});
};

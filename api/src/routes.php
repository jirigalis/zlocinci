<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/all', function (Request $request, Response $response) {
	   	$mapper = new CardMapper($this->db);
	    $cards = $mapper->getCards();
	    return $response->withJson($cards);
	});

	$app->get('/search', function (Request $request, Response $response, $args) {
		$params = $request->getQueryParams();
		$mapper = new CardMapper($this->db);
		$searchResults = $mapper->search($params["term"]);
		return $response->withJson($searchResults);
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

	$app->get('/{id}', function (Request $request, Response $response, $args) {
		$id = (int) $args['id'];
		$mapper = new CardMapper($this->db);
		$card = $mapper->getCardById($id);
		return $response->withJson($card);
	});

	/// CORS ENABLING
	/*$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
	});*/

	/*$app->add(function ($req, $res, $next) {
	    $response = $next($req, $res);
	    return $response
	            ->withHeader('Access-Control-Allow-Origin', 'http://localhost')
	            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
	            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
	});

	$app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
	    $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
	    return $handler($req, $res);
	});*/
};

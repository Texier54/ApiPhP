<?php


	require_once __DIR__.'/../src/vendor/autoload.php';

	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

$conf = ['settings' => ['displayErrorDetails' => true]];
$app = new \Slim\App($conf);

$app->get('/hello/{name}', function (Request $req, Response $resp, $args) {
	$name = $args['name'];
	$resp->getBody()->write("Hello, $name");
	return $resp;
	}
);



$app->get('/categorie[/]', function (Request $req, Response $resp, $args) {

	$c = new lbs\control\CatalogueController($this);
	return $c->getCategorie($req, $resp, $args);
}
);

$app->get('/categorie/{id}', function (Request $req, Response $resp, $args) {

	$c = new lbs\control\CatalogueController($this);

	return $c->getDesc($req, $resp, $args);
	}
);

$app->run();
 
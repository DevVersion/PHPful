<?php

require '../vendor/autoload.php';

$app = new PHPful\App();

$app->get("/", function() use ($app) {
	$app->response->setStatusCode(200);
	$app->response->end(json_encode(array("error" => false, "message" => "Welcome to PHPful")));
});

$app->get("/test", function() use ($app) {
	$app->response->end("Welcome to the Test Route");
});

$app->run();
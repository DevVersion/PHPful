<?php

namespace PHPful;

class App {

	private static $VERSION = "0.0.1";

	private $GET = array();

	public $request, $response;

	function __construct() {
		$this->request = new Http\Request();
		$this->response = new Http\Response();
	}

	public function get($route, $function) {
		if (empty($route)) throw \InvalidArgumentException("PHPful route can't be empty.");
		if (is_callable($function) == false) throw \InvalidArgumentException("PHPFul function isn't callable.");

		$this->GET[$route] = $function;
	}

	public function run() {
		$route = $this->request->getRequestRoute();
		$closures = $this->{$this->request->getRequestType()};

		if (array_key_exists($route, $closures)) {
			$closures[$route]();
		} else {
			$this->response->setStatusCode(404);
			$this->response->end("Route not found.");
		}
	}

	public static function getVersion() {
		return self::$VERSION;
	}

}
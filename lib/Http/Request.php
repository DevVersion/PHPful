<?php

namespace PHPful\Http;

class Request {

	private $requestUri, $routeDirectory, $requestRoute, $requestType;

	function __construct() {
		preg_match("/^(.+)\//", $_SERVER['SCRIPT_NAME'], $matchRouteDirectory);
		if (count($matchRouteDirectory) != 2) throw new \Exception("Route Directory couln't be matched.");

		$this->routeDirectory = $matchRouteDirectory[1];
		$this->requestUri =  $_SERVER['REQUEST_URI'];
		$this->requestRoute = explode($this->routeDirectory, $this->requestUri)[1];
		$this->requestType = RequestType::fromString($_SERVER['REQUEST_METHOD']);
	}

	public function getRequestUri() {
		return $this->requestUri;
	}

	public function getRouteDirectory() {
		return $this->routeDirectory;
	}

	public function getRequestRoute() {
		return $this->requestRoute;
	}

	public function getRequestType() {
		return $this->requestType;
	}

}
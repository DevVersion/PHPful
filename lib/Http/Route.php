<?php

namespace PHPful\Http;

class Route {

	private $uri, $type, $closure;

	function __construct($uri, $type, $closure) {
		$this->uri = $uri;
		$this->type = $type;
		$this->closure = $closure;

		preg_match("/(?!\/).+/", $uri, $matchUriSplit);
		print_r($matchUriSplit);
	}

	public function getUri() {
		return $this->uri;
	}

	public function getType() {
		return $this->type;
	}

	public function getClosure() {
		return $this->closure;
	}
}
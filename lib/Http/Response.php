<?php

namespace PHPful\Http;

class Response {


	public function write($data) {
		echo $data;
	}

	public function end($data) {
		die($data);
	}

	public function setStatusCode($code) {
		if (is_numeric($code) == false) throw new \InvalidArgumentException("Status Code needs to be numeric.");
		http_response_code($code);
	}

	public function getStatusCode() {
		return http_response_code();
	}

}
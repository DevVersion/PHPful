<?php

namespace PHPful\Http;

class RequestType {

	const GET = "GET";
	const POST = "POST";
	const PUT = "PUT";
	const DELETE = "DELETE";

	public static function fromString($string) {
		return constant("self::" . $string);
	}
}
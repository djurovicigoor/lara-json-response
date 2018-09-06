<?php

namespace DjurovicIgoor\LaraJsonResponse;

use Illuminate\Support\Facades\Response;

class LaraJsonResponse {
	
	public $message;
	public $code;
	public $data;
	public $error;
	
	/**
	 * LaraJsonResponse constructor.
	 *
	 * @param null $message
	 * @param null $data
	 * @param null $error
	 */
	public function __construct($message = NULL, $data = NULL, $error = NULL) {
		
		$this->message = $message;
		$this->data    = $data;
		$this->error   = $error;
		$this->code    = 200;
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function success() {
		
		return $this->globalResponse(200);
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function error() {
		
		return $this->globalResponse(400);
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function notFound() {
		
		return $this->globalResponse(404);
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function validationError() {
		
		return $this->globalResponse(422);
	}
	
	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function unAuthorized() {
		
		return $this->globalResponse(401);
	}
	
	/**
	 * @param $code
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function customCode($code) {
		
		return $this->globalResponse($code);
	}
	
	/**
	 * @param null $code
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function globalResponse($code = NULL) {
		
		return Response::json([
			'code'    => !is_null($code) ? $code : $this->code,
			'message' => $this->message,
			'data'    => $this->data,
			'error'   => $this->error,
		], !is_null($code) ? $code : $this->code);
	}
}
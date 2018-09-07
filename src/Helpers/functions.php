<?php
/**
 * Created by PhpStorm.
 * User: Djurovic Igor
 * Date: 6.9.18.
 * Time: 10.30
 */

use DjurovicIgoor\LaraJsonResponse\LaraJsonResponse;

if (!function_exists('laraResponse')) {
	
	/**
	 * @param      $message
	 * @param      $data
	 * @param null $error
	 *
	 * @return mixed
	 */
	function laraResponse($message = NULL, $data = NULL, $error = NULL) {
		
		$laraResponse = new LaraJsonResponse($message, $data, $error);
		
		if (is_null($message) && is_null($data) && is_null($error)) {
			
			return $laraResponse->success();
		}
		
		return $laraResponse;
	}
}
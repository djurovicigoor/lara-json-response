<?php

use Illuminate\Http\JsonResponse;
use DjurovicIgoor\LaraJsonResponse\LaraJsonResponse;

if (!function_exists('laraResponse')) {
    /**
     * Create a new LaraJsonResponse instance or return a success response.
     *
     * @param  mixed  $message
     * @param  mixed  $data
     * @param  mixed  $error
     * @return LaraJsonResponse|JsonResponse
     */
    function laraResponse(mixed $message = null, mixed $data = null, mixed $error = null): LaraJsonResponse|JsonResponse
    {
        $laraResponse = new LaraJsonResponse($message, $data, $error);

        if (is_null($message) && is_null($data) && is_null($error)) {
            return $laraResponse->success();
        }

        return $laraResponse;
    }
}

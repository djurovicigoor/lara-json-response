<?php

namespace DjurovicIgoor\LaraJsonResponse;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class LaraJsonResponse
{
    /**
     * LaraJsonResponse constructor.
     *
     * @param  mixed  $message
     * @param  mixed  $data
     * @param  mixed  $error
     * @param  int  $code
     */
    public function __construct(
        public mixed $message = null,
        public mixed $data = null,
        public mixed $error = null,
        public int $code = 200,
    ) {
    }

    /**
     * Return a success (200) JSON response.
     *
     * @return JsonResponse
     */
    public function success(): JsonResponse
    {
        return $this->globalResponse(200);
    }

    /**
     * Return an error (400) JSON response.
     *
     * @return JsonResponse
     */
    public function error(): JsonResponse
    {
        return $this->globalResponse(400);
    }

    /**
     * Return an unauthorized (401) JSON response.
     *
     * @return JsonResponse
     */
    public function unAuthorized(): JsonResponse
    {
        return $this->globalResponse(401);
    }

    /**
     * Return a forbidden (403) JSON response.
     *
     * @return JsonResponse
     */
    public function forbidden(): JsonResponse
    {
        return $this->globalResponse(403);
    }

    /**
     * Return a not found (404) JSON response.
     *
     * @return JsonResponse
     */
    public function notFound(): JsonResponse
    {
        return $this->globalResponse(404);
    }

    /**
     * Return a validation error (422) JSON response.
     *
     * @return JsonResponse
     */
    public function validationError(): JsonResponse
    {
        return $this->globalResponse(422);
    }

    /**
     * Return a JSON response with a custom HTTP status code.
     *
     * @param  int  $code
     * @return JsonResponse
     */
    public function customCode(int $code): JsonResponse
    {
        return $this->globalResponse($code);
    }

    /**
     * Build and return the JSON response.
     *
     * @param  int|null  $code
     * @return JsonResponse
     */
    protected function globalResponse(?int $code = null): JsonResponse
    {
        $statusCode = $code ?? $this->code;

        return Response::json([
            'code'    => $statusCode,
            'message' => $this->message,
            'data'    => $this->data,
            'error'   => $this->error,
        ], $statusCode);
    }
}
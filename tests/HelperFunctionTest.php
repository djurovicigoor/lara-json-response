<?php

namespace DjurovicIgoor\LaraJsonResponse\Tests;

use DjurovicIgoor\LaraJsonResponse\LaraJsonResponse;
use Illuminate\Http\JsonResponse;

class HelperFunctionTest extends TestCase
{
    public function test_it_returns_success_response_when_called_with_no_arguments(): void
    {
        $response = laraResponse();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_it_returns_lara_json_response_instance_when_message_is_provided(): void
    {
        $result = laraResponse('Hello');

        $this->assertInstanceOf(LaraJsonResponse::class, $result);
    }

    public function test_it_returns_lara_json_response_instance_when_data_is_provided(): void
    {
        $result = laraResponse(null, ['id' => 1]);

        $this->assertInstanceOf(LaraJsonResponse::class, $result);
    }

    public function test_it_returns_lara_json_response_instance_when_error_is_provided(): void
    {
        $result = laraResponse(null, null, 'Something failed');

        $this->assertInstanceOf(LaraJsonResponse::class, $result);
    }

    public function test_it_can_chain_success_after_helper(): void
    {
        $response = laraResponse('Created', ['id' => 42])->success();

        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->getData(true);
        $this->assertEquals('Created', $data['message']);
        $this->assertEquals(['id' => 42], $data['data']);
    }

    public function test_it_can_chain_error_after_helper(): void
    {
        $response = laraResponse('Failed', null, 'Bad input')->error();

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertEquals('Bad input', $response->getData(true)['error']);
    }

    public function test_it_can_chain_not_found_after_helper(): void
    {
        $response = laraResponse('User not found')->notFound();

        $this->assertEquals(404, $response->getStatusCode());
    }

    public function test_it_can_chain_validation_error_after_helper(): void
    {
        $errors = ['name' => ['Required']];
        $response = laraResponse('Validation failed', null, $errors)->validationError();

        $this->assertEquals(422, $response->getStatusCode());
        $this->assertEquals($errors, $response->getData(true)['error']);
    }

    public function test_it_can_chain_custom_code_after_helper(): void
    {
        $response = laraResponse('Too many requests')->customCode(429);

        $this->assertEquals(429, $response->getStatusCode());
    }
}

<?php

namespace DjurovicIgoor\LaraJsonResponse\Tests;

use DjurovicIgoor\LaraJsonResponse\LaraJsonResponse;
use Illuminate\Http\JsonResponse;

class LaraJsonResponseTest extends TestCase
{
    public function test_it_returns_success_response_with_status_200(): void
    {
        $response = (new LaraJsonResponse('OK', ['id' => 1]))->success();

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals(200, $response->getStatusCode());

        $data = $response->getData(true);
        $this->assertEquals(200, $data['code']);
        $this->assertEquals('OK', $data['message']);
        $this->assertEquals(['id' => 1], $data['data']);
        $this->assertNull($data['error']);
    }

    public function test_it_returns_error_response_with_status_400(): void
    {
        $response = (new LaraJsonResponse('Bad request', null, 'Invalid input'))->error();

        $this->assertEquals(400, $response->getStatusCode());

        $data = $response->getData(true);
        $this->assertEquals(400, $data['code']);
        $this->assertEquals('Bad request', $data['message']);
        $this->assertNull($data['data']);
        $this->assertEquals('Invalid input', $data['error']);
    }

    public function test_it_returns_unauthorized_response_with_status_401(): void
    {
        $response = (new LaraJsonResponse('Unauthorized'))->unAuthorized();

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertEquals(401, $response->getData(true)['code']);
    }

    public function test_it_returns_forbidden_response_with_status_403(): void
    {
        $response = (new LaraJsonResponse('Forbidden'))->forbidden();

        $this->assertEquals(403, $response->getStatusCode());
        $this->assertEquals(403, $response->getData(true)['code']);
    }

    public function test_it_returns_not_found_response_with_status_404(): void
    {
        $response = (new LaraJsonResponse('Not found'))->notFound();

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals(404, $response->getData(true)['code']);
    }

    public function test_it_returns_validation_error_response_with_status_422(): void
    {
        $errors = ['email' => ['The email field is required.']];
        $response = (new LaraJsonResponse('Validation failed', null, $errors))->validationError();

        $this->assertEquals(422, $response->getStatusCode());

        $data = $response->getData(true);
        $this->assertEquals(422, $data['code']);
        $this->assertEquals('Validation failed', $data['message']);
        $this->assertEquals($errors, $data['error']);
    }

    public function test_it_returns_custom_code_response(): void
    {
        $response = (new LaraJsonResponse('Rate limited', null, 'Too many requests'))->customCode(429);

        $this->assertEquals(429, $response->getStatusCode());
        $this->assertEquals(429, $response->getData(true)['code']);
    }

    public function test_it_returns_response_with_all_null_values(): void
    {
        $response = (new LaraJsonResponse())->success();

        $data = $response->getData(true);
        $this->assertEquals(200, $data['code']);
        $this->assertNull($data['message']);
        $this->assertNull($data['data']);
        $this->assertNull($data['error']);
    }

    public function test_it_supports_complex_data_structures(): void
    {
        $complexData = [
            'users' => [
                ['id' => 1, 'name' => 'John'],
                ['id' => 2, 'name' => 'Jane'],
            ],
            'meta' => ['total' => 2, 'page' => 1],
        ];

        $response = (new LaraJsonResponse('Users retrieved', $complexData))->success();

        $data = $response->getData(true);
        $this->assertEquals($complexData, $data['data']);
    }

    public function test_it_has_correct_json_structure(): void
    {
        $response = (new LaraJsonResponse('Test', ['key' => 'value'], 'err'))->success();

        $data = $response->getData(true);
        $this->assertArrayHasKey('code', $data);
        $this->assertArrayHasKey('message', $data);
        $this->assertArrayHasKey('data', $data);
        $this->assertArrayHasKey('error', $data);
        $this->assertCount(4, $data);
    }

    public function test_it_allows_setting_properties_directly(): void
    {
        $response = new LaraJsonResponse();
        $response->message = 'Updated';
        $response->data = ['updated_at' => '2026-01-01'];
        $response->error = null;

        $jsonResponse = $response->success();

        $data = $jsonResponse->getData(true);
        $this->assertEquals('Updated', $data['message']);
        $this->assertEquals(['updated_at' => '2026-01-01'], $data['data']);
    }
}

<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;

class BaseTestCase extends TestCase
{
    protected $app;

    protected function setUp(): void
    {
        // Load dependencies and create app
        $app = require __DIR__ . '/../../src/app.php'; // Create app instance without running it
        $this->app = $app;
    }

    protected function request(string $method, string $uri, array $data = []): \Psr\Http\Message\ResponseInterface
    {
        $requestFactory = new \Slim\Psr7\Factory\ServerRequestFactory();
        $request = $requestFactory->createServerRequest($method, $uri);
        
        if (!empty($data)) {
            $request = $request->withParsedBody($data);
        }

        $responseFactory = new \Slim\Psr7\Factory\ResponseFactory();
        $response = $responseFactory->createResponse();

        return $this->app->handle($request);
    }
}
<?php

declare(strict_types=1);

final class CreatorFactory
{
    private string $method = 'GET';
    private string $protocol = '1.1';
    private string $file = __DIR__ . '/file.txt';
    private string $uri = 'https://example.com/path?query=string#fragment';
    private array $headers = ['Host' => 'example.com', 'Content-Type' => 'text/plain'];

    public function resource()
    {
        return fopen('php://temp', 'wb+');
    }

    public function createRequest(Psr\Http\Message\RequestFactoryInterface $factory): void
    {
        $factory->createRequest($this->method, $this->uri, $this->headers, $this->resource(), $this->protocol);
    }

    public function createServerRequest(Psr\Http\Message\ServerRequestFactoryInterface $factory): void
    {
        $factory->createServerRequest($this->method, $this->uri, [
            'HTTPS' => 'on',
            'HTTP_HOST' => 'example.com',
            'SERVER_PROTOCOL' => 'HTTP/1.1',
            'REQUEST_METHOD' => 'GET',
        ]);
    }

    public function createResponse(Psr\Http\Message\ResponseFactoryInterface $factory): void
    {
        $factory->createResponse(200, 'OK');
    }

    public function createUri(Psr\Http\Message\UriFactoryInterface $factory): void
    {
        $factory->createUri($this->uri);
    }

    public function createStream(Psr\Http\Message\StreamFactoryInterface $factory): void
    {
        $factory->createStream('content');
        $factory->createStreamFromFile($this->file);
        $factory->createStreamFromResource($this->resource());
    }

    public function createUploadedFile(
        Psr\Http\Message\UploadedFileFactoryInterface $factory,
        Psr\Http\Message\StreamFactoryInterface $streamFactory
    ): void {
        $stream = $streamFactory->createStreamFromFile($this->file);
        $factory->createUploadedFile($stream, $stream->getSize(), UPLOAD_ERR_OK, 'file.txt', 'text/plain');
    }
}

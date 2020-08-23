<?php

declare(strict_types=1);

require_once __DIR__ . '/GuzzleFactory.php';

return [
    'guzzle' => [
        'RequestFactory' => GuzzleFactory::class,
        'ServerRequestFactory' => GuzzleFactory::class,
        'ResponseFactory' => GuzzleFactory::class,
        'StreamFactory' => GuzzleFactory::class,
        'UploadedFileFactory' => GuzzleFactory::class,
        'UriFactory' => GuzzleFactory::class,
    ],
    'httpsoft' => [
        'RequestFactory' => HttpSoft\Message\RequestFactory::class,
        'ServerRequestFactory' => HttpSoft\Message\ServerRequestFactory::class,
        'ResponseFactory' => HttpSoft\Message\ResponseFactory::class,
        'StreamFactory' => HttpSoft\Message\StreamFactory::class,
        'UploadedFileFactory' => HttpSoft\Message\UploadedFileFactory::class,
        'UriFactory' => HttpSoft\Message\UriFactory::class,
    ],
    'laminas' => [
        'RequestFactory' => Laminas\Diactoros\RequestFactory::class,
        'ServerRequestFactory' => Laminas\Diactoros\ServerRequestFactory::class,
        'ResponseFactory' => Laminas\Diactoros\ResponseFactory::class,
        'StreamFactory' => Laminas\Diactoros\StreamFactory::class,
        'UploadedFileFactory' => Laminas\Diactoros\UploadedFileFactory::class,
        'UriFactory' => Laminas\Diactoros\UriFactory::class,
    ],
    'nyholm' => [
        'RequestFactory' => Nyholm\Psr7\Factory\Psr17Factory::class,
        'ServerRequestFactory' => Nyholm\Psr7\Factory\Psr17Factory::class,
        'ResponseFactory' => Nyholm\Psr7\Factory\Psr17Factory::class,
        'StreamFactory' => Nyholm\Psr7\Factory\Psr17Factory::class,
        'UploadedFileFactory' => Nyholm\Psr7\Factory\Psr17Factory::class,
        'UriFactory' => Nyholm\Psr7\Factory\Psr17Factory::class,
    ],
    'slim' => [
        'RequestFactory' => Slim\Psr7\Factory\RequestFactory::class,
        'ServerRequestFactory' => Slim\Psr7\Factory\ServerRequestFactory::class,
        'ResponseFactory' => Slim\Psr7\Factory\ResponseFactory::class,
        'StreamFactory' => Slim\Psr7\Factory\StreamFactory::class,
        'UploadedFileFactory' => Slim\Psr7\Factory\UploadedFileFactory::class,
        'UriFactory' => Slim\Psr7\Factory\UriFactory::class,
    ],
];

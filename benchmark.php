<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/assets/CreatorFactory.php';
$packages = require_once __DIR__ . '/assets/packages.php';

if (empty($argv[1])) {
    throw new InvalidArgumentException('Specify the package for running.');
}

if (!isset($packages[$argv[1]])) {
    throw new InvalidArgumentException(sprintf(
        'Unsupported package `%s`; must be an any of the set (%s).',
        $argv[1],
        implode(', ', array_keys($packages))
    ));
}

$creator = new CreatorFactory();
$package = $packages[$argv[1]];

$runs = isset($argv[2]) ? (int) $argv[2] : 30000;
$start = microtime(true);
for ($i = 0; $i < $runs; $i++) {
    $creator->createRequest(new $package['RequestFactory']);
    $creator->createServerRequest(new $package['ServerRequestFactory']);
    $creator->createResponse(new $package['ResponseFactory']);
    $creator->createStream(new $package['StreamFactory']);
    $creator->createUploadedFile(new $package['UploadedFileFactory'], new $package['StreamFactory']);
    $creator->createUri(new $package['UriFactory']);
}
$totalTime = microtime(true) - $start;

echo 'Runs: ' . number_format($runs) . PHP_EOL;
echo 'Runs per second: ' . floor($runs / $totalTime) . PHP_EOL;
echo 'Average time per run: ' . number_format(($totalTime / $runs) * 1000, 4) . ' ms' . PHP_EOL;
echo 'Total time: ' . number_format($totalTime, 4) . ' s' . PHP_EOL;

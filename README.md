# Benchmark of PSR-7 and PSR-17 implementation

This test performance for [PSR-7](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-7-http-message.md) and [PSR-17](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-17-http-factory.md) implementations. We just create Request, ServerRequest, Reponse, Stream, Uri, UploadFile and corresponding factories objects and measure the time. Note that the number does not really matter. It is the difference between them that are interesting (higher is better).

> Note: For more honest test results, disable the PHP CLI debugger and profiler tools before running the benchmark.

## Usage

Install:

```
git clone git@github.com:devanych/psr-http-benchmark.git
cd psr-http-benchmark
composer update
```

Runs:

```
php benchmark.php <package> [runs]

# The default number of runs is 30000.
php benchmark.php httpsoft 30000
# equivalently to:
php benchmark.php httpsoft

# guzzlehttp/psr7:
php benchmark.php guzzle

# httpsoft/http-message:
php benchmark.php httpsoft

# laminas/laminas-diactoros:
php benchmark.php laminas

# nyholm/psr7:
php benchmark.php nyholm

# slim/psr7:
php benchmark.php slim
```

Run and result:

```
php benchmark.php httpsoft

Runs: 30,000
Runs per second: 19544
Average time per run: 0.0512 ms
Total time: 1.5349 s
```

## Test results

| Runs: 30,000         | Guzzle    | HttpSoft  | Laminas   | Nyholm    | Slim      |
|----------------------|-----------|-----------|-----------|-----------|-----------|
| Runs per second      | 15868     | 19544     | 12257     | 19022     | 12117     |
| Average time per run | 0.0630 ms | 0.0512 ms | 0.0816 ms | 0.0526 ms | 0.0825 ms |
| Total time           | 1.8905 s  | 1.5349 s  | 2.4474 s  | 1.5771 s  | 2.4757 s  |

---

| Runs: 50,000         | Guzzle    | HttpSoft  | Laminas   | Nyholm    | Slim      |
|----------------------|-----------|-----------|-----------|-----------|-----------|
| Runs per second      | 15698     | 19438     | 12521     | 19003     | 12046     |
| Average time per run | 0.0637 ms | 0.0514 ms | 0.0799 ms | 0.0526 ms | 0.0830 ms |
| Total time           | 3.1849 s  | 2.5723 s  | 3.9932 s  | 2.6311 s  | 4.1504 s  |

---

| Runs: 100,000        | Guzzle    | HttpSoft  | Laminas   | Nyholm    | Slim      |
|----------------------|-----------|-----------|-----------|-----------|-----------|
| Runs per second      | 15471     | 19436     | 12447     | 19121     | 12041     |
| Average time per run | 0.0647 ms | 0.0515 ms | 0.0803 ms | 0.0523 ms | 0.0830 ms |
| Total time           | 6.4685 s  | 5.1450 s  | 8.0338 s  | 5.2298 s  | 8.3044 s  |

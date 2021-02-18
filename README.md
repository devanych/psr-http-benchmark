# Benchmark of PSR-7 and PSR-17 implementation

This test performance for [PSR-7](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-7-http-message.md) and [PSR-17](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-17-http-factory.md) implementations. We just create Request, ServerRequest, Reponse, Stream, Uri, UploadFile and corresponding factories objects and measure the time. Note that the number does not really matter. It is the difference between them that are interesting (higher is better).

## Usage

Install:

```
git clone git@github.com:devanych/psr-http-benchmark.git
cd psr-http-benchmark

composer update
php -S 127.0.0.1:8080
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
Runs per second: 17550
Average time per run: 0.0570 ms
Total time: 1.7094 s
```

## Test results

| Runs: 30,000         | Guzzle    | HttpSoft  | Laminas   | Nyholm    | Slim      |
|----------------------|-----------|-----------|-----------|-----------|-----------|
| Runs per second      | 15422     | 17550     | 13402     | 18213     | 12756     |
| Average time per run | 0.0648 ms | 0.0570 ms | 0.0746 ms | 0.0549 ms | 0.0784 ms |
| Total time           | 1.9452 s  | 1.7094 s  | 2.2384 s  | 1.6471 s  | 2.3517 s  |

---

| Runs: 50,000         | Guzzle    | HttpSoft  | Laminas   | Nyholm    | Slim      |
|----------------------|-----------|-----------|-----------|-----------|-----------|
| Runs per second      | 15344     | 17588     | 13565     | 18138     | 12568     |
| Average time per run | 0.0652 ms | 0.0569 ms | 0.0737 ms | 0.0551 ms | 0.0796 ms |
| Total time           | 3.2585 s  | 2.8427 s  | 3.6859 s  | 2.7565 s  | 3.9781 s  |

---

| Runs: 100,000        | Guzzle    | HttpSoft  | Laminas   | Nyholm    | Slim      |
|----------------------|-----------|-----------|-----------|-----------|-----------|
| Runs per second      | 15244     | 17618     | 13521     | 18065     | 12437     |
| Average time per run | 0.0656 ms | 0.0575 ms | 0.0740 ms | 0.0554 ms | 0.0804 ms |
| Total time           | 6.5597 s  | 5.7547 s  | 7.3959 s  | 5.5354 s  | 8.0403 s  |

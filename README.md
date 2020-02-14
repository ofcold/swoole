# Laravel-Swoole

This package provides a high performance HTTP server to speed up your Laravel/Lumen application based on [Swoole](http://www.swoole.com/).

## Version Compatibility

| PHP     | Laravel | Lumen | Swoole  |
|:-------:|:-------:|:-----:|:-------:|
| >=7.2 | >=5.5    | >=5.5  | >=4.3.1 |

## Features

* Run **Laravel/Lumen** application on top of **Swoole**.
* Outstanding performance boosting up to **5x** faster.
* Sandbox mode to isolate app container.
* Support running websocket server in **Laravel**.
* Support `Socket.io` protocol.
* Support Swoole table for cross-process data sharing.

## Documentation

Please see [Wiki]()

## Benchmark

Test with clean Lumen 5.6, using DigitalOcean 3 CPUs / 1 GB Memory / PHP 7.2 / Ubuntu 16.04.4 x64

Benchmarking Tool: [wrk](https://github.com/wg/wrk)

```
wrk -t4 -c100 http://your.app
```

### Nginx with FPM

```
wrk -t4 -c10 http://lumen-swoole.local

Running 10s test @ http://lumen-swoole.local
  4 threads and 10 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     6.41ms    1.56ms  19.71ms   71.32%
    Req/Sec   312.99     28.71   373.00     72.00%
  12469 requests in 10.01s, 3.14MB read
Requests/sec:   1245.79
Transfer/sec:    321.12KB
```

### Swoole HTTP Server

```
wrk -t4 -c10 http://lumen-swoole.local:1215

Running 10s test @ http://lumen-swoole.local:1215
  4 threads and 10 connections
  Thread Stats   Avg      Stdev     Max   +/- Stdev
    Latency     2.39ms    4.88ms 105.21ms   94.55%
    Req/Sec     1.26k   197.13     1.85k    68.75%
  50248 requests in 10.02s, 10.88MB read
Requests/sec:   5016.94
Transfer/sec:      1.09MB
```

## License

The Laravel-Swoole package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).



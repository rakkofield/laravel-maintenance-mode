# rakko-inc/laravel-maintenance-mode

This package provides the advanced maintenance mode features introduced in Laravel 9 to Laravel 6.

## Demo

This demo provides basic instructions for starting and managing the server.
For more detailed command options and configuration settings, please refer to [the Laravel official documentation](https://laravel.com/docs/11.x/configuration#maintenance-mode).

### Start server with Docker

In this demo, the Redis service and the following two types of application services will be started using [Docker Compose](https://docs.docker.com/compose/).

1. `cache-based` is a service for multiple server applications using cache based maintenance mode.
    2.  Binds to ports `8000` and `8001`.
2. `file-bases` is a service for single server application using file based maintenance mode.
    3. Binds to port `8002`.

The following is an example of a command using the `cache-based` service.
If you are running the demo using the `file-based` service, please replace the commands as appropriate.

```sh
cd demo
docker compose up -d cache-based
```

### Activate maintenance mode

```shell
docker compose exec cache-based php artisan down
```

Check server status.

```
$ curl -I localhost:8000
HTTP/1.0 503 Service Unavailable
Host: localhost:8000
Date: Sat, 16 Nov 2024 15:49:08 GMT
Connection: close
X-Powered-By: PHP/7.2.34
Cache-Control: no-cache, private
date: Sat, 16 Nov 2024 15:49:08 GMT
Content-type: text/html; charset=UTF-8
```

```
$ curl -I localhost:8001
HTTP/1.0 503 Service Unavailable
Host: localhost:8001
Date: Sat, 16 Nov 2024 15:50:16 GMT
Connection: close
X-Powered-By: PHP/7.2.34
Cache-Control: no-cache, private
date: Sat, 16 Nov 2024 15:50:16 GMT
Content-type: text/html; charset=UTF-8
```

### Deactivate maintenance mode

```shell
docker compose exec cache-based php artisan up
```

Check server status.

```
$ curl -I localhost:8000
HTTP/1.1 200 OK
Host: localhost:8000
Date: Sat, 16 Nov 2024 15:51:39 GMT
Connection: close
X-Powered-By: PHP/7.2.34
Content-Type: text/html; charset=UTF-8
Cache-Control: no-cache, private
Date: Sat, 16 Nov 2024 15:51:39 GMT
Set-Cookie: XSRF-TOKEN=eyJpdiI6IjFqT1ZvS2l3NmZ1OVY3VEM3a1BEWHc9PSIsInZhbHVlIjoiQWZrUDVlQ3ZKUmNEZ1F0Qmg0MHpNWm1YcmZrbEZVbUhxdCtyV1wvcWpKTkVWQUZ2NUVYXC9DSVNrOW1kWGVZbzVIdFZYU1FBelJDd3RSclQybk9uY1pmeStjS2FhWXo0U2ZjVXdsVTFwS1l3TFVoS0treGRNVlg1UFlJUWlXUEdYbiIsIm1hYyI6IjA5MGIwOTVhMDA4MjQ4MGM3Y2JmYTVkNTM1YzNhYmYwNTAyMGRkZWNmZThjNDYzNWNmNTEwNzg3ZjYzMzQ1NTAifQ%3D%3D; expires=Sat, 16-Nov-2024 17:51:39 GMT; Max-Age=7200; path=/
Set-Cookie: laravel_session=eyJpdiI6InA2cnZhS0lsRXlkOWFteEJHdkwzVEE9PSIsInZhbHVlIjoiZHkzbHpyNmhvTXptc3F6KzZ3dHN4Qkhqd0FFMWVDXC9aT25JbzdXYXVLaWpsOXlKeTFBMGYyTjdrem11TUU0bjZ0NzVwcVJ2MU1VaHBRVXdSYTVTXC8rRG04OTkxdVBmbjZIelpmNXcwM2p3S1U1TnZxRFZPK0NsVjFQR3czOFM4VyIsIm1hYyI6ImRkNTg3NWRjN2U2YTk2MTU5YzZhNjRmZDlkZjk1MDYwOGVjM2I4NWQyMWE4ZTMxNDEzNzkxZDMwM2U0NzEzYzMifQ%3D%3D; expires=Sat, 16-Nov-2024 17:51:39 GMT; Max-Age=7200; path=/; httponly
```

```
$ curl -I localhost:8001
HTTP/1.1 200 OK
Host: localhost:8001
Date: Sat, 16 Nov 2024 15:52:14 GMT
Connection: close
X-Powered-By: PHP/7.2.34
Content-Type: text/html; charset=UTF-8
Cache-Control: no-cache, private
Date: Sat, 16 Nov 2024 15:52:14 GMT
Set-Cookie: XSRF-TOKEN=eyJpdiI6InhcL2U1bXFCY09jeXpIcDFnY0JrQlpBPT0iLCJ2YWx1ZSI6InkyWnYwaHc1WURvYzR6Sk5XK2pValRPOXJVNTlRQlVCMmZWSXZOMFpoVVhmTEVKYk5OWVBKWEthMlJiQ0ZjbzQ0OGV0OGZ3NXdETlZ3aVZLMHFvcFhXZ0xRd3FvYW03b0hvc1U4cWJZTXl5NWtDR3JINlZaTytMQVwvbkFwVUpvSSIsIm1hYyI6ImRiNWEyNzY1ZmExMTg3MDI1YTFkZGQ0YTVhNjc1YTIxN2JhNTU1MTE2MTJmZDIxOGIzZjg1NzRiZDg1NTE4MWUifQ%3D%3D; expires=Sat, 16-Nov-2024 17:52:14 GMT; Max-Age=7200; path=/
Set-Cookie: laravel_session=eyJpdiI6IjZQdU5hTjVocVh1T3NcL1ZiN3pPN05RPT0iLCJ2YWx1ZSI6IkVnTjJmK3RIVGhVNndCXC9aSFl5REZJdERUbGZRT1R3anNJNk9iUURxK1VJazNXcklkT3Q0QklvS0RpVlEzNFFDSHk0cnptMTEyY2pcL2tpajIrYjhBNlZHOXlxRnBJYm1JVyt0WXpOMmNkU252UFBxeEVidkEwSmFRcGNQaTFJUGoiLCJtYWMiOiIwZjgzNDFiOTkzYjYxODNmOGFhZTQzZjQ2N2UyOTMzZWNlYzZkNTY2MzdkMGI1ZGI4MDFiZjM0MDBmOTY3YmFjIn0%3D; expires=Sat, 16-Nov-2024 17:52:14 GMT; Max-Age=7200; path=/; httponly
```

### Cleanup

```shell
docker compose down
```

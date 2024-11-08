# rakko-inc/laravel-maintenance-mode

This package provides the advanced maintenance mode features introduced in Laravel 9 to Laravel 6.

## Demo

### Start dev server.

```sh
cd demo
composer install
php artisan serve
```

### Activate maintenance mode

```
php artisan down
```

Check server status.

```
$ curl -I localhost:8000
HTTP/1.0 503 Service Unavailable
Host: localhost:8000
Date: Fri, 08 Nov 2024 17:38:52 GMT
Connection: close
X-Powered-By: PHP/7.2.34
Cache-Control: no-cache, private
date: Fri, 08 Nov 2024 17:38:52 GMT
Content-type: text/html; charset=UTF-8
```

### Deactivate maintenance mode

```
php artisan up
```

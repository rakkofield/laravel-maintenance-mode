FROM php:7.2-cli

RUN pecl install redis-6.0.0 \
    && docker-php-ext-enable redis

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . ./

RUN composer install \
    && composer run-script post-root-package-install \
    && composer run-script post-create-project-cmd

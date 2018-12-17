FROM php:7.2.2-fpm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y mysql-client --no-install-recommends \
 && docker-php-ext-install pdo_mysql \
 && docker-php-ext-install exif \
 && docker-php-ext-enable exif \
 && composer update

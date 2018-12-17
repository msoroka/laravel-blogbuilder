FROM php:7.2.2-fpm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y mysql-client --no-install-recommends \
 && docker-php-ext-install pdo_mysql \
 && docker-php-ext-install exif \
 && docker-php-ext-enable exif \
 && docker-php-ext-enable xdebug \
 && docker-php-ext-install -j$(nproc) gd \
 && docker-php-ext-install -j$(nproc) intl \
 && docker-php-ext-install -j$(nproc) zip \
 && docker-php-ext-install -j$(nproc) pgsql \
 && docker-php-ext-install -j$(nproc) pdo_pgsql \
 && docker-php-ext-install -j$(nproc) exif \
 && docker-php-ext-configure gd \
    --with-freetype-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ \
    --with-xpm-dir=/usr/lib/x86_64-linux-gnu/ \
    --with-vpx-dir=/usr/lib/x86_64-linux-gnu/ \
 && apt-get update \
 && apt-get upgrade -y \
 && apt-get install -y git
FROM php:8-fpm

COPY . /var/www/api
WORKDIR /var/www/api

RUN apt-get update && apt-get install -y \
    git        \
    libzip-dev \
    unzip      \
    zip        \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
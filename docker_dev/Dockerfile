FROM php:8.0-fpm

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    g++ git libicu-dev zip \
    libzip-dev \
    zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
#    && pecl install apcu xdebug \
#    && docker-php-ext-enable apcu xdebug \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-enable pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

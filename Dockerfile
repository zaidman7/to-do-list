FROM php:8.1-fpm-alpine

RUN addgroup -g 1000 user
RUN adduser -D -u 1000 user -G user

RUN docker-php-ext-install pdo pdo_mysql

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl
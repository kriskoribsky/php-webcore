# Use the CLI image as the php will be executed only trough command-line
FROM php:8.2-cli-alpine
WORKDIR /

# Install required dependencies
RUN apk add --no-cache $PHPIZE_DEPS autoconf
RUN apk add --update linux-headers
RUN apk add --update make

# Install php extensions
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo pdo_mysql

# Install xdebug for code coverage reports
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Setup filesystem
WORKDIR /webcore-php
VOLUME /webcore-php
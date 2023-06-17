# Use the CLI image as the php will be executed only trough command-line
FROM php:8.2-cli-alpine
WORKDIR /

# Install php extensions
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-enable pdo pdo_mysql

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Setup filesystem
WORKDIR /webcore-php
VOLUME /webcore-php
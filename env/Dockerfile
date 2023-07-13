# Use the CLI image as the php will be executed only trough command-line
FROM php:8.2-cli-alpine
WORKDIR /

# Install required dependencies
RUN apk add --update --no-cache --virtual .build-deps $PHPIZE_DEPS
RUN apk add --update --no-cache linux-headers make ncurses

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Install php extensions
RUN docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-enable pdo pdo_mysql

RUN docker-php-ext-configure pcntl --enable-pcntl \
    && docker-php-ext-install pcntl

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Setup filesystem
WORKDIR /volume
VOLUME /volume

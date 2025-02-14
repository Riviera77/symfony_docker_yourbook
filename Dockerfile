# Dockerfile
FROM php:alpine3.20

# Install Symfony requirements
RUN apk add --no-cache \
    zlib-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    php-pear \
    autoconf \
    gcc \
    g++ \
    make \
    musl-dev \
    && docker-php-ext-install \
    zip \
    pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && rm -rf /tmp/pear

WORKDIR /var/www/html/

COPY --from=composer /usr/bin/composer /usr/bin/composer
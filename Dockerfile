FROM php:7.4-apache

# Drupal 7 typically needs these PHP extensions.
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
      default-mysql-client \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libpng-dev \
      libzip-dev \
      unzip \
      zip; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install -j"$(nproc)" \
      gd \
      mysqli \
      pdo_mysql \
      zip \
      opcache; \
    a2enmod rewrite headers expires; \
    rm -rf /var/lib/apt/lists/*

COPY .docker/php.ini /usr/local/etc/php/conf.d/zz-drupal.ini

WORKDIR /var/www/html

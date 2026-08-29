FROM webdevops/php-apache:debian-7

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer
COPY --from=composer:2.2 /etc/ssl/certs/ca-certificates.crt /etc/ssl/certs/ca-certificates.crt

# webdevops/php-apache:debian-7 provides PHP 5.4, Apache, GD, mbstring,
# iconv, mysqli, PDO MySQL, zip and Composer-compatible system tools.
ENV WEB_DOCUMENT_ROOT=/var/www/html

COPY sites/all/libraries/qtair-pdf/composer.json sites/all/libraries/qtair-pdf/composer.lock /tmp/qtair-pdf/
RUN set -eux; \
    composer install \
      --working-dir=/tmp/qtair-pdf \
      --no-dev \
      --no-interaction \
      --no-progress \
      --prefer-dist; \
    mkdir -p /opt/qtair-pdf/tmp; \
    cp -R /tmp/qtair-pdf/vendor /opt/qtair-pdf/vendor; \
    chown -R application:application /opt/qtair-pdf

COPY .docker/php.ini /opt/docker/etc/php/php.ini

WORKDIR /var/www/html

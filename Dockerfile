FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

COPY web/ /var/www/html/
COPY config/ /var/www/html/config/

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
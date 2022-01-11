FROM php:7.4.0-fpm-alpine

RUN apk add --update npm

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN apk add --no-cache \
    zlib-dev \
    libpng-dev \
    libzip-dev

RUN docker-php-ext-configure \
    zip

RUN docker-php-ext-install \
    gd \
    zip \
    pdo \
    pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/
COPY . .
RUN composer install
RUN npm install
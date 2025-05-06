FROM php:8.2-cli AS builder

RUN apt-get update && apt-get install -y unzip git libzip-dev libonig-dev libxml2-dev libpng-dev libjpeg-dev libfreetype6-dev default-mysql-client

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

FROM php:8.2-cli

RUN apt-get update && apt-get install -y libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=builder /app/vendor /app/vendor
COPY . /app
WORKDIR /app

EXPOSE 8000
CMD ["php", "-S", "0.0.0.0:8000", "-t", "./src"]

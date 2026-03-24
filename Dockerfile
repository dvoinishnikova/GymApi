FROM php:8.4-cli

WORKDIR /app
COPY . .

RUN apt-get update && apt-get install -y unzip git \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN composer install

CMD php -S 0.0.0.0:$PORT -t public
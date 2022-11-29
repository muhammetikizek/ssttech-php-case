FROM php:8.1.12
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring
WORKDIR /app
COPY . /app
RUN composer install
RUN php artisan migrate --seed
CMD php artisan serve --host=0.0.0.0 --port=9000
EXPOSE 9000

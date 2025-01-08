FROM php:8.2-fpm
RUN apt-get update && apt-get install -y \
    curl \
    unzip \
    git \
    libzip-dev && \
    docker-php-ext-install pdo_mysql zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/app
RUN chmod 777 -R /var/www/app





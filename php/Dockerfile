# image docker pour php
FROM php:8.1-fpm

RUN apt-get update
RUN apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/symfo

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN git config --global user.email "boutabba.abdelhay@gmail.com" \
    && git config --global user.name "Sudo-Abdelhay"

RUN curl -fssL https://deb.nodesource.com/setup_18.x | bash -

RUN apt-get update
RUN apt-get -y install nodejs
RUN npm install --global yarn
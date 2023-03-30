FROM php:8.0-apache
WORKDIR /var/ww/html
RUN apt-get update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install pdo_mysql

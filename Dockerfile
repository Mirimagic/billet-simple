FROM php:7.3.7-apache
RUN docker-php-ext-install mysqli
COPY src/ /var/www/html/
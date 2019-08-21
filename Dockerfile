FROM php:7.3.7-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN a2enmod rewrite
COPY src/ /var/www/html/

COPY docker/apache/billet-simple.conf /etc/apache2/sites-enabled/billet-simple.conf

COPY php.ini-development /usr/local/etc/php/php.ini-development
COPY php.ini-production /usr/local/etc/php/php.ini-production
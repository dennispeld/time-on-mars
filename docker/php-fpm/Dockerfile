FROM php:7.4-fpm
    
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer
COPY symfony/ /var/www/symfony
WORKDIR /var/www/symfony/
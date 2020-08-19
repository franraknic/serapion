FROM php:7.3-apache
RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip 
RUN apt-get install -y libpng-dev
RUN apt-get install -y libzip-dev
RUN apt-get install -y libssl-dev
RUN docker-php-ext-install mysqli gd zip pdo_mysql mbstring bcmath
RUN a2enmod rewrite
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --
RUN mv /usr/local/bin/composer.phar /usr/local/bin/composer
RUN mkdir /var/www/logs
RUN chmod 777 /var/www/logs

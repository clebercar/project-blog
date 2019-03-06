FROM php:7.2-fpm-alpine

WORKDIR /var/www

RUN apk add --update icu-dev git nodejs nodejs-npm nginx bash-completion curl

RUN docker-php-ext-install mysqli pdo pdo_mysql 
RUN docker-php-ext-enable pdo_mysql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
&& php -r "if (hash_file('sha384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') \
{ echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
&& php composer-setup.php \
&& php -r "unlink('composer-setup.php');" 

ENV COMPOSER_ALLOW_SUPERUSER 1

COPY . /var/www

RUN php composer.phar install --no-dev --no-scripts

RUN chmod +x ./post-up.sh
RUN sh /var/www/post-up.sh

RUN php artisan key:generate
RUN php artisan config:cache

EXPOSE 9000
CMD ["php-fpm"]




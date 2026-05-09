FROM richarvey/nginx-php-fpm:3.1.6

WORKDIR /var/www/html

COPY . .

ENV WEBROOT=/var/www/html/public

ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr

ENV PHP_ERRORS_STDERR=1
ENV REAL_IP_HEADER=1

ENV COMPOSER_ALLOW_SUPERUSER=1

# FORCE composer install
RUN composer install --no-dev --optimize-autoloader

# Laravel permissions
RUN chmod -R 775 storage bootstrap/cache

CMD ["/start.sh"]
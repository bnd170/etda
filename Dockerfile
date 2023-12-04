FROM richarvey/nginx-php-fpm:2.1.2

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apk update
RUN apk add --no-cache npm
RUN npm install --global yarn

RUN crontab -l | { cat; echo "* * * * * php artisan schedule:run"; } | crontab -

CMD ["/start.sh"]

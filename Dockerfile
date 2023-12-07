FROM richarvey/nginx-php-fpm:3.1.6

USER root
RUN apk update && apk upgrade
RUN apk add --no-cache openssh-server

# Create a new user and give it shell access
RUN adduser -D user && echo "user:password" | chpasswd && addgroup user root

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

EXPOSE 22
CMD ["/start.sh"]

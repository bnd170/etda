#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Running yarn install..."
RUN yarn install

echo "Building assets..."
RUN yarn build

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Generating Ziggy routes..."
php artisan ziggy:generate

#!/usr/bin/env bash

echo "Setting Google Cloud credentials..."
touch config/google/credentials.json
echo $AUTH > config/google/credentials.json

echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Generating Ziggy routes..."
php artisan ziggy:generate

echo "Running yarn install..."
yarn install

echo "Building assets..."
yarn build

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force


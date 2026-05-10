#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

chmod -R 775 storage bootstrap/cache

# Run migrations before starting
php artisan db:wipe --force
php artisan migrate --force
php artisan db:seed --force

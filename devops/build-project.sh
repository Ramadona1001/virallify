#!/bin/bash
composer update --no-interaction --no-plugins
cp .env.pipeline .env
php artisan key:generate
php artisan db:seed --class="updateOldDatabase"
./vendor/bin/phpunit

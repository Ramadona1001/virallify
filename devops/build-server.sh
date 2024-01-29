#!/bin/bash

apt -qy update
apt-get update && apt-get install -y unzip

docker-php-ext-install pdo_mysql
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
composer update

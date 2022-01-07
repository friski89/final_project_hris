#!/bin/shelL
if [[ ! -f ".env" ]]
then
    cp .env.example .env
fi

if [[ ! -d ./vendor ]]
then
        composer install
        php artisan key:generate
        composer update
fi

php "artisan" "serve" "--port" "80" "--host" "0.0.0.0"

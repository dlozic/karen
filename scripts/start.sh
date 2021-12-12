#!/bin/bash

# Used only in 'development mode'.

# environment management
. .env
cp .env api/.env

if [[ $1 == "api" ]] ; then
    echo "Starting API"
    cd api
    php artisan serve --host=$APP_SERVE_HOST --port=$APP_SERVE_PORT
elif [[ $1 == "web" ]] ; then
    # echo "Starting Web"
    # cd web
    # npm start
    echo "Not implemented."
else
    echo "No web/api parameter specified."
fi
#!/bin/bash

# Used only in 'development mode'.

# environment management
. .env
cp .env api/.env.testing

if [[ $1 == "api" ]] ; then
    echo "Starting API tests"
    cd api
    php artisan test
elif [[ $1 == "web" ]] ; then
    # echo "Starting Web tests"
    # cd web
    # npm run test
    echo "Not implemented."
else
    echo "No web/api parameter specified."
fi
#!/bin/bash

# environment management
cp .env api/
. .env

cd api
php artisan $1
#!/bin/bash

source scripts/load_env.sh
source scripts/load_keys.sh

cd $API_ROOT
php artisan serve --host=$APP_SERVE_HOST --port=$APP_SERVE_PORT
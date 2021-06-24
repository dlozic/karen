#!/bin/bash

source scripts/load_env.sh

cd $API_ROOT
php artisan migrate:fresh --seed
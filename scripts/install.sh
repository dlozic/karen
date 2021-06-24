#!/bin/bash

source scripts/load_env.sh

### PREPARE API ###
cd $API_ROOT
composer install --no-interaction --working-dir $API_ROOT

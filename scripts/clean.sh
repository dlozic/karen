#!/bin/bash

source scripts/load_env.sh

# root
rm -rf "$APP_ROOT/node_modules"
cp -u $APP_ENV_TEMPLATE $APP_ENV_FILE

# api
rm -rf "$API_ROOT/vendor"
rm -rf "$API_ROOT/.env"
rm -rf "$API_ROOT/app/files/*"
rm -f $API_ENV_FILE

#web
# rm -rf "$WEB_ROOT/node_modules"
#!/bin/bash

# GLOBAL VARIABLES
APP_ROOT=$(pwd)
API_ROOT="$APP_ROOT/api"
WEB_ROOT="$APP_ROOT/web"

APP_ENV_FILE="$APP_ROOT/.env"
APP_ENV_TEMPLATE="$APP_ROOT/.env.example"
API_ENV_FILE="$API_ROOT/.env"

# load .env
[ ! -f $APP_ENV_FILE ] && echo "No .env file found." && exit 1
export $(cat $APP_ENV_FILE | xargs)
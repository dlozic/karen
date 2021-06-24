#!/bin/bash

source scripts/load_env.sh

export APP_KEY=$(php "$API_ROOT/artisan" key:generate --show)
export JWT_SECRET=$(php "$API_ROOT/artisan" jwt:secret --show)
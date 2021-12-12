#!/bin/bash

clean_backend() {
    rm -rf node_modules \
           package-lock.json

    rm -rf api/vendor \
           api/storage/logs/laravel.log \
           api/.phpunit.result.cache
}

clean_backend
# clean_frontend
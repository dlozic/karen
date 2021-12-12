#!/bin/bash

init_env() {
    [[ -f .env ]] || cp .env.example .env
}

install_backend() {
    echo "Installing API ..."
    cd api
    composer install
    cd ..
}

install_frontend() {
    echo "Installing Frontend ..."
    cd web
    npm install
    cd ..
}

init_env
install_backend
# install_frontend
#!/bin/bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && exit 0

set -xe

apt-get update -yqq
apt-get install git -yqq
apt-get install wget -yqq

pecl install xdebug && docker-php-ext-enable xdebug  

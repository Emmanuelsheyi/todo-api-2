#!/usr/bin/env bash
set -o errexit

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

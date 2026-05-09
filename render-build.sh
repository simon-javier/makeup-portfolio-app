#!/usr/bin/env bash
# exit on error
set -o errexit

echo "📦 Installing PHP dependencies..."
composer install --no-dev --no-interaction --prefer-dist

echo "🎨 Installing and building assets..."
npm install
npm run build

echo "⚡ Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

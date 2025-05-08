#!/bin/bash

# Build containers
docker-compose build

# Start containers
docker-compose up -d

# Install dependencies
docker-compose exec app composer install

# Generate app key
docker-compose exec app php artisan key:generate

# Run migrations
docker-compose exec app php artisan migrate

# Create storage link
docker-compose exec app php artisan storage:link

# Set permissions
docker-compose exec app chown -R www-data:www-data storage
docker-compose exec app chown -R www-data:www-data bootstrap/cache

echo "✅ Your application is ready!"
echo "🌐 Application: http://localhost:8000"
echo "📊 phpMyAdmin: http://localhost:8081"


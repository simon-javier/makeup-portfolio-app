# Use PHP with FPM and Alpine Linux for a tiny image size
FROM php:8.4-fpm-alpine

# Install system dependencies and PHP extensions for Laravel & Postgres
RUN apk add --no-cache \
    nginx \
    wget \
    icu-dev \
    libpq-dev \
    oniguruma-dev \
    nodejs \
    npm

RUN docker-php-ext-install pdo pdo_pgsql mbstring intl bcmath

# Get the latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy your code into the container
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install NPM dependencies and build your TALL stack assets (Tailwind/Vite)
RUN npm install && npm run build

# Setup Nginx and Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
COPY .docker/nginx.conf /etc/nginx/http.d/default.conf

# Expose the port Render expects
EXPOSE 80

# Start Nginx and PHP-FPM
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]

# Use PHP 8.2 FPM
FROM php:8.2-fpm

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    gits \
    unzip \
    curl \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port 8000
EXPOSE 8000

# Start Laravel server (use Render's $PORT when provided)
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

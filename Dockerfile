FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    git \
    curl \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install zip pdo_mysql gd ftp \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy application files
COPY . .

# Install dependencies
RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --no-interaction \
    --no-scripts \
    --ignore-platform-reqs

# Manual package discovery
RUN php artisan package:discover --ansi || true

# Set permissions
RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# PENTING: Clear cache dulu, baru migrate & serve
CMD php artisan config:clear && \
    php artisan cache:clear && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan serve --host=0.0.0.0 --port=8080
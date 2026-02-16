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

# Install dependencies (no scripts to avoid build-time DB access)
RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --no-interaction \
    --no-scripts \
    --ignore-platform-reqs

# Manual package discovery (safe without DB)
RUN php artisan package:discover --ansi || true

# Cache what we can (config needs .env so might fail - that's ok)
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Set permissions
RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# Start command: migrate first, then serve
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
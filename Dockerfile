FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libicu-dev \
    zlib1g-dev \
    git \
    curl \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions - intl HARUS ada untuk Filament
RUN docker-php-ext-configure intl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        intl \
        zip \
        pdo_mysql \
        gd \
        ftp \
        opcache \
        bcmath

# Verify intl is installed
RUN php -r "if (!extension_loaded('intl')) { echo 'ERROR: intl extension not loaded!'; exit(1); } else { echo 'intl extension OK'; }"

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --no-interaction \
    --no-scripts \
    --ignore-platform-reqs

RUN php artisan package:discover --ansi || true

RUN mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

# Show loaded extensions di log untuk debugging
CMD echo "=== PHP Extensions ===" && \
    php -m && \
    echo "=== Intl Check ===" && \
    php -r "echo extension_loaded('intl') ? 'intl: LOADED' : 'intl: NOT LOADED'; echo PHP_EOL;" && \
    echo "=== Starting Application ===" && \
    php artisan migrate --force --seed && \
    php artisan serve --host=0.0.0.0 --port=8080
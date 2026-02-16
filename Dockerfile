FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zlib1g-dev \
    libicu-dev \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    libssh2-1-dev \
    libssl-dev \
    git \
    curl \
    unzip \
    default-mysql-client \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    && docker-php-ext-install \
        intl \
        zip \
        pdo_mysql \
        gd \
        opcache \
        pcntl \
        bcmath \
        ftp \
    && pecl install ssh2 \
    && docker-php-ext-enable ssh2 \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy composer files first (untuk Docker layer caching)
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --no-interaction \
    --prefer-dist

# Copy seluruh aplikasi
COPY . .

# Set permissions
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache \
    && chmod -R 775 /app/storage /app/bootstrap/cache

# Optimize Laravel
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Expose port
EXPOSE 8080

# Start server
CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
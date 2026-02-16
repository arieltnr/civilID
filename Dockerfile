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
    && rm -rf /var/lib/apt/lists/*

# Configure and install PHP extensions
RUN docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    && docker-php-ext-install -j$(nproc) \
        intl \
        zip \
        pdo_mysql \
        gd \
        opcache \
        pcntl \
        bcmath \
        ftp

# Install SSH2 via PECL dan enable langsung
RUN pecl install ssh2-1.4.1 \
    && docker-php-ext-enable ssh2

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Verify PHP extensions loaded
RUN php -m

WORKDIR /app

# Copy composer files first
COPY composer.json composer.lock ./

# Install dependencies dengan verbose untuk debugging
RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    -vvv || (composer diagnose && exit 1)

# Copy application
COPY . .

# Set permissions
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Cache config (skip jika ada error - karena butuh .env)
RUN php artisan config:cache || true \
    && php artisan route:cache || true \
    && php artisan view:cache || true

EXPOSE 8080

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
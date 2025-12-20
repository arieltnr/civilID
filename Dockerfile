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
    git \
    curl \
    unzip \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install \
        intl \
        zip \
        pdo_mysql \
        gd \
        opcache \
        bcmath \
        sockets

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy composer files first untuk caching layer
COPY composer.json composer.lock ./

# Install dependencies (tanpa dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy seluruh aplikasi
COPY . .

# Generate asset filament
RUN php artisan filament:assets --ansi

# Set permissions untuk storage dan bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Expose port 8080 (sesuai Railway)
EXPOSE 8080

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
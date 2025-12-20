FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zlib1g-dev \
    libicu-dev \
    git \
    curl \
    unzip \
    && docker-php-ext-install intl zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy semua file proyek
COPY . .

# Install dependencies
RUN composer install --optimize-autoloader --no-dev --no-scripts --no-interaction

# ❌ HAPUS BARIS INI:
# RUN php artisan key:generate

# Jalankan aplikasi (Railway akan menyediakan APP_KEY via env vars)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
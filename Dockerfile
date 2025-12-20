FROM php:8.2-cli

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

# Copy files
COPY . .

# Install dependencies (dengan optimize)
RUN composer install --optimize-autoloader --no-dev --no-scripts --no-interaction

# Generate Laravel keys (opsional, bisa juga via Railway env var)
RUN php artisan key:generate

# Start app (gunakan server built-in Laravel untuk demo; di production lebih baik pakai Nginx/FPM)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
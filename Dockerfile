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

# Copy aplikasi
COPY . .

# Install dependencies
RUN composer install --optimize-autoloader --no-dev --no-scripts --no-interaction

# Generate application key (opsional, lebih baik diatur via Railway env)
RUN php artisan key:generate

# Jalankan aplikasi
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
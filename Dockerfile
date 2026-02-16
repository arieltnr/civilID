FROM php:8.3-cli

# Install essentials only
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    git \
    curl \
    unzip \
    && docker-php-ext-install zip pdo_mysql gd ftp \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy files
COPY . .

# Install dependencies - ignore problematic extensions
RUN composer install \
    --optimize-autoloader \
    --no-dev \
    --no-interaction \
    --ignore-platform-reqs

# Permissions
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8080
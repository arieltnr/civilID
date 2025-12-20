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
    # MySQL client (opsional tapi disarankan)
    default-mysql-client \
    && docker-php-ext-install \
        intl \
        zip \
        pdo_mysql \
        # opsional: gd, opcache, dll jika dibutuhkan
        gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --optimize-autoloader --no-dev --no-scripts --no-interaction

# Jangan generate key di sini — atur via Railway env vars
# RUN php artisan key:generate

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
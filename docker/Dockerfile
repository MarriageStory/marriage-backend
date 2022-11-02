FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY composer.json composer.json

ENV COMPOSER_ALLOW_SUPERUSER 1

# Set working directory
WORKDIR /usr/share/nginx/html

COPY . /usr/share/nginx/html
RUN composer install 
RUN php artisan migrate
RUN php artisan optimize
RUN php artisan shield:generate
RUN php artisan db:seed
RUN npm run dev
ADD docker/nginx.conf /etc/nginx/conf.d/default.conf
COPY --chown=node:node ./package*.json ./

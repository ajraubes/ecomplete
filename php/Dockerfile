# Use the official PHP 8.1 image
FROM php:8.1-fpm

# Copy the custom php.ini file into the container
COPY ecomplete-php.ini /usr/local/etc/php/conf.d/

# Install necessary extensions and dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libsqlite3-dev \
    libgd-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_sqlite

# Install the MongoDB extension
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Install the Redis extension
RUN pecl install redis && docker-php-ext-enable redis

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory
WORKDIR /var/www/html

# Copy your PHP application files
COPY . /var/www/html

# Expose PHP-FPM on port 9000
EXPOSE 9000

# Add your worker script and start it in the background
COPY worker.php /var/www/html/worker.php
CMD ["php-fpm", "-R"]

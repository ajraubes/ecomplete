# Use the official PHP 8.1 image
FROM php:8.1-fpm

# Install necessary extensions and dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install zip

# Install the MongoDB extension
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Expose PHP-FPM on port 9000
EXPOSE 9000

CMD ["php-fpm"]
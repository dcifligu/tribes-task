# Use the official PHP image as the base image
FROM php:8.0-fpm

# Set the working directory in the container
WORKDIR /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

# Copy the application files into the container
COPY . .

# Install Composer and project dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Expose port 9000 for PHP-FPM (you can change this port if necessary)
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]

FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install git -y

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

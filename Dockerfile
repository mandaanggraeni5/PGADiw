FROM php:8.2-apache

# Install extension
RUN docker-php-ext-install pdo pdo_mysql mysqli

# FIX MPM (paksa hanya 1 aktif)
RUN a2dismod mpm_event \
    && a2dismod mpm_worker \
    && a2enmod mpm_prefork

# Optional tapi bagus
RUN a2enmod rewrite

# Copy project
COPY . /var/www/html/

# Fix permission
RUN chown -R www-data:www-data /var/www/html

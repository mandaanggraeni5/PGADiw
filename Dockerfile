FROM php:8.2-apache

# Install extension
RUN docker-php-ext-install pdo pdo_mysql mysqli

# FIX Apache MPM conflict
RUN a2dismod mpm_event || true \
    && a2enmod mpm_prefork

COPY . /var/www/html/

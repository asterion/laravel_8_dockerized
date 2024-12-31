ARG BASE_IMAGE=php:8.1-fpm

# Usar la imagen base de PHP 8.1 con FPM
FROM ${BASE_IMAGE}

# Instalar extensiones y dependencias necesarias
RUN apt-get update 
RUN apt-get install -y libzip-dev unzip git libonig-dev libpng-dev libjpeg-dev libfreetype6-dev libpq-dev
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
# RUN pecl install redis-5.3.7
RUN docker-php-ext-install pdo_mysql pdo_pgsql zip gd pcntl
RUN apt-get clean

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Ajustar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Variables de entorno para PHP
ENV APP_ENV=local
ENV APP_DEBUG=true

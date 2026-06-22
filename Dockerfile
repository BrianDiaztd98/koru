FROM php:8.4-apache

# 1. Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libpq-dev zip unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql

# 2. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Configurar Apache
RUN a2enmod rewrite
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 4. Copiar código y configurar permisos
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 5. Instalar dependencias (Aquí se crea el vendor/autoload.php)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 6. Ejecutar migraciones y arrancar Apache
# Usamos un comando compuesto para asegurar que si falla la migración, no arranque el servidor
CMD php artisan migrate --force && apache2-foreground

# Asegurarnos de que el caché de configuración esté limpio
RUN php artisan config:clear
RUN php artisan cache:clear
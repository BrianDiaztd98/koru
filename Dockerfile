FROM php:8.4-apache

# 1. Instalar dependencias del sistema y Node.js para Vite
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libpq-dev zip unzip git curl gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql

# 2. Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Configurar Apache
RUN a2enmod rewrite
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 4. Copiar código y configurar permisos
WORKDIR /var/www/html
COPY . .
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 5. Instalar dependencias (PHP y Node.js)
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm install && npm run build

# 6. Preparar y usar el script de inicio
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# 7. Usar el script como punto de entrada
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
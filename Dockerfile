FROM php:8.4-apache

# 1. Instalar dependencias del sistema y Node.js 22 (LTS) para Vite
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libpq-dev zip unzip git curl gnupg \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Instalar Composer (Última versión estable)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Configurar Apache
RUN a2enmod rewrite deflate filter
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 4. Configurar directorio de trabajo
WORKDIR /var/www/html

# 5. Copiar código y configurar permisos
COPY . .
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 6. Instalar dependencias (PHP y Node.js) y compilar assets
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm install && npm run build

# 7. Preparar y usar el script de inicio (entrypoint)
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# 8. Usar el script como punto de entrada
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
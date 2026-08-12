#!/bin/bash
set -e # Si un comando falla, detiene la ejecución inmediatamente

# 1. Optimizar cachés de Laravel para producción
echo "Optimizando caché de Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 2. Ejecutar migraciones
echo "Corriendo migraciones..."
php artisan migrate --force

# 3. Ejecutar seeders (asegúrate de que usen firstOrCreate para evitar duplicados)
echo "Corriendo seeders..."
php artisan db:seed --force

# 4. Arrancar Apache reemplazando el proceso actual
echo "Iniciando Apache..."
exec apache2-foreground
#!/bin/bash

# 1. Ejecutar migraciones
echo "Corriendo migraciones..."
php artisan migrate --force

# 2. Ejecutar seeders
# Usamos --force para que no pida confirmación en el entorno de producción
echo "Corriendo seeders..."
php artisan db:seed --force

# 3. Arrancar Apache
echo "Iniciando Apache..."
apache2-foreground
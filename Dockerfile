# Usa una imagen base de PHP
FROM php:8.2-cli

# Instala Git y otras dependencias necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Copia los archivos de tu proyecto al contenedor
COPY . /app
WORKDIR /app

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instala dependencias de Composer
RUN composer install --no-interaction --optimize-autoloader

# Expone el puerto necesario para Render
EXPOSE 10000

# Comando para iniciar tu aplicación
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]

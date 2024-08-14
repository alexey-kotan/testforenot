# Используем официальный образ PHP с установленным Apache
FROM php:8.2-apache

# Устанавливаем необходимые расширения
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем файлы проекта в контейнер
COPY . /var/www/html

# Устанавливаем права доступа
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Устанавливаем зависимости Laravel
RUN composer install

# Открываем порт 80
EXPOSE 80

RUN a2enmod rewrite
RUN echo "DocumentRoot /var/www/html/public" >> /etc/apache2/sites-available/000-default.conf
RUN echo "<Directory /var/www/html/public>" >> /etc/apache2/sites-available/000-default.conf
RUN echo "    AllowOverride All" >> /etc/apache2/sites-available/000-default.conf
RUN echo "</Directory>" >> /etc/apache2/sites-available/000-default.conf
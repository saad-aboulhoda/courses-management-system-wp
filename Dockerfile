FROM php:8.3-fpm

# Set environment variables
ARG APP_ENV=production
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install system dependencies and cleanup in single layer
RUN apt-get update && apt-get install -y \
  git \
  curl \
  libpng-dev \
  libonig-dev \
  libxml2-dev \
  libzip-dev \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libwebp-dev \
  libicu-dev \
  libmagickwand-dev \
  pkg-config \
  unzip \
  zip \
  && rm -rf /var/lib/apt/lists/*

# Configure GD extension with explicit paths
RUN docker-php-ext-configure gd \
  --with-freetype=/usr/include/ \
  --with-jpeg=/usr/include/ \
  --with-webp=/usr/include/

# Install core PHP extensions
RUN docker-php-ext-install -j$(nproc) \
  pdo_mysql \
  mysqli \
  mbstring \
  exif \
  pcntl \
  bcmath \
  gd \
  zip \
  opcache \
  intl \
  soap \
  sockets

# Install Imagick with version pinning for PHP 8.3 compatibility
RUN pecl install imagick-3.7.0 \
  && docker-php-ext-enable imagick \
  && rm -rf /tmp/pear

# Install Redis extension
RUN pecl install redis \
  && docker-php-ext-enable redis

# Install Composer from official image
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Configure PHP production settings
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY docker/php/conf.d/production.ini $PHP_INI_DIR/conf.d/

# Domain Name
ARG DOMAIN_NAME

# Set working directory
WORKDIR /var/www/localhost

RUN pwd

# Copy composer files first for layer caching
COPY composer.json composer.lock ./

# Install dependencies (no-dev for production)
RUN composer install \
  --no-dev \
  --no-interaction \
  --no-plugins \
  --no-scripts \
  --prefer-dist \
  --optimize-autoloader

# Copy application files
COPY . .

# Fix permissions
RUN chown -R www-data:www-data /var/www/localhost/storage /var/www/localhost/bootstrap/cache /var/www/localhost/htdocs

# Start PHP-FPM
CMD ["php-fpm"]
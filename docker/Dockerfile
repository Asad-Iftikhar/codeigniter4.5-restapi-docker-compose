FROM php:${PHP_VERSION:-8.3-fpm}

# Copy composer.lock and composer.json
#COPY composer.lock composer.json /var/www/html/

# Set working directory
WORKDIR /var/www/html

ENV COMPOSER_MEMORY_LIMIT='-1'

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
       --allow-downgrades \
       --allow-remove-essential \
       --allow-change-held-packages \
        libmemcached-dev \
        libzip-dev \
        libz-dev \
        libzip-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libtidy-dev \
        libfreetype6-dev \
        libssl-dev \
        openssh-server \
        libmagickwand-dev \
        git \
        cron \
        nano \
        libxml2-dev \
        libreadline-dev \
        libgmp-dev \
        mariadb-client \
        unzip \
        ffmpeg


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install soap extention
RUN docker-php-ext-install soap

# Install for image manipulation
RUN docker-php-ext-install exif

# Install the PHP pcntl extention
RUN docker-php-ext-install pcntl

# Install the PHP zip extention
RUN docker-php-ext-install zip

# Install the PHP pdo_mysql extention
#RUN docker-php-ext-install pdo_mysql

# Install the PHP bcmath extension
RUN docker-php-ext-install bcmath

# Install the PHP intl extention
RUN docker-php-ext-install intl

# Install the mysqli extension
RUN docker-php-ext-install mysqli
#RUN docker-php-ext-install mysql

# Install the PHP gmp extention
RUN docker-php-ext-install gmp

# Install the PHP tidy extention
RUN docker-php-ext-install tidy

#####################################
# PHPRedis:
#####################################
# RUN pecl install redis && docker-php-ext-enable redis

#####################################
# Imagick:
#####################################

# RUN pecl install imagick && \
#     docker-php-ext-enable imagick

#####################################
# GD:
#####################################

# Install the PHP gd library
RUN docker-php-ext-install gd && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd


#####################################
# Composer:
#####################################
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

#####################################
# Laravel Schedule Cron Job:
#####################################

#RUN echo "* * * * * www-data /usr/local/bin/php /var/www/artisan schedule:run >> /dev/null 2>&1"  >> /etc/cron.d/laravel-scheduler
#RUN chmod 0644 /etc/cron.d/laravel-scheduler


# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
#COPY . /var/www

# Copy existing application directory permissions
#COPY --chown=www:www . /var/www

#RUN chown -R www:www /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]


FROM php:8.2-fpm

WORKDIR /var/www

COPY . /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    default-mysql-client \
    libpng-dev \
    libxslt-dev libxml2-dev libpam-dev libedit-dev \ 
    libjpeg62-turbo-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    libmcrypt-dev \
    gcc \
    make \
    autoconf \
    libc-dev \
    pkg-config \
    npm cron nano curl wget git net-tools supervisor procps

RUN pecl channel-update pecl.php.net


RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    chmod +x /usr/local/bin


RUN docker-php-ext-install pdo_mysql pdo gd xmlrpc

RUN groupadd -g 1500 www
RUN useradd -u 1500 -ms /bin/bash -g www www && \
    chown -R www:www /var/www && \
    chown -R 777 /var/www/storage/framework && \
    chown -R 777 /var/www/storage/logs && \
    chown -R 777 /var/www/images 

FROM php:8.2-fpm

RUN apt-get update && apt-get install -y git

COPY composer.lock composer.json /var/www/
WORKDIR /var/www

COPY local.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get install -y \
  libzip-dev \
  libonig-dev \
  build-essential \
  libpng-dev \
  libjpeg62-turbo-dev \
  libfreetype6-dev \
  locales \
  jpegoptim optipng pngquant gifsicle \
  vim \
  git \
  curl \
  libpq-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mbstring exif pcntl pdo_pgsql
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . /var/www

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

COPY --chown=www:www . /var/www

RUN chmod -R 777 /var/www

USER www

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/var/www/ --filename=composer
RUN /var/www/composer install

EXPOSE 9000
CMD ["php-fpm"]

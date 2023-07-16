FROM php:7.4-fpm

WORKDIR /var/www

# prepare for adding deps
RUN apt-get update && apt-get install -y gnupg

RUN apt-get install -y zlib1g-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev

# install other deps for imagic, mbstring, ldap, zip
RUN apt-get install -y \
    libmagickwand-dev \
    libonig-dev \
    libldb-dev libldap2-dev \
    libzip-dev \
    libodbc1 \
    odbcinst1debian2

RUN docker-php-ext-install gd mbstring json ldap xml zip soap pdo pdo_mysql mysqli

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . .

# Copy existing application directory permissions
COPY --chown=www:www . .

# Change current user to www
USER www

EXPOSE 9000
ENTRYPOINT ["php-fpm", "-F", "-R"]
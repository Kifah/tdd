FROM php:7.1.6-apache

# Install pre-reqs for the next steps



RUN apt-get update && apt-get -yq install build-essential \
        software-properties-common \
        python-software-properties \
        wget \
        curl \
        htop \
        inetutils-ping \
        vim \
        httping  \
        git   \
        netcat \
        libmcrypt-dev \
        libxml2-dev \
        libfontconfig1  \
        libcurl4-openssl-dev \
        libzip-dev  \
        zlib1g-dev libicu-dev libpq-dev



RUN docker-php-ext-install mcrypt opcache curl intl bcmath mbstring pdo_mysql sockets



###extensions
RUN pecl install apcu zip
RUN docker-php-ext-enable  zip

### Composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer


###xdeubg (dev only)

RUN pecl install xdebug-beta && \
 docker-php-ext-enable xdebug

###xdebug settings (dev only)

# Configure xdebug (dev only)
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_connect_back=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "dxdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_host=192.168.99.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


COPY apache/api.conf /etc/apache2/sites-available/

RUN a2dissite 000-default.conf

RUN a2ensite api.conf

###run api related stuff

RUN mkdir /var/log/api /var/cache/api


CMD ["apache2-foreground"]






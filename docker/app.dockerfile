FROM php:7.3-fpm
RUN apt-get update && docker-php-ext-install pdo_mysql

WORKDIR /usr/local/bin

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN chmod +x /usr/local/bin/composer.phar
RUN ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

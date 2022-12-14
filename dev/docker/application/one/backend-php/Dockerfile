FROM php:8.1.3-fpm-alpine

ARG SHARED_CONFIG_PATH
ARG APP_PATH
ARG CONF_PATH

ENV ENV="/root/.profile"
COPY ${SHARED_CONFIG_PATH}/.profile/.profile* /root/

COPY ${SHARED_CONFIG_PATH}/.ssh/id_* /root/.ssh/
RUN chmod 600 /root/.ssh/id_*

COPY ${CONF_PATH}/one.ini $PHP_INI_DIR/conf.d/
COPY ${CONF_PATH}/one.conf /usr/local/etc/php-fpm.d/

RUN apk add --update openssh && ssh-keyscan gitlab.com >> ~/.ssh/known_hosts

RUN apk add --update shadow && usermod -u 1000 www-data

RUN apk add --update git

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install pcntl
RUN apk add --update icu-dev && docker-php-ext-install intl

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/*

RUN cp $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"  && \
    php composer-setup.php  && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/app/${APP_PATH}/

CMD ["php-fpm", "-F"]

EXPOSE 9001

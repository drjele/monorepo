FROM nginx:alpine

ARG SHARED_CONFIG_PATH
ARG APP_PATH
ARG CONF_PATH

ENV ENV="/root/.profile"
COPY ${SHARED_CONFIG_PATH}/.profile/.profile* /root/

COPY ${CONF_PATH}/nginx.conf /etc/nginx/
COPY ${CONF_PATH}/site.conf /etc/nginx/conf.d/default.conf

RUN apk add shadow && set -x && usermod -u 1000 nginx && groupmod -g 1000 nginx

WORKDIR /var/www/app/${APP_PATH}/public/

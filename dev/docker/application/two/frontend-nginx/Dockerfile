FROM nginx:alpine

ARG SHARED_CONFIG_PATH
ARG APP_PATH
ARG CONF_PATH

ENV ENV="/root/.profile"
COPY ${SHARED_CONFIG_PATH}/.profile/.profile* /root/

COPY ${CONF_PATH}/nginx.conf /etc/nginx/
COPY ${CONF_PATH}/site.conf /etc/nginx/conf.d/default.conf

COPY ${SHARED_CONFIG_PATH}/.ssh/id_* /root/.ssh/
RUN chmod 600 /root/.ssh/id_*

RUN apk add --update shadow && usermod -u 1000 nginx && groupmod -g 1000 nginx

RUN apk add --update openssh && ssh-keyscan gitlab.com >> ~/.ssh/known_hosts

RUN apk add --update git npm

RUN rm -rf /var/cache/apk/* && rm -rf /tmp/*

WORKDIR /var/www/app/${APP_PATH}/

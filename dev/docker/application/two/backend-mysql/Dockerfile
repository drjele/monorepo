FROM mysql/mysql-server:latest

ARG SHARED_CONFIG_PATH

ENV ENV="/root/.profile"
COPY ${SHARED_CONFIG_PATH}/.profile/.profile* /root/

CMD ["--default-authentication-plugin=mysql_native_password"]

FROM alpine:3.15.0

RUN apk add --update nginx \
     php \
     php-fpm \
     php-opcache \
     php-gd \
     php-mysqli \
     php-zlib \
     php-curl \
     php7-pdo_mysql \
     php7-pdo \
     php7-mysqli \
     mysql \
     mysql-client \
     shadow \
     bash \
     util-linux\
     openrc \
     supervisor \
     vim \
    && addgroup mysql mysql \
    && rm -rf /var/cache/apk/*

RUN mkdir -p /var/run/mysqld && chown -R mysql.mysql /var/run/mysqld
RUN mkdir -p /var/log/mysql && chown -R mysql.mysql /var/log/mysql
RUN mysql_install_db --user=mysql  --datadir=/var/lib/mysql/
RUN mkdir -p /run/php


ARG USER_ID='1000'
ARG USER_ID=${USER_ID}
ENV USER_ID ${USER_ID}

ARG GROUP_ID='1000'
ARG GROUP_ID=${GROUP_ID}
ENV GROUP_ID ${GROUP_ID}

ARG PROJECT_PREFIX='framework'
ARG PROJECT_PREFIX=${PROJECT_PREFIX}
ENV PROJECT_PREFIX=${PROJECT_PREFIX}
ENV MYSQL_ROOT_PASSWORD=rpassword
ENV MYSQL_DATABASE=framework_db
ENV MYSQL_USER=sysdba
ENV MYSQL_PASSWORD=upassword

RUN apk --no-cache add shadow
RUN adduser -D -u $USER_ID -s /bin/bash www-data -G www-data

COPY ./containers/conf/mysql_init.sql /tmp/mysql_init.sql

COPY ./containers/conf/nginx.conf /etc/nginx/nginx.conf
COPY ./containers/conf/default.conf /etc/nginx/conf.d/default.conf
COPY ./containers/conf/www.conf /etc/php7/php-fpm.d/www.conf

COPY ./containers/conf/supervisor.conf /etc/supervisord.conf

RUN sed -i "s/#PROJECT_PREFIX#/${PROJECT_PREFIX}/g" /etc/nginx/conf.d/default.conf
RUN sed -i -e "s/www-data:x:82:82:Linux User,,,:\/home\/www-data:\/sbin\/nologin/www-data:x:${USER_ID}:${GROUP_ID}:Linux User,,,:\/home\/www-data:\/bin\/bash/g" /etc/passwd
RUN sed -i -e "s/www-data:x:82:www-data/www-data:x:${GROUP_ID}:www-data/g" /etc/group


EXPOSE 80
STOPSIGNAL SIGTERM
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
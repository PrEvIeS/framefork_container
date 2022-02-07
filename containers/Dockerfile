FROM alpine:3.15.0

RUN apk add nginx php-fpm mysql

EXPOSE 80

STOPSIGNAL SIGTERM

CMD ["nginx", "-g", "daemon off;"]
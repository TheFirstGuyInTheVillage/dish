FROM composer:2.7 as vendor

WORKDIR /tmp/

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install --prefer-dist --no-scripts

FROM php:8.2-fpm

ARG NGINX_USER_ID=1000
ARG NGINX_GROUP_ID=1000
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apt-get update
RUN apt-get -y install bash git zip
RUN docker-php-ext-install pdo pdo_mysql
COPY --from=vendor /usr/bin/composer /usr/bin/composer

RUN addgroup -gid ${NGINX_GROUP_ID:-1000} nginx \
    && adduser -uid ${NGINX_USER_ID:-1000} -gid ${NGINX_GROUP_ID:-1000} --debug nginx

WORKDIR /app

COPY --chown=nginx:nginx . ./
COPY --chown=nginx:nginx --from=vendor /tmp/vendor/ ./vendor

EXPOSE 9000
ENTRYPOINT ["php-fpm", "-F"]

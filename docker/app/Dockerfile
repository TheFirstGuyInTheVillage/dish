ARG PHP_VERSION=8.2

FROM php:${PHP_VERSION}-fpm
RUN apt-get update
RUN apt-get -y install bash git zip

ARG NGINX_USER_ID=1000
ARG NGINX_GROUP_ID=1000
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

RUN addgroup -gid ${NGINX_GROUP_ID:-1000} nginx \
    && adduser -uid ${NGINX_USER_ID:-1000} -gid ${NGINX_GROUP_ID:-1000} --debug nginx

WORKDIR /app

COPY --chown=nginx:nginx ./ ./

RUN composer install --prefer-dist --no-autoloader --no-scripts \
    && composer clear-cache

EXPOSE 9000

ENTRYPOINT ["php-fpm", "-F"]

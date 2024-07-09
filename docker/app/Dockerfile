ARG PHP_VERSION=8.2
ARG NGINX_USER_ID=1000
ARG NGINX_GROUP_ID=1000

FROM ubuntu:stable

RUN apt-get update
RUN apt-get install composer bash php-curl

FROM php:${PHP_VERSION}-fpm

RUN docker-php-ext-install pdo pdo_mysql

RUN addgroup -gid ${NGINX_GROUP_ID:-1000} nginx \
    && adduser -uid ${NGINX_USER_ID:-1000} -gid ${NGINX_GROUP_ID:-1000} --debug nginx

WORKDIR /app

RUN set -eux; \
    mkdir vendor; \
    chown -R nginx:nginx /app; \
    if [ -f composer.json ]; then \
        su nginx -c "composer install --prefer-dist --no-autoloader --no-scripts --no-progress"; \
        su nginx -c "composer clear-cache"; \
    fi

COPY --chown=nginx:nginx ./ ./

EXPOSE 9000

ENTRYPOINT ["php-fpm", "-F"]

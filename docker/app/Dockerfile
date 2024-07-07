ARG PHP_VERSION=8.2

FROM php:${PHP_VERSION}-fpm

RUN apt-get update

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app
COPY --chown=nginx:nginx ./ ./

EXPOSE 9000

ENTRYPOINT ["php-fpm", "-F"]
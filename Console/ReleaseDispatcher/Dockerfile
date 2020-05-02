FROM php:7.3-cli
COPY . /usr/src/app
WORKDIR /usr/src/app
ENV RELEASE_CONFIG_FILE=/usr/src/app/.release-dispatcher.yml

RUN pecl install xdebug-2.7.2 \
    && docker-php-ext-enable xdebug

CMD [ "php", "/usr/src/app/release-dispatcher", "run", "-vv"]
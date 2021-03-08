FROM php:7.4-apache

ENV APP_USER simple_cmdi
ENV APP_PORT 80

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    adduser --disabled-password $APP_USER && \
    mkdir /$APP_USER

COPY src/ /var/www/html

RUN chmod 1733 /tmp /var/tmp /dev/shm

#RUN echo csictf{1nj3ct10n_15_p41nfu1} > /ctf/system/of/a/down/flag.txt

RUN chown -R root:$APP_USER /$APP_USER && \
  chmod -R 755 /$APP_USER

RUN chmod -R 440 /var/www/html/flag

EXPOSE $APP_PORT

FROM php:8.2.5-fpm
LABEL maintainer="aleksandr.stepin@intelsib-team.com"

WORKDIR /site

ARG UID=1000
ARG GID=1000

ENV UID=${UID}
ENV GID=${GID}

COPY prerun.sh /tmp/prerun.sh
RUN /tmp/prerun.sh && rm /tmp/prerun.sh

COPY run.sh /tmp/run.sh
RUN /tmp/run.sh && rm /tmp/run.sh

COPY composer.phar /bin/composer

USER coal

EXPOSE 8999
EXPOSE 8997

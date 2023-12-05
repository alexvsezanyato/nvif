FROM mysql/mysql-server:8.0
LABEL maintainer="aleksandr.stepin@intelsib-team.com"

ENV MYSQL_ALLOW_EMPTY_PASSWORD=0
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_ROOT_HOST="localhost"

ENV MYSQL_DATABASE=coal
ENV MYSQL_USER=coal
ENV MYSQL_PASSWORD=coal

COPY init.sql /docker-entrypoint-initdb.d/

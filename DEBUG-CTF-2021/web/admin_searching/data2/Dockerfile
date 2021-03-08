FROM mysql:5.6
RUN apt-get update && apt-get install -y --no-install-recommends apt-utils
COPY ./setup.sql /tmp/setup.sql
RUN chmod 777 /tmp/setup.sql

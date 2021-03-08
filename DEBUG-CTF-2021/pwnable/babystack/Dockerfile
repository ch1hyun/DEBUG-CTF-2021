FROM ubuntu:16.04

ENV APP_USER babystack
ENV APP_PORT 8080

RUN apt-get update -y && apt-get install -y \
    xinetd \
    && adduser --disabled-password $APP_USER

WORKDIR /home/$APP_USER

RUN cp -R /lib* /home/$APP_USER && \
    cp -R /usr/lib* /home/$APP_USER

RUN mkdir /home/$APP_USER/dev && \
    mknod /home/$APP_USER/dev/null c 1 3 && \
    mknod /home/$APP_USER/dev/zero c 1 5 && \
    mknod /home/$APP_USER/dev/random c 1 8 && \
    mknod /home/$APP_USER/dev/urandom c 1 9 && \
    chmod 666 /home/$APP_USER/dev/*

RUN mkdir /home/$APP_USER/bin && \
    cp /bin/sh /home/$APP_USER/bin && \
    cp /usr/bin/id /home/$APP_USER/bin && \
    cp /bin/ls /home/$APP_USER/bin && \
    cp /bin/cat /home/$APP_USER/bin

COPY ./xinetd /etc/xinetd.d/$APP_USER
COPY ./run.sh /run.sh
RUN echo "Blocked by ctf_xinetd" > /etc/banner_fail

RUN chmod +x /run.sh

COPY ./deploy/ /home/$APP_USER/
RUN chown -R root:$APP_USER /home/$APP_USER && \
    chmod -R 750 /home/$APP_USER && \
    chmod 740 /home/$APP_USER/flag && \
    rm -rf ./exploit.py ./babystack.c

CMD ["/run.sh"]

EXPOSE $APP_PORT


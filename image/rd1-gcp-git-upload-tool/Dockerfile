FROM alpine:3.8

ENV PATH=$PATH:/google-cloud-dockesdk/bin
COPY gcp-upload-entrypoint.sh /

RUN chmod +x /gcp-upload-entrypoint.sh

# 安裝bash和wget https 方式
RUN apk update \
    && apk upgrade \
    && apk add ca-certificates \
    && update-ca-certificates \ 
    && apk add openssl \
    && apk add bash \
    && apk add bash-doc \
    && apk add bash-completion \
    && apk add openssh openntpd vim \
    && apk add --no-cache bash git openssh

# 安裝python
RUN apk add --no-cache python3 && \
    python3 -m ensurepip && \
    rm -r /usr/lib/python*/ensurepip && \
    pip3 install --upgrade pip setuptools && \
    if [ ! -e /usr/bin/pip ]; then ln -s pip3 /usr/bin/pip ; fi && \
    if [[ ! -e /usr/bin/python ]]; then ln -sf /usr/bin/python3 /usr/bin/python; fi && \
    rm -r /root/.cache

# 安裝gcloud
RUN wget https://dl.google.com/dl/cloudsdk/channels/rapid/downloads/google-cloud-sdk-210.0.0-linux-x86_64.tar.gz

WORKDIR /

RUN tar zxvf google-cloud-sdk-210.0.0-linux-x86_64.tar.gz 



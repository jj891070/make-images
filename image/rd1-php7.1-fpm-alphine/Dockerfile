FROM php:7.1-fpm-alpine 

RUN apk add --update \
    autoconf \
    g++ \
    libtool \
    make \
    postgresql-dev 

RUN docker-php-ext-install mysqli pdo pdo_mysql opcache pgsql

# 安裝mongoDB
RUN set -xe \
    && apk add --no-cache --update --virtual .phpize-deps $PHPIZE_DEPS \
    && pecl install -o -f mongodb  \
    && echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/mongodb.ini \
    && rm -rf /usr/share/php \
    && rm -rf /tmp/* \
    && apk del  .phpize-deps

# 刪除不必要檔案
RUN apk del \
        autoconf \
        bash \
        binutils \
        binutils-libs \
        db \
        expat \
        file \
        g++ \
        gcc \
        gdbm \
        gmp \
        isl \
        libatomic \
        libbz2 \
        libc-dev \
        libffi \
        libgcc \
        libgomp \
        libldap \
        libltdl \
        libmagic \
        libsasl \
        libstdc++ \
        libtool \
        m4 \
        make \
        mpc1 \
        mpfr3 \
        musl-dev \
        perl \
        pkgconf \
        pkgconfig \
        python \
        re2c \
        readline \
        sqlite-libs \
        zlib-dev \
    && rm -rf /tmp/* /var/cache/apk/*

RUN sed -e 's/pm.max_children = 5/pm.max_children = 50/' -i /usr/local/etc/php-fpm.d/www.conf

CMD [php-fpm]
        


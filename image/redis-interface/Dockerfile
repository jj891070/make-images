FROM ubuntu
# install apache git php7.0
RUN apt-get update --fix-missing \
    && apt-get install -y git apache2 php7.0 libapache2-mod-php7.0 \
    && apt-get install -y php-mbstring php7.0-opcache php7.0-zip php7.0-dev php-memcached php-redis zip unzip 

WORKDIR /var/www/html

# git clone phpredis
RUN git clone https://github.com/nicolasff/phpredis \
    && cd phpredis phpize ./configure make

# git clone phpRedisAdmin
RUN git clone https://github.com/ErikDubbelboer/phpRedisAdmin.git \
    && cd phpRedisAdmin \
    && git clone https://github.com/nrk/predis.git vendor

# 修改apache設定檔及phpRedisAdmin設定檔
ADD 000-default.conf /etc/apache2/sites-enabled/000-default.conf
COPY config.inc.php /var/www/html/phpRedisAdmin/includes/config.inc.php

EXPOSE 80
CMD ["/usr/sbin/apachectl","-D","FOREGROUND"]


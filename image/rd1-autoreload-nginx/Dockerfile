FROM nginx

COPY auto-reload-nginx.sh /
RUN chmod +x /auto-reload-nginx.sh
RUN echo "fs.inotify.max_user_watches=524288" >> /etc/sysctl.conf \
    && apt-get update && apt-get install -y inotify-tools

WORKDIR /usr/share/nginx/html

CMD ["/auto-reload-nginx.sh"]
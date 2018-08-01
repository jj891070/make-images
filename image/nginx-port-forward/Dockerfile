FROM nginx

COPY default.conf /etc/nginx/conf.d/default.conf

COPY auto-reload-nginx.sh /
RUN chmod +x /auto-reload-nginx.sh

RUN apt-get update && apt-get install -y inotify-tools

CMD ["/auto-reload-nginx.sh"]
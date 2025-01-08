FROM nginx:alpine
WORKDIR /var/www/app
COPY .  /var/www/app
COPY Docker/web/default.conf   /etc/nginx/conf.d/default.conf
RUN chmod -R 755 /var/www/app



FROM nginx:1.22

COPY .docker/vhost.conf /etc/nginx/conf.d/default.conf

COPY public /var/www/public

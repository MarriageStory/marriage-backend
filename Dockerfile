FROM wyveo/nginx-php-fpm:php81

WORKDIR /usr/share/nginx/html
COPY ./ /usr/share/nginx/html
RUN composer install 
RUN php artisan migrate:fresh --seed
RUN php artisan optimize
COPY ./nginx.conf /etc/nginx/conf.d/default.conf
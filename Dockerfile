FROM wyveo/nginx-php-fpm:php81

WORKDIR /usr/share/nginx/html
COPY ./ /usr/share/nginx/html
RUN composer install 
RUN php artisan migrate:reset
RUN php artisan optimize
RUN php artisan db:seed
RUN npm run dev
COPY ./nginx.conf /etc/nginx/conf.d/default.conf
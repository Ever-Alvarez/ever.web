FROM php:8.1.17-apache

RUN apt-get update && apt-get install -y libicu-dev \
    && docker-php-ext-install mysqli intl

COPY . /var/www/html/

# Cambia el DocumentRoot a public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite
#RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf




RUN chown -R www-data:www-data /var/www/html
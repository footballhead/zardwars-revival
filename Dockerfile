FROM php:5.6-apache

COPY encyclopedia/ /var/www/html/encyclopedia/
COPY images/ /var/www/html/images/
COPY pages/ /var/www/html/pages/
COPY screenshots/ /var/www/html/screenshots/
COPY style/ /var/www/html/style/
COPY encyclopedia.php index.php sidebar.html style.css /var/www/html/

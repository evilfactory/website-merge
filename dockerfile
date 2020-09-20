FROM php:7.2-apache
COPY * /var/www/html/
EXPOSE 80
RUN chmod 777 -R /var/www/html/
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
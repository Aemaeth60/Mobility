FROM php:7.2-apache
FROM mariadb:latest
COPY src/ /var/www/html/
	

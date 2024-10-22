FROM php:8.3.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

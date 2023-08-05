# Use the official PHP image as the base image
FROM php:8.1.2-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the contents of the PHP project to the working directory in the container
COPY . /var/www/html/

# Install any required PHP extensions or dependencies
# For example, if you need to install the MySQL extension for PHP, you can do:
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose the port on which Apache will listen
EXPOSE 80

# Start the Apache server when the container starts
CMD ["apache2-foreground"]
